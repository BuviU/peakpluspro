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

		// // Load menu data using the custom library
		// $menuLoader = new MenuLoader();
		// $data = $menuLoader->loadMenuData();

		// $userModel = new UserModel();

		// // get all user accounts
		// $data['user_accounts'] = $userModel->select('user_acc_tbl.*, staff_members.name AS employee_name, group_profile.type AS profile_type')->where('user_acc_tbl.del', 0)->join('group_profile', 'group_profile.id = user_acc_tbl.group_id')->join('staff_members', 'staff_members.id = user_acc_tbl.emp_id')->orderBy('user_acc_tbl.group_id', 'asc')->findAll();

		// // get all group profiles
		// $groupProfileModel = new GroupProfileModel();
		// $data['group_profiles'] = $groupProfileModel->select('*')->where('del', 0)->findAll();

		// // get all staff members
		// $staffMemberModel = new StaffMemberModel();
		// $data['members'] = $staffMemberModel->select('*')->where('del', 0)->findAll();

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
				'message' => 'Account not found.'
			];
			return $this->response->setJSON($responseData);
		}
	}

	// route : base_url/settings/user_account/create
	public function create()
	{

		$validation = \Config\Services::validation();
		$validation->setRules([
			'group_profile' => 'required|strip_tags|numeric',
			'employee_id' => 'required|strip_tags|numeric',
			'username' => 'required|strip_tags|alpha_numeric_space',
			'password' => 'required|strip_tags',

		]);

		if ($validation->withRequest($this->request)->run()) {

			$group_profile = $this->request->getVar('group_profile');
			$employee_id = $this->request->getVar('employee_id');
			$username = $this->request->getVar('username');
			$password = $this->request->getVar('password');

			$model = new UserModel();
			$rowCount = $model->select('*')->where('user', $username)->countAllResults();

			if ($rowCount > 0) {
				// Conflict
				return $this->response->setJSON(["status" => 409, "message" => "Username already exists. Please choose a different one."]);
			} else {
				$data = [
					'group_id' => $group_profile,
					'user' => $username,
					'pass' => $password,
					'emp_id' => $employee_id,
					'access' => 1,
					'del' => 0,
				];

				if ($model->insert($data)) {
					// Created
					return $this->response->setJSON(["status" => 201, "message" => "User Account Created Successfully."]);
				} else {
					// Internal Server Error
					return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
				}
			}
		} else {
			// Bad Request
			return $this->response->setJSON(["status" => 400, "message" => "All fields are required."]);
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
				'group_id' => $group_profile,
				'emp_id' => $employee_id
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
