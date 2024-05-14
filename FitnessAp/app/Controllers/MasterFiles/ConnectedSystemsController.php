<?php

namespace App\Controllers\MasterFiles;

use App\Controllers\BaseController;
use App\Models\ConnectedSystemModel;
use App\Libraries\MenuLoader;

class ConnectedSystemsController extends BaseController
{
	public function __construct()
	{
		date_default_timezone_set('Asia/Colombo');
	}

	// route : base_url/master_files/connected_systems
	public function index()
	{
		$data = array();

		// Load menu data using the custom library
		$menuLoader = new MenuLoader();
		$data = $menuLoader->loadMenuData();

		// user_role
		$data['user_role'] = session()->get('group_id');

		// Load connected systems data
		$model = new ConnectedSystemModel();
		$data['connected_systems'] = $model->where('del', 0)->findAll();

		return view('pages/master_files/connected_systems', $data);
	}

	// route : base_url/master_files/connected_systems/create
	public function create()
	{
		/**
		 * get system name from POST request.
		 * validate system name.
		 * generate a unique system id for the system.
		 * generate a new API key for the system.
		 * save system name, system id and API key in the database.
		 */
		$validation = \Config\Services::validation();
		$validation->setRules([
			'system_name' => 'required|strip_tags|max_length[50]'
		]);

		if ($validation->withRequest($this->request)->run()) {

			$system_name = $this->request->getVar('system_name');
			// generate a unique system id for the system.
			$system_id = uniqid();
			// generate a new api_key for the system
			$api_key = bin2hex(random_bytes(32));

			$model = new ConnectedSystemModel();
			$rowCount = $model->select('system_name')->where('system_name', $system_name)->countAllResults();

			if ($rowCount > 0) {
				// Conflict
				return $this->response->setJSON(["status" => 409, "message" => "System name already exists. Please choose a different name."]);
			} else {
				$data = [
					'system_id' => $system_id,
					'system_name' => $system_name,
					'api_key' => $api_key,
					'access' => 0,
					'connected_at' => date('Y-m-d H:i:s'),
					'del' => 0,
					'user' => session()->get('emp_code'),
				];

				if ($model->insert($data)) {
					// Created
					return $this->response->setJSON(["status" => 201, "message" => "New System Connected Successfully."]);
				} else {
					// Internal Server Error
					return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
				}
			}
		} else {
			// Bad Request
			return $this->response->setJSON(["status" => 400, "message" => "Please provide a new system name or the provided name is not valid."]);
		}
	}

	// route : base_url/master_files/connected_systems/update_access/$1
	public function update_access($id = 0)
	{

		$model = new ConnectedSystemModel();
		$rowCount = $model->select('system_id')->where('id', $id)->countAllResults();

		if ($rowCount > 0) {
			// get current access status
			$access = $model->select('access')->where('id', $id)->get()->getRowArray()['access'];
			$access = $access == 1 ? 0 : 1;
			$data = [
				'access' => $access,
				'access_last_updated_at' => date('Y-m-d H:i:s'),
				'user' => session()->get('emp_code'),
			];

			if ($model->update($id, $data)) {
				// OK
				return $this->response->setJSON(["status" => 200, "message" => "Access Updated Successfully."]);
			} else {
				// Internal Server Error
				return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
			}
		} else {
			// Not Found
			return $this->response->setJSON(["status" => 404, "message" => "System not found."]);
		}

		// Internal Server Error
		return $this->response->setJSON(["status" => 500, "message" => "An unexpected error. Something went wrong."]);
	}

	// route : base_url/master_files/connected_systems/update/$1
	public function update($id = 0)
	{
		$model = new ConnectedSystemModel();
		$rowCount = $model->select('system_name')->where('id', $id)->countAllResults();

		if ($rowCount > 0) {

			// generate a new api_key for the system
			$api_key = bin2hex(random_bytes(32));

			$data = [
				'api_key' => $api_key,
				'access' => 0,
				'user' => session()->get('emp_code'),
			];

			if ($model->update($id, $data)) {
				// OK
				return $this->response->setJSON(["status" => 200, "message" => "API Key updated successfully."]);
			} else {
				// Internal Server Error
				return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
			}
		} else {
			// Not FOund
			return $this->response->setJSON(["status" => 404, "message" => "System not found."]);
		}
	}

	// route : base_url/master_files/connected_systems/delete/$1
	public function delete($id = 0)
	{
		if ($id == 1) {
			// Bad Request
			return $this->response->setJSON(["status" => 400, "message" => "You cannot delete this system."]);
		} else {
			$model = new ConnectedSystemModel();
			$rowCount = $model->select('system_id')->where('id', $id)->countAllResults();

			if ($rowCount > 0) {
				$data = [
					'del' => 1,
					'user' => session()->get('emp_code'),
				];

				if ($model->update($id, $data)) {
					// OK
					return $this->response->setJSON(["status" => 200, "message" => "System deleted successfully."]);
				} else {
					// Internal Server Error
					return $this->response->setJSON(["status" => 500, "message" => "Something went wrong"]);
				}
			} else {
				// Not Found
				return $this->response->setJSON(["status" => 404, "message" => "System not found."]);
			}
		}

		// Internal Server Error
		return $this->response->setJSON(["status" => 500, "message" => "An unexpected error. Something went wrong."]);
	}
}
