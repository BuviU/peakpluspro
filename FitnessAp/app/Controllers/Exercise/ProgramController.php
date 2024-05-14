<?php

namespace App\Controllers\Exercise;

use App\Controllers\BaseController;
use App\Models\ProgramModel;
use App\Models\WorkoutModel;
use App\Models\MembershipModel;
use App\Libraries\MenuLoader;



class ProgramController extends BaseController
{
	public function __construct()
	{
		date_default_timezone_set('Asia/Colombo');
	}


	public function index($selected_membership, $id=0)
	{
		$data = [];

        // Load menu data using the custom library
		$menuLoader = new MenuLoader();
		$data = $menuLoader->loadMenuData();

		//select program
		$model = new ProgramModel();
		$programQuery = $model->select('*');
		$data['program'] = $programQuery->findAll();

		//select membership
		$model2 = new MembershipModel();
		$data['membership'] = $model2->select('*')->findAll();

		//select relevant coatch ->member->program
		$query = $model->select("*")->orderBy('id', 'asc');
		
        $user = session()->get('user_id');

        if($id == 0) {
            if($user != 3){
                $query->where('coach_id', $user);
            }
            
        }else{
            // if($user != 3){
                $query->where("membership", $id);  
            // } 
        }
        
        $data['selected_program'] = $query->findAll();

		$data['membership_id'] = $selected_membership;

		$data['id'] = $id;


		return view('pages/exercise/program', $data);
	}



	public function create()
	{
		$validation = \Config\Services::validation()->setRules([
			'membership' => 'required|strip_tags',
			'program' => 'required|strip_tags',
			'description' => 'required|strip_tags',
			// 'image_file' => 'uploaded[image_file]|max_size[image_file,1024]',
		]);

		if (!$this->request->getVar('is_edit')) {
			$validation->setRules([
				'image_file' => 'uploaded[image_file]|max_size[image_file,1024]',
			]);
		}

		if (!$validation->withRequest($this->request)->run()) {
			return $this->response->setJSON(["status" => 400, "message" => $validation->getErrors()]);
		}

		$membership = $this->request->getVar('membership');
		$program = $this->request->getVar('program');
		$is_edit = $this->request->getVar('is_edit');
		$program_id = $this->request->getVar('program_id');
		$description = $this->request->getVar('description');
		$thumbnail = $this->request->getFile('image_file');

		$model = new ProgramModel();

		try {
			if ($thumbnail && $thumbnail->isValid() && !$thumbnail->hasMoved()) {
				$newName = $thumbnail->getRandomName();
				$thumbnail->move(ROOTPATH . 'public/uploads/program_img/', $newName);
			}
			if ($is_edit == 0) {
				$rowCount = $model->select('program')->where('program', $program)->countAllResults();
				if ($rowCount == 0) {
					$data = [
						'membership' => $membership,
						'program' => $program,
						'coach_id' => session()->get('user_id'),
						'Description' => $description,
						'thumbnail' => isset($newName) ? $newName : null,
					];

					$model->insert($data);
					return $this->response->setJSON(["status" => 201, "message" => "Program Details Added successfully!"]);
				} else {
					return $this->response->setJSON(["status" => 409, "message" => "Program Name Already Exists!!"]);
				}
			}else{
				$existingprogram = $model->find($program_id);
				if ($existingprogram) {
					if (isset($newName)) {
						$data = ['thumbnail' => $newName, 'program' => $program,'Description'=>$description,'membership' => $membership];
						$model->update($program_id, $data);
						return $this->response->setJSON(["status" => 200, "message" => "Program Details Updated successfully!"]);
					}else{
						$data = ['program' => $program,'Description'=>$description,'membership' => $membership];
						$model->update($program_id, $data);
						return $this->response->setJSON(["status" => 200, "message" => "Program Details Updated successfully!"]);
					}

				} else {
					return $this->response->setJSON(["status" => 404, "message" => "Program not found"]);
				}
			}
			
		} catch (\Exception $e) {
			return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
		}
	}

	/************** GETDETAILS ******************/

	public function getProgramDetails($program_id = 0)
	{
		$model = new ProgramModel();

        //get program list
		$data = $model->select('*')->where('id', $program_id)->get()->getResult();

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

    	$w_model = new WorkoutModel();


    	$rowCount = $w_model->select('*')->where('program', $id)->countAllResults();
    	if ($rowCount > 0) {
    		return $this->response->setJSON(["status" => 409, "message" => "Data Exists!"]); 
    	}else{

    		$model = new ProgramModel();

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
