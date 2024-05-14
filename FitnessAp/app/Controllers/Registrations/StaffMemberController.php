<?php

namespace App\Controllers\Registrations;

use App\Controllers\BaseController;
use App\Models\LocationModel;
use App\Models\CostCenterModel;
use App\Models\DesignationModel;
use App\Models\StaffMemberModel;
use App\Models\EmployeesModal;

use App\Libraries\MenuLoader;
use App\Models\UserModel;
use Exception;

class StaffMemberController extends BaseController
{
	public function __construct()
	{
		date_default_timezone_set('Asia/Colombo');
	}

	// route : base_url/registrations/staff_member
	public function index()
	{
		$data = array();

		// Load menu data using the custom library
		$menuLoader = new MenuLoader();
		$data = $menuLoader->loadMenuData();

		$model = new StaffMemberModel();
		// get all staff members where del = 0
		$data['members'] = $model->select('*')->where('del', 0)->findAll();

		// get user_id from session as user_role
		$data['user_role'] = session()->get('group_id');

		return view('pages/registrations/employees/all_employees', $data);
	}

	// route : base_url/registrations/staff_member/new
	public function new()
	{
		$data = array();

		// Load menu data using the custom library
		$menuLoader = new MenuLoader();
		$data = $menuLoader->loadMenuData();

		// load location data
		$location_model = new LocationModel();
		$data['locations'] = $location_model->findAll();

		// get user_id from session as user_role
		$data['user_role'] = session()->get('group_id');
		// submit type
		$data['submit_type'] = "insert";
		return view('pages/registrations/employees/new_employee', $data);
	}

	// show staff member - route : base_url/registrations/staff_member/show/$id
	public function show($id = 0)
	{
		$data = array();

		// get user_id from session as user_role
		$data['user_role'] = session()->get('group_id');

		// Load menu data using the custom library
		$menuLoader = new MenuLoader();
		$data = $menuLoader->loadMenuData();

		// submit type
		$data['submit_type'] = "update";

		$model = new StaffMemberModel();
		// get staff member by id
		$data['member'] = $model->find($id);

		// load location data
		$location_model = new LocationModel();
		$data['locations'] = $location_model->findAll();

		return view('pages/registrations/employees/new_employee', $data);
	}

	// create new staff member - route : base_url/registrations/staff_member/create
	public function create()
	{
		try {

			
			$validation = \Config\Services::validation();
			$validation->setRules(
				[
					'emp_name' => 'required|strip_tags',
					'email' => 'required|strip_tags',
					'gender' => 'permit_empty|strip_tags',
					'contact' => 'permit_empty|strip_tags|numeric',
					'city' => 'required|strip_tags',
					'address' => 'required|strip_tags',
					'gender' => 'required|strip_tags'
				],
					[   // Errors
					'location' => [
						'is_natural_no_zero' => 'Please select a Location.',
					],
					'cost_center' => [
						'is_natural_no_zero' => 'Please select a Cost Center.',
					],
					'designation' => [
						'is_natural_no_zero' => 'Please select a Designation.',
					],
					'employee' => [
						'is_natural_no_zero' => 'Please select an Employee.',
					],
				]
			);

			if ($validation->withRequest($this->request)->run()) {

				$name = $this->request->getVar('employee');
				$email = $this->request->getVar('email');
				$contact_no = $this->request->getVar('contact');
				$employee_number = $this->request->getVar('employee_number');
				$location = $this->request->getVar('location');
				$cost_center = $this->request->getVar('cost_center');
				$designation = $this->request->getVar('designation');

					// validate employee number
				$employee_model = new EmployeesModal();
				$employee_data = $employee_model->select('emp_code, name')->where('emp_code', $employee_number)->findAll(1);
				if (empty($employee_data)) {
					return $this->response->setJSON(["status" => 400, "message" => "Invalid Employee Number.", "errors" => null]);
				}
					// get employee name
				$name = $employee_data[0]['name'];

				$model = new StaffMemberModel();
					// check if emp_num already exists
				$rowCount = $model->select('emp_num')->where('emp_num', $employee_number)->where('del', 0)->countAllResults();
					// if rowCount < 1, then emp_num is not exists
				if ($rowCount < 1) {
						// get location_name from LocationModel
					$location_model = new LocationModel();
					$location_data = $location_model->select('location_name')->where('location_id', $location)->findAll(1);
					$location_name = $location_data[0]['location_name'];
						// get cost_center_name from CostCenterModel
					$cost_center_model = new CostCenterModel();
					$cost_center_data = $cost_center_model->select('cost_center_name')->where('cost_center_id', $cost_center)->findAll(1);
					$cost_center_name = $cost_center_data[0]['cost_center_name'];
						// get designation id from designation name
					$designation_model = new DesignationModel();
					$designation_data = $designation_model->where('designation_name', $designation)->findAll(1);
					$designation_id = $designation_data[0]['designation_id'];
						// data to insert
					$data = [
						'name' => $name,
						'email' => $email,
						'contact_no' => $contact_no,
						'emp_num' => $employee_number,
						'location_id' => $location,
						'location_name' => $location_name,
						'cost_center_id' => $cost_center,
						'cost_center_name' => $cost_center_name,
						'designation_id' => $designation_id,
						'designation_name' => $designation,
						'del' => 0,
						'user' => session()->get('emp_code'),
						'created_at' => date('Y-m-d H:i:s')
					];

					if ($model->insert($data)) {
							// Created
						return $this->response->setJSON(["status" => 201, "message" => "Employee Registered Successfully."]);
					} else {
							// Internal Server Error
						return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
					}
				} else {
						// Conflict
					return $this->response->setJSON(["status" => 409, "message" => "This employee is already registered."]);
				}
			} else {
					// Bad Request
				return $this->response->setJSON(["status" => 400, "message" => "Form validation error", "errors" => $validation->getErrors()]);
			}

		} catch (Exception $e) {
			return $this->response->setJSON(["status" => 500, "message" => $e->getMessage()]);
		}
	}

