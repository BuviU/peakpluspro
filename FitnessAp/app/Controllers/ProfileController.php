<?php

namespace App\Controllers;

use App\Libraries\MenuLoader;
use App\Models\CostCenterModel;
use App\Models\DesignationModel;
use App\Models\LocationModel;
use App\Models\UserModel;

class ProfileController extends BaseController
{

    public function index()
    {
        $data = array();

        // Load menu data using the custom library
        $menuLoader = new MenuLoader();
        $data = $menuLoader->loadMenuData();

        // load employee data
        $data['employee_name'] = session()->get('employee_name');
        $data['emp_code'] = session()->get('emp_code');
		// get location_id from session
		$data['location_id'] = session()->get('location_id');
		// get location name from locationModel
		$location_model = new LocationModel();
		$location = $location_model->where('location_id', $data['location_id'])->first();
		$data['location_name'] = $location['location_name'];
		// get cost_center_id from session
		$data['cost_center_id'] = session()->get('cost_center_id');
		// get cost center name from costCenterModel
		$cost_center_model = new CostCenterModel();
		$cost_center = $cost_center_model->where('cost_center_id', $data['cost_center_id'])->first();
		$data['cost_center_name'] = $cost_center['cost_center_name'];
        // get designation_id from session
        $data['designation_id'] = session()->get('designation_id');
        // get designation name from designationModel
        $designation_model = new DesignationModel();
        $designation = $designation_model->where('designation_id', $data['designation_id'])->first();
        $data['designation_name'] = $designation['designation_name'];
        
        return view('pages/my_profile.php', $data);
    }

    public function change_password(){
        // get user_id from session
        $user_id = session()->get('user_id');

        // validate current_password, new_password and confirm_password
        $validation = \Config\Services::validation();
        $validation->setRules([
            'current_password' => 'required|strip_tags',
            'new_password' => 'required|strip_tags',
            'confirm_password' => 'required|strip_tags',
        ]);

        // validate request
        if ($validation->withRequest($this->request)->run()) {
            // get current_password, new_password and confirm_password
            $current_password = $this->request->getVar('current_password');
            $new_password = $this->request->getVar('new_password');
            $confirm_password = $this->request->getVar('confirm_password');

            // get user data from userModel
            $user_model = new UserModel();
            $user = $user_model->where('id', $user_id)->first();

            // check if current_password is correct
            if(password_verify($current_password, $user['pass'])){
                // check if new_password and confirm_password are same
                if($new_password == $confirm_password){
                    // update password
                    $user_model->update($user_id, ['pass' => password_hash($new_password, PASSWORD_DEFAULT)]);
                    // return success message
                    return json_encode(array('status' => 201, 'message' => 'Password changed successfully!'));
                }else{
                    // return error message
                    return json_encode(array('status' => 400, 'message' => 'New password and confirm password are not same!'));
                }
            }else{
                // return error message
                return json_encode(array('status' => 400, 'message' => 'Current password is incorrect!'));
            }

        }else{
            // return error message
            return json_encode(array('status' => 400, 'message' => 'Please fill all the required fields!'));
        }

    }
}
