<?php

namespace App\Controllers\Exercise;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Libraries\MenuLoader;

class UsersController extends BaseController
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
        $model = new ClientModel();
        // get all workout details
        $data['clients'] = $model->select('*')->findAll();

        return view('pages/exercise/users', $data);
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
            //$description = $this->request->getVar('description');
            $imageFile = $this->request->getFile('image_file');

            $model = new ClientModel();
            // check if menu name already exists under the workout
            $rowCount = $model->select('f_name')->where('email', $email)->countAllResults();
            // if rowCount < 1, then workout name is not exists
            if ($rowCount == 0) {

                try {
                    // Check if the file is valid and not moved
                    if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                        // Generate a unique name for the file
                        $newName = $imageFile->getRandomName();

                        // Move the file to the desired directory
                        $imageFile->move(ROOTPATH . 'public/uploads/client_img', $newName);

                        // Update the 'thumbnail' field in $data
                        // $data['thumbnail'] = $newName;
                        $id = uniqid();

                        
                        $data = [
                            'user_id' => $id,
                            'f_name' => $f_name,
                            'l_name' => $l_name,
                            'email' => $email,
                            'gender' => $gender,
                            'dob' => $dob,
                            'prof_pic' => $newName,
                        ];

                        

                        if ($model->insert($data)) {
                            // Created
                            return $this->response->setJSON(["status" => 201, "message" => "User Details Added successfully!"]);
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
                    return $this->response->setJSON(["status" => 408, "message" => "This User Email Already Exists!"]);
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

    /************** EDIT ******************/
    public function edit($id = 0)
    {
        $data = array();

        // // Load menu data using the custom library
        $menuLoader = new MenuLoader();
        $data = $menuLoader->loadMenuData();
        $model = new ClientModel();
        $data["user"] = $model->where('user_id', $id)->first();

        //return view with data
        return view('pages/exercise/edit_user', $data);
    }

    /************** UPDATE ******************/
    public function update()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required|strip_tags',
            'f_name' => 'required|strip_tags',
            'l_name' => 'required|strip_tags',
            'email' => 'required|strip_tags',
            'gender' => 'required|strip_tags',
            'dob' => 'required|strip_tags',
        ]);

        if ($validation->withRequest($this->request)->run()) {

            $user_id = $this->request->getVar('id');
            $f_name = $this->request->getVar('f_name');
            $l_name = $this->request->getVar('l_name');
            $email = $this->request->getVar('email');
            $gender = $this->request->getVar('gender');
            $dob = $this->request->getVar('dob');

            $imageFile = $this->request->getFile('image_file');

            $model = new ClientModel();

            $data = [
                'f_name' => $f_name,
                'l_name' => $l_name,
                'email' => $email,
                'gender' => $gender,
                'dob' => $dob,
            ];

            // Check if the file is valid and not moved
            if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {

                // Generate a unique name for the file
                $newName = $imageFile->getRandomName();

                // Move the file to the desired directory
                $imageFile->move(ROOTPATH . 'public/uploads/client_img', $newName);

                // Update the 'thumbnail' field in $data
                $data['prof_pic'] = $newName;

                log_message('info', $newName);
            }

            if ($model->update($user_id, $data)) {
                // OK
                return $this->response->setJSON(["status" => 200, "message" => "User Details Updated successfully!"]);
            } else {
                // Internal Server Error
                return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
            }
        } else {
            // Bad Request
            $errors = $validation->getErrors();
            return $this->response->setJSON(["status" => 400, "message" => $errors]);
        }
    }
}