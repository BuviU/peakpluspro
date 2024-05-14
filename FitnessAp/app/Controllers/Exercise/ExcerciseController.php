<?php

namespace App\Controllers\Exercise;

use App\Controllers\BaseController;
use App\Models\ExerciseModel;
use App\Models\MembershipModel;
use App\Models\ProgramModel;
use App\Models\WorkoutModel;
use App\Models\AddExerciseModel;
use App\Models\ExerciseFullDetailsModel;
use App\Libraries\MenuLoader;


class ExcerciseController extends BaseController
{
	public function __construct()
	{
		date_default_timezone_set('Asia/Colombo');
	}

	public function index()
	{
		$data = array();


		$menuLoader = new MenuLoader();
		$data = $menuLoader->loadMenuData();

		$model = new ExerciseModel();
		$model_member = new MembershipModel();
		$model_exercise = new AddExerciseModel();
		$model_program = new ProgramModel();
		$model_workout = new WorkoutModel();

		
		// get all staff members where del = 0
		$data['exercise'] = $model->select('*')->findAll();
		$data['members'] = $model_member->select('id, membership_name')->findAll();
		$data['exercise_list'] = $model_exercise->select('exercise_name,id')->findAll();
		$data['program'] = $model_program->select('id, program')->findAll();
		$data['workout'] = $model_workout->select('id, workout')->findAll();

		return view('pages/exercise/add_exercise', $data);
	}





	//create exercise - route : base_url/createExercise
	public function create()
	{
		$validation = \Config\Services::validation();
		$validation->setRules([
			'member' => 'required|strip_tags',
			'program' => 'required|strip_tags',
			'workout' => 'required|strip_tags',
			'series' => 'required|strip_tags',
			'exercise.*' => 'required|string|strip_tags',
			'sets' => 'required|strip_tags',
			'reps' => 'required|strip_tags',
			'tempo' => 'required|strip_tags',
			'rest' => 'required|strip_tags',
			'weight' => 'required|strip_tags',
			'unic_id' => 'required|strip_tags',
				// 'video_url' => 'required|strip_tags',
		]);

		if ($validation->withRequest($this->request)->run()) {

			$member = $this->request->getVar('member');
			$program = $this->request->getVar('program');
			$workout = $this->request->getVar('workout');
			$series = $this->request->getVar('series');
			$exercise = implode(',', $this->request->getVar('exercise'));
			$sets = $this->request->getVar('sets');
			$reps = $this->request->getVar('reps');
			$tempo = $this->request->getVar('tempo');
			$rest = $this->request->getVar('rest');
			$weight = $this->request->getVar('weight');
			$unic_id = $this->request->getVar('unic_id');
				// $video_url = $this->request->getVar('video_url');
				

			$model = new ExerciseModel();

				// check if menu name already exists under the category
			$rowCount = $model->select('id')->where('id', $unic_id)->countAllResults();
				// if rowCount < 1, then menu_list name is not exists

				$data = [
					'exercise_name' => $exercise,
					'membership' => $member,
					'program' => $program,
					'workout' => $workout,
					'series' => $series,
					'sets' => $sets,
					'reps' => $reps,
					'tempo' => $tempo,
					'rest' => $rest,
					'weight' => $weight,
				];

			if ($rowCount == 0) {

				if ($model->insert($data)) {
					// Created
					return $this->response->setJSON(["status" => 201, "message" => "Exercise Details Added successfully!"]);
				} else {
					// Internal Server Error
					return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
				}

			} else {
				if ($model->update($unic_id, $data)) {
					// Created
					return $this->response->setJSON(["status" => 409, "message" => "Exercise Details Updated successfully!"]);
				} else {
					// Internal Server Error
					return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
				}

					// Conflict
				// return $this->response->setJSON(["status" => 409, "message" => "Exercise Details Already Exists!"]);

			}

		} else {
				// Bad Request
			$errors = $validation->getErrors();
			return $this->response->setJSON(["status" => 400, "message" => $errors]);
		}
	}


   // get single menu_list data - route : base_url/settings/menu_list/show/$1
	public function show($id = 0)
	{
		$model = new ExerciseModel();

		// get menu_list data by id
		$data = $model->select('*')->find($id);

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

	// get program - route : base_url/getprogram/$1
	public function getprogram($member_id = 0)
	{
		$model = new ProgramModel();

		//get program list
		$data = $model->select('id, program')->where('membership', $member_id)->get()->getResult();

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

	// get workout - route : base_url/getworkout/$1
	public function getworkout($member_id = 0, $program_id = 0)
	{
		$model = new WorkoutModel();

		//get workout list
		$data = $model->select('id, workout')->where('membership', $member_id)->where('program', $program_id)->get()->getResult();

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

	public function editExercise($exercise_id = 0)
	{
		$model = new ExerciseFullDetailsModel();

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

}
