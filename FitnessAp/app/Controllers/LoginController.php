<?php

namespace App\Controllers;

use App\Models\UserModel;


class LoginController extends BaseController
{

    public function index()
    {
        return view('pages/login.php');
    }

    public function login()
    {
        $validation = \Config\Services::validation();


        $validation->setRules([
            'username' => 'required|strip_tags|alpha_numeric_space',
            'password' => 'required|strip_tags',
        ]);

        if ($validation->withRequest($this->request)->run()) {
            
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $userModel = new UserModel();

            $user_data = $userModel->select('id, group_id, user, pass')
                ->where('user', $username)->get()->getRow();

            if (!empty($user_data) && password_verify($password, $user_data->pass)) {
                // echo 'test';

                $session_data = [
                    'user_id' => $user_data->id,
                    'username' => $user_data->user,
                    'group_id' => $user_data->group_id,
                    'emp_id' => $user_data->id,
                    'emp_code' => $user_data->id,
                    'logged_in' => true,
                ];

                $session = \Config\Services::session();
                $session->set($session_data);

                // update last_logged
                // $userModel->update($user_data->id, ['last_logged' => date('Y-m-d H:i:s')]);

                // // Succeeded
                return $this->response->setJSON(["status" => 200, "msg" => "Login Succeeded. Redirecting to dashboard..."]);

            } else {
                // Unauthorized
                return $this->response->setJSON(["status" => 401, "msg" => "Invalid Username or Password."]);
            }
        } else {
            // Bad Request
            return $this->response->setJSON(["status" => 400, "msg" => "Please provide username and password or the provided values are not valid."]);
        }
    }

    public function logout(){
        $session = \Config\Services::session();
        $session->destroy();
        return $this->response->setJSON(['status' => 200, 'msg' => 'Logout Succeeded. Redirecting to login page...']);
    }
    

    public function forbidden(){
        $session = \Config\Services::session();
        $session->destroy();
        return view('pages/403');
    }
}
