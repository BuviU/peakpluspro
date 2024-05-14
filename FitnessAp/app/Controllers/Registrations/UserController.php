<?php

namespace App\Controllers\Exercise;

use App\Controllers\BaseController;
use App\Models\CoachModel;



class CoachesController extends BaseController
{
	public function __construct()
	{
		date_default_timezone_set('Asia/Colombo');
	}


	public function index()
	{
		$data = array();


		$model = new CoachModel();
		// get all workout details
		$data['coach'] = $model->select('*')->findAll();


		return view('pages/registrations/coaches', $data);
	}




	/************** INSERT ******************/
	public function create()
	{
		
		$validation = \Config\Services::validation();
		$validation->setRules([
			'f_name' => 'required|strip_tags',
			'l_name' => 'required|strip_tags',
			'email' => 'required|strip_tags',
			'gender' => 'required|strip_tags',
			'dob' => 'required|strip_tags',
			'image_file' => 'uploaded[image_file]|max_size[image_file,1024]',

		]);

		if ($validation->withRequest($this->request)->run()) {

			$f_name = $this->request->getVar('f_name');
			$l_name = $this->request->getVar('l_name');
			$email = $this->request->getVar('email');
			$gender = $this->request->getVar('gender');
			$dob = $this->request->getVar('dob');
			// $description = $this->request->getVar('description');
			$imageFile = $this->request->getFile('image_file');


			$model = new CoachModel();
			// check if menu name already exists under the workout
			$rowCount = $model->select('coach')->where('email', $email)->countAllResults();
			// if rowCount < 1, then workout name is not exists
			if ($rowCount == 0) {



				try {
              // Check if the file is valid and not moved
					if ($imageFile->isValid() && !$imageFile->hasMoved()) {
               // Generate a unique name for the file
						$newName = $imageFile->getRandomName();

              // Move the file to the desired directory
						$imageFile->move(ROOTPATH . 'public/uploads/coach_img', $newName);

              // Update the 'thumbnail' field in $data
              // $data['thumbnail'] = $newName;

						$data = [
							'f_name' => $f_name,
							'l_name' => $l_name,
							'email' => $email,
							'gender' => $gender,
							'dob' => $dob,
							'prof_pic' => $newName,

						];

						if ($model->insert($data)) {
					// Created
							return $this->response->setJSON(["status" => 201, "message" => "Coach Details Added successfully!"]);
						} else {
					// Internal Server Error
							return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
						}
					} else {
               // Handle invalid or moved file
						throw new \RuntimeException('Invalid or moved file.');
					
					}
				} catch (\Exception $e) {
               // Handle any exceptions that occurred during the file upload
					// echo 'File upload failed: ' . $e->getMessage();
					return $this->response->setJSON(["status" => 408, "message" => "This Coach Email Already Exists!"]);
				}

			} else {
				// Conflict
				return $this->response->setJSON(["status" => 409, "message" => "File upload failed!"]);
			}
		} else {
			// Bad Request
			$errors = $validation->getErrors();
			return $this->response->setJSON(["status" => 400, "message" => $errors]);
		}

	}




}
