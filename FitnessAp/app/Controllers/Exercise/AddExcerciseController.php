<?php

namespace App\Controllers\Exercise;

use App\Controllers\BaseController;
use App\Models\ProgramModel;
use App\Models\MembershipModel;
use App\Models\AddExerciseModel;
use App\Libraries\MenuLoader;



class AddExcerciseController   extends BaseController
{
	public function __construct()
	{
		date_default_timezone_set('Asia/Colombo');
	}


	public function index()
	{
		$data = [];

        // Load menu data using the custom library
		$menuLoader = new MenuLoader();
		$data = $menuLoader->loadMenuData();

		// $model = new ProgramModel();
		// $programQuery = $model->select('*');

		// $data['program'] = $programQuery->findAll();

		$model = new AddExerciseModel();
		$data['exercise'] = $model->select('*')->findAll();


		return view('pages/exercise/exercise', $data);
	}



	/************** INSERT ******************/
	public function createNewExercise()
	{
		$validation = \Config\Services::validation()->setRules([
			'exercise' => 'required|strip_tags',
			'video_url' => 'required|strip_tags',
			'image_file' => 'uploaded[image_file]|max_size[image_file,1024]',
		]);

		if ($validation->withRequest($this->request)->run()) {
			$exercise = $this->request->getVar('exercise');
			$video_url = $this->request->getVar('video_url');
			$is_edit = $this->request->getVar('is_edit');
			$exercise_id = $this->request->getVar('exercise_id');
			$thumbnail = $this->request->getFile('image_file');
			$model = new AddExerciseModel();

			try {
				if ($is_edit == 0) {
					$rowCount = $model->select('exercise')->where('exercise_name', $exercise)->countAllResults();
					if ($rowCount == 0) {
						if ($thumbnail->isValid() && !$thumbnail->hasMoved()) {
							$newName = $thumbnail->getRandomName();
							$thumbnail->move(ROOTPATH . 'public/uploads/exercise_img/', $newName);

							$data = [
								'exercise_name' => $exercise,
								'thumbnail' => $newName,
								'video_url' => $video_url,
								'coach_id' => session()->get('user_id'),
							];

							if ($model->insert($data)) {
								return $this->response->setJSON(["status" => 201, "message" => "Exercise Added successfully!"]);
							} else {
								return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
							}
						} else {
							throw new \RuntimeException('Invalid or moved file.');
						}
					} else {
						return $this->response->setJSON(["status" => 408, "message" => "Exercise Name Already Exists!"]);
					}
				} else {
					$existingExercise = $model->find($exercise_id);
					if ($existingExercise) {
						if ($thumbnail->isValid() && !$thumbnail->hasMoved()) {
							$newName = $thumbnail->getRandomName();
							$thumbnail->move(ROOTPATH . 'public/uploads/exercise_img/', $newName);

							$data = ['thumbnail' => $newName, 'exercise_name' => $exercise, 'video_url' => $video_url];
							$model->update($exercise_id, $data);
							return $this->response->setJSON(["status" => 200, "message" => "Exercise Details Updated successfully!"]);
						} else {
							throw new \RuntimeException('Invalid or moved file.');
						}
					} else {
						return $this->response->setJSON(["status" => 404, "message" => "Exercise not found"]);
					}
				}
			} catch (\Exception $e) {
				return $this->response->setJSON(["status" => 409, "message" => "File upload failed!"]);
			}
		} else {
			$errors = $validation->getErrors();
			return $this->response->setJSON(["status" => 400, "message" => $errors]);
		}
	}


	public function itemSearch()
	{
    // Fetch input text from AJAX request
		$inputText = $this->request->getPost('input_text');

    // Load the model
		$model = new AddExerciseModel();

    // Query the database for relevant exercise suggestions
		$suggestions = $model->select('*')->like('exercise_name', $inputText)->findAll();

    // Return suggestions as JSON
		return $this->response->setJSON($suggestions);
	}




	public function getExerciseDetails($exercise_id = 0)
	{
		$model = new AddExerciseModel();

        //get program list
		$data = $model->select('*')->where('id', $exercise_id)->get()->getResult();

		if (!empty($data)) {
			$responseData = [
                'status' => 200, // Success
                'error' => null,
                'message' => 'Data retrieved successfully.',
                'data' => $data
            ];

            return $this->response->setJSON($responseData);
            
        } else {
        	$responseData = [
                'status' => 400, // Not found
                'error' => null,
                'message' => ' Not found.'
            ];
            return $this->response->setJSON($responseData);
        }
    }

    public function delete($id)
    {

    	$ex_model = new AddExerciseModel();
    	$rowCount = $ex_model->select('*')->where('id', $id)->countAllResults();
    	if ($rowCount > 0) {
    		
			if ($ex_model->where('id', $id)->delete()) {

            // Deleted
    			return $this->response->setJSON(["status" => 200, "message" => "Exercise Deleted Successfully"]);
    		} else {
            // Internal Server Error
    			return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
    		}
    	}else{

    		return $this->response->setJSON(["status" => 409, "message" => "Not Available!"]);	
    	}
    }



}