	// update staff member - route : base_url/registrations/staff_member/update
	public function update()
	{
		try {
			if (session()->get('is_admin') == 1) {
				$validation = \Config\Services::validation();
				$validation->setRules(
					[
						'employee_number' => 'required|strip_tags|alpha_numeric_space',
						'email' => 'permit_empty|strip_tags',
						'contact' => 'permit_empty|strip_tags|numeric',
					]
				);

				if ($validation->withRequest($this->request)->run()) {

					$id = $this->request->getVar('id');
					$email = $this->request->getVar('email');
					$contact_no = $this->request->getVar('contact');
					$employee_number = $this->request->getVar('employee_number');

					// validate employee number
					$employee_model = new EmployeesModal();
					$employee_data = $employee_model->select('emp_code, name')->where('emp_code', $employee_number)->findAll(1);
					if (empty($employee_data)) {
						return $this->response->setJSON(["status" => 400, "message" => "Invalid Employee Number.", "errors" => null]);
					}

					$model = new StaffMemberModel();
					$data = [
						'email' => $email,
						'contact_no' => $contact_no,
						'del' => 0,
						'user' => session()->get('emp_code'),
						'updated_at' => date('Y-m-d H:i:s')
					];

					if ($model->update($id, $data)) {
						// Updated
						return $this->response->setJSON(["status" => 200, "message" => "Employee Details Updated Successfully"]);
					} else {
						// Internal Server Error
						return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
					}
				} else {
					// Bad Request
					return $this->response->setJSON(["status" => 400, "message" => "Form validation error", "errors" => $validation->getErrors()]);
				}
			} else {
				// Forbidden
				return $this->response->setJSON(["status" => 403, "message" => "You don't have permissions."]);
			}
		} catch (Exception $e) {
			return $this->response->setJSON(["status" => 500, "message" => $e->getMessage()]);
		}
	}

	public function delete()
	{
		try {
			if (session()->get('is_admin') == 1) {
				$emp_code = $this->request->getVar('emp_num');
				$model = new StaffMemberModel();
				$data = [
					'del' => 1,
					'user' => session()->get('emp_code'),
					'deleted_at' => date('Y-m-d H:i:s')
				];
				// update where emp_num = $emp_code
				if ($model->set($data)->where('emp_num', $emp_code)->update()) {
					// Delete user account from UserModel
					$user_model = new UserModel();
					$user_model->where('emp_id', $emp_code)->delete();
					// Deleted
					return $this->response->setJSON(["status" => 200, "message" => "Employee Deleted Successfully."]);
				} else {
					// Internal Server Error
					return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
				}
			} else {
				// Forbidden
				return $this->response->setJSON(["status" => 403, "message" => "You don't have permissions."]);
			}
		} catch (Exception $e) {
			return $this->response->setJSON(["status" => 500, "message" => $e->getMessage()]);
		}
	}
}
