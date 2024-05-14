<?php

namespace App\Controllers\Exercise;

use App\Controllers\BaseController;
use App\Models\CoachModel;
use App\Models\AddExerciseModel;
use App\Models\MembershipModel;
use App\Models\ProgramModel;
use App\Models\WorkoutModel;
use App\Models\GroupProfileModel;
use App\Libraries\MenuLoader;



class CoachesController extends BaseController
{
	public function __construct()
	{
		date_default_timezone_set('Asia/Colombo');
	}


	public function index()
	{
		$data = array();

		       // // Load menu data using the custom library
		$menuLoader = new MenuLoader();
		$data = $menuLoader->loadMenuData();


		$model = new CoachModel();
		$data['coach'] = $model->select('*')->findAll();

		$model2 = new GroupProfileModel();
		$data['group_profiles'] = $model2->select('*')->where('del', 0)->orderBy('id', 'ASC')->findAll();


		return view('pages/exercise/coaches', $data);
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
			'username' => 'required|strip_tags',
			'password' => 'required|strip_tags',
			'group_profile' => 'required|strip_tags',
			'image_file' => 'uploaded[image_file]|max_size[image_file,1024]',
			

		]);

		if ($validation->withRequest($this->request)->run()) {

			$f_name = $this->request->getVar('f_name');
			$l_name = $this->request->getVar('l_name');
			$email = $this->request->getVar('email');
			$gender = $this->request->getVar('gender');
			$dob = $this->request->getVar('dob');
			$username = $this->request->getVar('username');
			$pass = $this->request->getVar('password');
			$group_profile = $this->request->getVar('group_profile');
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
						$password = password_hash($pass, PASSWORD_DEFAULT);
						$data = [
							'f_name' => $f_name,
							'l_name' => $l_name,
							'email' => $email,
							'gender' => $gender,
							'dob' => $dob,
							'prof_pic' => $newName,
							'group_id' => $group_profile,
							'user' => $username,
							'pass' => $password,

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
					return $this->response->setJSON(["status" => 409, "message" => "File upload failed!"]);
					
				}

			} else {
				// Conflict
				
				return $this->response->setJSON(["status" => 408, "message" => "This Coach Email Already Exists!"]);
			}
		} else {
			// Bad Request
			$errors = $validation->getErrors();
			return $this->response->setJSON(["status" => 400, "message" => $errors]);
		}

	}

	public function edit($id = 0)
	{
		$model = new CoachModel();

		// get menu_list data by id
		$data = $model->select('*')->where('id', $id)->find();

		// if data is not empty
		if (!empty($data)) {
			$responseData = [
				'status' => 200, // Success
				'error' => null,
				'message' => 'Data retrieved successfully.',
				'data' => $data
			];

			return $this->response->setJSON($responseData);
			// return $this->respond($response);
		} else {
			$responseData = [
				'status' => 404, // Not found
				'error' => null,
				'message' => ' Not found.'
			];
			return $this->response->setJSON($responseData);
		}
	}

	public function delete($id = 0){
		$model = new CoachModel();
		$ex_model = new AddExerciseModel();
		$memb_model = new MembershipModel();
		$pro_model = new ProgramModel();
		$wrk_model = new WorkoutModel();

		$rowCount = $model->select('coach')->where('id', $id)->countAllResults();
		$ex_count = $ex_model->select('exercise_name')->where('coach_id', $id)->countALLResults();
		$memb_count = $memb_model->select('membership_name')->where('coach_id', $id)->countALLResults();
		$pro_count = $pro_model->select('program')->where('coach_id', $id)->countALLResults();
		$wrk_count = $wrk_model->select('workout')->where('coach_id', $id)->countALLResults();

		if($ex_count> 0 || $memb_count >0 || $pro_count > 0 || $wrk_count > 0){
			$responseData = ['status' => 409, 'message' => 'Data Exists!'];
		}else {
			if($rowCount > 0) {

				if($model->where('id', $id)->delete()){
					$responseData = ['status' => 200, 'message' => 'Successfully Deleted!'];
				}else{
					$responseData = ['status' => 500, 'message' => 'Something Went Wrong!'];
				}
			}else{
				$responseData = ['status' => 400, 'message' => 'No Data Available!'];
			}
		}
		

		return $this->response->setJSON($responseData);
	}



	public function update()
{
    $validation = \Config\Services::validation();
    $validation->setRules([
        'f_name_up' => 'required|strip_tags',
        'l_name_up' => 'required|strip_tags',
        'email_up' => 'required|strip_tags',
        'gender_up' => 'required|strip_tags',
        'dob_up' => 'required|strip_tags',
        'username_up' => 'required|strip_tags',
        'group_profile_up' => 'required|strip_tags',
    ]);

    if ($validation->withRequest($this->request)->run()) {
       
		$f_name = $this->request->getVar('f_name_up');
		$l_name = $this->request->getVar('l_name_up');
		$email = $this->request->getVar('email_up');
		$email_old = $this->request->getVar('email_old');
		$gender = $this->request->getVar('gender_up');
		$dob = $this->request->getVar('dob_up');
		$username = $this->request->getVar('username_up');
		$pass = $this->request->getVar('password_up');
		$group_profile = $this->request->getVar('group_profile_up');
		$imageFile = $this->request->getFile('image_file_up');
		$imageFile_old = $this->request->getVar('old_image');
		$id = $this->request->getVar('id_up');
		
		

		$model = new CoachModel();

		if ($email != $email_old) {
			$rowCount = $model->select('coach')->where('email', $email)->countAllResults();
			if ($rowCount > 0) {
				// Conflict
				return $this->response->setJSON(["status" => 408, "message" => "Email Already Exists!"]);
			}
		}
		

		
			$data = [
				'f_name' => $f_name,
				'l_name' => $l_name,
				'email' => $email,
				'gender' => $gender,
				'dob' => $dob,
				'group_id' => $group_profile,
				'user' => $username,
			];

			

			if ($pass) {
				$password = password_hash($pass, PASSWORD_DEFAULT);
				$data['pass'] = $password;
				
			}
			
			if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
				$newName = $imageFile->getRandomName();
				$imageFile->move(ROOTPATH . 'public/uploads/coach_img', $newName);
				$data['prof_pic'] = $newName;
			} 
			
			
			if($model->update($id,$data)) {
				// Updated
				return $this->response->setJSON(["status" => 201, "message" => "Coach details updated successfully!"]);
			} else {
				// Internal Server Error
				return $this->response->setJSON(["status" => 500, "message" => "Something went wrong...."]);
			}
		
    }else{
		 // Bad Request
        $errors = $validation->getErrors();
        return $this->response->setJSON(["status" => 400, "message" => $errors]);
	}

}


}
