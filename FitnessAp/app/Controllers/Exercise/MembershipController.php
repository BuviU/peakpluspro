<?php

namespace App\Controllers\Exercise;

use App\Controllers\BaseController;
use App\Models\MembershipModel;
use App\Models\ProgramModel;
use App\Libraries\MenuLoader;



class MembershipController extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Colombo');
    }


    public function index($id = 0)
    {
        $data = array();

    
        $menuLoader = new MenuLoader();
        $data = $menuLoader->loadMenuData();
        
        $model = new MembershipModel();
        $query = $model->select('*')->orderBy('id', 'asc');
        
        $user = session()->get('user_id');

        if($id == 0) {
            if($user != 3){
                $query->where('coach_id', $user);
            }
            
        }else{
            if($id != 3){
                $query->where('coach_id', $id);  
            } 
        }
        
        $data['members'] = $query->findAll();
        
        return view('pages/exercise/membership', $data);
    }




    public function create()
    {
        $validation = \Config\Services::validation()->setRules([
            'membership_name' => 'required|strip_tags',
        ]);

    // If it's an insert, validate the image file
        if (!$this->request->getVar('is_edit')) {
            $validation->setRules([
                'image_file' => 'uploaded[image_file]|max_size[image_file,1024]',
            ]);
        }

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON(["status" => 400, "message" => $validation->getErrors()]);
        }

        $membership_name = $this->request->getVar('membership_name');
        $is_edit = $this->request->getVar('is_edit');
        $membership_id = $this->request->getVar('membership_id');
        $imageFile = $this->request->getFile('image_file');
        $model = new MembershipModel();

        try {
        // Check if a file is uploaded and it's valid
            if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                $newName = $imageFile->getRandomName();
                $imageFile->move(ROOTPATH . 'public/uploads/membership_img/', $newName);
            }

            if ($is_edit == 0) {
                $rowCount = $model->select('membership_name')->where('membership_name', $membership_name)->countAllResults();
                if ($rowCount == 0) {
                    $data = [
                        'membership_name' => $membership_name,
                        'coach_id' => session()->get('user_id'),
                    'thumbnail' => isset($newName) ? $newName : null, // Set thumbnail only if a new image is uploaded
                ];
                $model->insert($data);
                return $this->response->setJSON(["status" => 201, "message" => "Membership Details Added successfully!"]);
            } else {
                return $this->response->setJSON(["status" => 409, "message" => "Membership Name Already Exists!"]);
            }
        } else {
            $existingMembership = $model->find($membership_id);
            if ($existingMembership) {
                // Update only if a new image file is uploaded
                if (isset($newName)) {
                    $data = ['thumbnail' => $newName, 'membership_name' => $membership_name];
                    $model->update($membership_id, $data);
                    return $this->response->setJSON(["status" => 200, "message" => "Membership Details Updated successfully!"]);
                } else {
                    // No new image file uploaded, update only other details
                    $data = ['membership_name' => $membership_name];
                    $model->update($membership_id, $data);
                    return $this->response->setJSON(["status" => 200, "message" => "Membership Details Updated successfully!"]);
                }
            } else {
                return $this->response->setJSON(["status" => 404, "message" => "Membership not found"]);
            }
        }
    } catch (\Exception $e) {
        return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
    }
}




public function getMembershipDetails($member_id = 0)
{
    $model = new MembershipModel();

        //get program list
    $data = $model->select('*')->where('id', $member_id)->get()->getResult();

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

       $p_model = new ProgramModel();


       $rowCount = $p_model->select('*')->where('membership', $id)->countAllResults();
       if ($rowCount > 0) {
        return $this->response->setJSON(["status" => 409, "message" => "Data Exists!"]); 
    }else{

        $model = new MembershipModel();

        if ($model->where('id', $id)->delete()) {

            // Deleted
            return $this->response->setJSON(["status" => 200, "message" => "Membership Deleted Successfully"]);
        } else {
            // Internal Server Error
            return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
        }
    }
}
}
