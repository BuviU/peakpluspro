<?php

namespace App\Controllers;

use App\Models\StaffMemberModel;
use App\Models\UserModel;


class AdminLoginController extends BaseController
{

    public function index()
    {
        return view('pages/admin_login.php');
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

            $user_data = $userModel->select('id, emp_id, emp_code, location_id, cost_center_id, designation_id, group_id, user, pass')
                ->where('user', $username)->get()->getRow();

            if (!empty($user_data) && password_verify($password, $user_data->pass)) {

                // get employee name from StaffMemberModel
                $employee_model = new StaffMemberModel();
                $employee = $employee_model->where('emp_num', $user_data->emp_code)->first();

                $session_data = [
                    'user_id' => $user_data->id,
                    'username' => $user_data->user,
                    'group_id' => $user_data->group_id,
                    'employee_name' => $employee['name'],
                    'emp_id' => $user_data->emp_code,
                    'emp_code' => $user_data->emp_code,
                    'location_id' => $user_data->location_id,
                    'cost_center_id' => $user_data->cost_center_id,
                    'designation_id' => $user_data->designation_id,
                    'is_admin' => 1,
                    'logged_in' => true,
                ];

                $session = \Config\Services::session();
                $session->set($session_data);

                // update last_logged
                $userModel->update($user_data->id, ['last_logged' => date('Y-m-d H:i:s')]);

                // Succeeded
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
}
