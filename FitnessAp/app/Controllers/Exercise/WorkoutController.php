<?php

namespace App\Controllers\Exercise;

use App\Controllers\BaseController;
use App\Models\WorkoutModel;
use App\Models\ExerciseModel;
use App\Models\MembershipModel;
use App\Models\ProgramModel;
use App\Libraries\MenuLoader;



class WorkoutController extends BaseController
{
	public function __construct()
	{
		date_default_timezone_set('Asia/Colombo');
	}


	public function index($program,$membership)
	{
		$data = array();

		$menuLoader = new MenuLoader();
		$data = $menuLoader->loadMenuData();

		$model = new WorkoutModel();
		// get all workout details
		$data['workout'] = $model->select('*')->where('membership', $membership)->where('program', $program)->findAll();

		$model2 = new MembershipModel();
		$data['membership'] = $model2->select('*')->findAll();

		$model3 = new ProgramModel();
		$data['program'] = $model3->select('*')->findAll();

		$data['program_id'] = $program;
		$data['membership_id'] = $membership;





		return view('pages/exercise/workout', $data);
	}




	/************** INSERT ******************/
	public function create()
	{
		$validation = \Config\Services::validation();
		$validation->setRules([
			'workout' => 'required|strip_tags',
			'program' => 'required|strip_tags',
			'membership' => 'required|strip_tags',
			'ExampleRadio1' => 'required|strip_tags',
			// 'image_file' => 'uploaded[image_file]|max_size[image_file,1024]',

		]);

		if ($validation->withRequest($this->request)->run()) {

			$workout = $this->request->getVar('workout');
			$description = $this->request->getVar('ExampleRadio1');
			$program = $this->request->getVar('program');
			$membership = $this->request->getVar('membership');
			$is_edit = $this->request->getVar('is_edit');
			$workout_id = $this->request->getVar('workout_id');
			// $imageFile = $this->request->getFile('image_file');

			
			$model = new WorkoutModel();

			if ($is_edit == 0) {
				
				$rowCount = $model->select('workout')->where('workout', $workout)->countAllResults();
				
				if ($rowCount == 0) {
					$data = [
						'workout' => $workout,
						'coach_id' => session()->get('user_id'),
						'description' => $description,
						'program' => $program,
						'membership' => $membership,
					];

					if ($model->insert($data)) {

						return $this->response->setJSON(["status" => 201, "message" => "Workout Details Added successfully!"]);
					} else {

						return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
					}
					

				} else {
					
					return $this->response->setJSON(["status" => 408, "message" => "Workout Name Already Exists!"]);
				}
			}else{
				$existingworkout = $model->find($workout_id);
				if ($existingworkout) {
					$data = ['workout' => $workout, 'description' => $description, 'program' => $program, 'membership' => $membership];
					if($model->update($workout_id, $data)){
						return $this->response->setJSON(["status" => 200, "message" => "Workout Details Updated Successfully!"]);
					}else{
						return $this->response->setJSON(["status" => 404, "message" => "Workout not found"]);
					}
				}else{

				}
			}
		} else {
			// Bad Request
			$errors = $validation->getErrors();
			return $this->response->setJSON(["status" => 400, "message" => $errors]);
		}
	}

	public function getWorkoutDetails($workout_id = 0)
	{
		$model = new WorkoutModel();

        //get program list
		$data = $model->select('*')->where('id', $workout_id)->get()->getResult();

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


      // delete category - route : base_url/deleteMembership/$1
    public function delete($id)
    {

    	$ex_model = new ExerciseModel();


    	$rowCount = $ex_model->select('*')->where('workout', $id)->countAllResults();
    	if ($rowCount > 0) {
    		return $this->response->setJSON(["status" => 409, "message" => "Data Exists!"]); 
    	}else{

    		$model = new WorkoutModel();

    		if ($model->where('id', $id)->delete()) {

            // Deleted
    			return $this->response->setJSON(["status" => 200, "message" => "Program Deleted Successfully"]);
    		} else {
            // Internal Server Error
    			return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
    		}
    	}
    }
}
