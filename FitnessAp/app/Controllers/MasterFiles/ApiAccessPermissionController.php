<?php

namespace App\Controllers\MasterFiles;

use App\Controllers\BaseController;
use App\Models\ConnectedSystemModel;
use App\Models\ApiRouteGroupsModel;
use App\Models\ApiRoutePermissionsModel;
use App\Models\SystemPermissionsModel;
use App\Libraries\MenuLoader;

class ApiAccessPermissionController extends BaseController
{
	public function __construct()
	{
		date_default_timezone_set('Asia/Colombo');
	}

	// route : base_url/master_files/api_access_permissions
	public function index($system_id = 0)
	{
		$data = array();

		// Load menu data using the custom library
		$menuLoader = new MenuLoader();
		$data = $menuLoader->loadMenuData();

		// user_role
		$data['user_role'] = session()->get('group_id');

		$data['system_id'] = $system_id;

		// get all system_name from connected system table
		$connectedSystemModel = new ConnectedSystemModel();
		$data['systems'] = $connectedSystemModel->select('id, system_id, system_name')->where('del', 0)->findAll();

		if ($system_id != 0) {
			// get all api route groups from api_route_groups table
			$apiRouteGroupsModel = new ApiRouteGroupsModel();
			$data['api_route_groups'] = $apiRouteGroupsModel->select('id, group_name')->findAll();

			// get all api route permissions from api_route_permissions table
			$apiRoutePermissionsModel = new ApiRoutePermissionsModel();
			$data['api_route_permissions'] = $apiRoutePermissionsModel->select('id, route_group_id, permission, description')->findAll();

			// get all system permissions from system_permissions table
			$systemPermissionsModel = new SystemPermissionsModel();
			$data['system_permissions'] = $systemPermissionsModel->select('id, permission_id')->where('system_id', $system_id)->findAll();
		}

		return view('pages/master_files/api_permissions', $data);
	}

	// add privilege - route : base_url/master_files/api_access_permissions/add/$system_id/$permission_id
	public function add($system_id = 0, $permission_id = 0)
	{
		if ($system_id > 0 && $permission_id > 0) {

			$systemPermissionsModel = new SystemPermissionsModel();

			// create an data array
			$data = array(
				'system_id' => $system_id,
				'permission_id' => $permission_id
			);

			// add privilege
			if ($systemPermissionsModel->insert($data)) {
				return $this->response->setJSON(["status" => 201, "message" => "Permission Added Successfully."]);
			} else {
				return $this->response->setJSON(["status" => 500, "message" => "Something went wrong."]);
			}
		} else {
			return $this->response->setJSON(["status" => 400, "message" => "Bad Request"]);
		}
	}

	// remove privilege - route : base_url/master_files/api_access_permissions/remove/$id
	public function remove($id = 0)
	{
		if ($id > 0) {

			$systemPermissionsModel = new SystemPermissionsModel();

			// remove privilege
			if ($systemPermissionsModel->delete($id)) {
				return $this->response->setJSON(["status" => 200, "message" => "Permission Added Successfully."]);
			} else {
				return $this->response->setJSON(["status" => 500, "message" => "Something went wrong."]);
			}
		} else {
			return $this->response->setJSON(["status" => 400, "message" => "Bad Request"]);
		}
	}
}
