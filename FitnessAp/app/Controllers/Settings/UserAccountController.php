<?php

namespace App\Controllers\Settings;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\GroupProfileModel;
use App\Models\StaffMemberModel;

use App\Libraries\MenuLoader;

class UserAccountController extends BaseController
{
	public function __construct()
	{
		date_default_timezone_set('Asia/Colombo');
	}

	// route : base_url/settings/user_account
	public function index()
	{
		$data = array();

		// Load menu data using the custom library
		$menuLoader = new MenuLoader();
		$data = $menuLoader->loadMenuData();

		$userModel = new UserModel();

		// get all user accounts
		$user_accounts = $userModel->select('user_acc_tbl.*, staff_members.name AS employee_name, group_profile.type AS profile_type')->join('group_profile', 'group_profile.id = user_acc_tbl.group_id')->join('staff_members', 'staff_members.emp_num = user_acc_tbl.emp_id')->orderBy('user_acc_tbl.group_id', 'asc')->findAll();

		$data['user_accounts'] = $user_accounts;

		// an array containing the emp_id of all user accounts
		$emp_ids = array();
		foreach ($user_accounts as $user_account) {
			array_push($emp_ids, $user_account['emp_id']);
		}

		// get all group profiles
		$groupProfileModel = new GroupProfileModel();
		$data['group_profiles'] = $groupProfileModel->select('*')->where('del', 0)->findAll();

		// get all staff members
		$staffMemberModel = new StaffMemberModel();
		$members = $staffMemberModel->select('*')->where('del', 0)->findAll();

		// get all staff members who are not user accounts
		$non_user_members = array();
		foreach ($members as $member) {
			if (!in_array($member['emp_num'], $emp_ids)) {
				array_push($non_user_members, $member);
			}
		}

		$data['members'] = $non_user_members;

		return view('pages/settings/user_account', $data);
	}

	// route : base_url/settings/user_account/show/$1
	public function show($id = 0)
	{

		$userModel = new UserModel();
		// get user account by id
		$data = $userModel->find($id);

		// if data is not empty
		if (!empty($data)) {
			// get employee name from staff_members table
			$staffMemberModel = new StaffMemberModel();
			$employee = $staffMemberModel->select('name')->where('emp_num', $data['emp_id'])->findAll(1);
			$responseData = [
				'status' => 200, // Success
				'error' => null,
				'message' => 'Data retrieved successfully.',
				'data' => $data,
				'employee_name' => $employee[0]['name']
			];


			return $this->response->setJSON($responseData);
			// return $this->respond($response);
		} else {
			$responseData = [
				'status' => 404, // Not found
				'error' => null,
				'message' => 'Account not found.'
			];
			return $this->response->setJSON($responseData);
		}
	}

	// route : base_url/settings/user_account/create
	public function create()
	{
		try {
			$validationData = [
				'group_profile' => 'required|strip_tags|numeric|not_in_list[0]',
				'employee_id' => 'required|strip_tags|numeric|not_in_list[0]',
				'login_type' => 'required|numeric|in_list[1,2]',
				'username' => 'required|strip_tags|alpha_numeric_space',
				'password' => 'required|strip_tags',
			];

			// if login_type == 1, then username and password is not required
			if ($this->request->getVar('login_type') == 1) {
				unset($validationData['username']);
				unset($validationData['password']);
			}

			$validation = \Config\Services::validation();
			$validation->setRules($validationData);


			if ($validation->withRequest($this->request)->run()) {

				$group_profile = $this->request->getVar('group_profile');
				$employee_id = $this->request->getVar('employee_id');
				$username = $this->request->getVar('username');
				$password = $this->request->getVar('password');
				$login_type = $this->request->getVar('login_type');

				// user will log using HRM login credentials
				if ($login_type == 1) {
					$username = null;
					$password = null;
				}

				$rowCount = 0;

				$model = new UserModel();
				if ($login_type == 2) {
					$rowCount = $model->select('*')->where('user', $username)->countAllResults();
				}

				if ($rowCount > 0) {
					// Conflict
					return $this->response->setJSON(["status" => 409, "message" => "Username already exists. Please choose a different one."]);
				} else {
					// get emp_num, location_id, cost_center_id, designation_id from staff_members table
					$staffMemberModel = new StaffMemberModel();
					$staffMember = $staffMemberModel->select('emp_num, location_id, cost_center_id, designation_id')->where('id', $employee_id)->findAll(1);
					if ($login_type == 2) {
						// hash password
						$password = password_hash($password, PASSWORD_DEFAULT);
					}
					$data = [
						'group_id' => $group_profile,
						'user' => $username,
						'pass' => $password,
						'emp_id' => $staffMember[0]['emp_num'],
						'emp_code' => $staffMember[0]['emp_num'],
						'location_id' => $staffMember[0]['location_id'],
						'cost_center_id' => $staffMember[0]['cost_center_id'],
						'designation_id' => $staffMember[0]['designation_id'],
						'login_type' => $login_type,
						'access' => 1,
					];

					$model->insert($data); // insert data to user_acc_tbl
					return $this->response->setJSON(["status" => 201, "message" => "User Account Created Successfully."]);
				}
			} else {
				// Bad Request
				return $this->response->setJSON(["status" => 400, "message" => "All fields are required."]);
			}
		} catch (\Exception $e) {
			return $this->response->setJSON(["status" => 500, "message" => $e->getMessage()]);
		}
	}

	// route : base_url/settings/user_account/update/$1
	public function update($id = 0)
	{

		$validation = \Config\Services::validation();
		$validation->setRules([
			'group_profile_edit' => 'required|strip_tags|numeric',
			'employee_id_edit' => 'required|strip_tags|numeric',
		]);

		$data = $this->request->getRawInput();

		if ($validation->run($data)) {

			$group_profile = $this->request->getRawInputVar('group_profile_edit');
			$employee_id = $this->request->getRawInputVar('employee_id_edit');

			$model = new UserModel();
			$data = [
				'group_id' => $group_profile
			];

			if ($model->update($id, $data)) {
				// Created
				return $this->response->setJSON(["status" => 201, "message" => "User Account Updated Successfully."]);
			} else {
				// Internal Server Error
				return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
			}
		} else {
			// Bad Request
			return $this->response->setJSON(["status" => 400, "message" => "All fields are required."]);
		}
	}

	// route : base_url/settings/user_account/delete/$1 
	public function delete($id)
	{
		$model = new UserModel();
		$data = [
			'access' => 0,
			'del' => 1,
		];
		if ($model->update($id, $data)) {
			// Deleted
			return $this->response->setJSON(["status" => 200, "message" => "User Account Deleted Successfully"]);
		} else {
			// Internal Server Error
			return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
		}
	}
}
