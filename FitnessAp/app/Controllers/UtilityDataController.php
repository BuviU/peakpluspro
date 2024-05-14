<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DocumentCategoryModel;
use App\Models\DocumentRegistryModel;
use App\Models\CostCenterModel;
use App\Models\DesignationModel;
use App\Helpers\ApiRequestHelper;
use App\Libraries\HrmDataSyncer;
use App\Models\DocumentForwardModel;
use App\Models\DocumentSeenModel;
use App\Models\EmployeesModal;

class UtilityDataController extends BaseController
{
	protected $API;

	public function __construct()
	{
		$this->API = new ApiRequestHelper();
		date_default_timezone_set('Asia/Colombo');
	}

	// route : base_url/data/sync_hrm_data
	public function sync_hrm_data()
	{
		// instiate HrmDataSyncer
		$hrm_data_syncer = new HrmDataSyncer();
		// sync hrm data
		$hrm_data_syncer->sync();
	}

	// route : base_url/data/get_system_categories/(:alphanum)
	public function get_system_categories($id = 0)
	{
		// get system categories from DocumentCategoryModel
		$category_model = new DocumentCategoryModel();
		$categories = $category_model->where('is_deleted', 0)->where('system_id', $id)->findAll();
		return json_encode($categories);
	}

	// route : base_url/data/get_category_registries/(:num)
	public function get_category_registries($id = 0)
	{
		// get system registries from DocumentRegistryModel
		$registry_model = new DocumentRegistryModel();
		$registries = $registry_model->where('is_deleted', 0)->where('category_id', $id)->findAll();
		return json_encode($registries);
	}

	// route : base_url/data/get_cost_centers/(:num)
	public function get_cost_centers($id = 0)
	{
		// get cost centers from CostCenterModel
		$cost_center_model = new CostCenterModel();
		$cost_centers = $cost_center_model->where('location_id', $id)->orderBy('cost_center_name', 'ASC')->findAll();
		return json_encode($cost_centers);
	}

	// route : base_url/data/get_designations
	public function get_designations()
	{
		// get designations from DesignationModel
		$designation_model = new DesignationModel();
		// $designations = $designation_model->where('cost_center_id', $id)->findAll();
		$designations = $designation_model->orderBy('designation_name', 'ASC')->findAll();
		return json_encode($designations);
	}

	// route : base_url/data/get_designations_from_employees
	public function get_designations_from_employees()
	{
		// get post data
		$location = $this->request->getVar('location');
		$cost_center = $this->request->getVar('cost_center');
		// get employees from EmployeesModal where designation_id = $id
		$employee_model = new EmployeesModal();
		$designations = $employee_model->distinct()->select('designation')->where('location', $location)->where('cost_center', $cost_center)->findAll();
		return json_encode($designations);
	}

	// route : base_url/data/get_employees
	public function get_employees()
	{
		// get post data
		$location = $this->request->getVar('location');
		$cost_center = $this->request->getVar('cost_center');
		$designation = $this->request->getVar('designation');
		// get employees from EmployeesModal where designation_id = $id
		$employee_model = new EmployeesModal();
		$employees = $employee_model->select('emp_code, name, designation')->where('location', $location)->where('cost_center', $cost_center)->where('designation', $designation)->orderBy('name', 'ASC')->findAll();
		return json_encode($employees);
	}

	// route : base_url/data/get_employee_by_code/(:alphanum)
	public function get_employee_by_code($emp_code = null)
	{
		// get employee from EmployeesModal where emp_code = $emp_code
		$employee_model = new EmployeesModal();
		$employee = $employee_model->where('emp_code', $emp_code)->findAll(1);
		return json_encode($employee);
	}

	// route : base_url/data/sync_notifications
	public function sync_notifications()
	{
		// get data from session
		$designation_id = session()->get('designation_id');
		$cost_center_id = session()->get('cost_center_id');
		$location_id = session()->get('location_id');
		$emp_code = session()->get('emp_code');

		$mailBoxModel = new DocumentForwardModel();
		$inbox_list = $mailBoxModel->select('*')
			->where("designation_id IS NOT NULL AND cost_center_id IS NULL AND location_id IS NULL AND emp_id IS NULL AND designation_id = $designation_id")
			->orWhere("location_id IS NOT NULL AND cost_center_id IS NULL AND designation_id IS NULL AND emp_id IS NULL AND location_id = $location_id")
			->orWhere("location_id IS NOT NULL AND cost_center_id IS NOT NULL AND designation_id IS NULL AND emp_id IS NULL AND location_id = $location_id AND cost_center_id = $cost_center_id")
			->orWhere("location_id IS NOT NULL AND cost_center_id IS NOT NULL AND designation_id IS NOT NULL AND emp_id IS NULL AND location_id = $location_id AND cost_center_id = $cost_center_id AND designation_id = $designation_id")
			->orWhere("location_id IS NOT NULL AND cost_center_id IS NOT NULL AND designation_id IS NOT NULL AND emp_id IS NOT NULL AND location_id = $location_id AND cost_center_id = $cost_center_id AND designation_id = $designation_id AND emp_id = $emp_code")
			->orderBy('forwarded_at', 'DESC')->findAll();

		// var_dump($mailBoxModel->getLastQuery());
		$model = new DocumentSeenModel();
		$seen_list = $model->where('seen_user_id',  $emp_code)->findAll();

		// loop through inbox list and check if the forward id is in the seen list
		$inbox_data = [];
		foreach ($inbox_list as $inbox_item) {
			$is_seen = false;
			foreach ($seen_list as $seen_item) {
				if ($inbox_item['id'] == $seen_item['forward_id']) {
					$is_seen = true;
				}
			}

			if (!$is_seen) {
				$inbox_data[] = [
					'id' => $inbox_item['id'],
					'document_id' => $inbox_item['document_id'],
					'document_name' => $inbox_item['document_name'],
					'is_a_document' => $inbox_item['is_a_document'],
					'forwarded_at' => $inbox_item['forwarded_at'],
					'forwarded_by_name' => $inbox_item['forwarded_by_name']
				];
			}
		}

		return json_encode($inbox_data);
	}
}
