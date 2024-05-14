<?php

namespace App\Libraries;

use App\Models\HrmDataSyncHistoryModal;

class HrmDataSyncer
{
    protected $hrmApiRequestHelper;

    public function __construct()
    {
        $this->hrmApiRequestHelper = new \App\Helpers\HrmApiRequestHelper();
    }

    // run all sync functions
    public function sync()
    {
        $this->syncLocations();
        $this->syncCostCenters();
        $this->syncDesignations();
        $this->syncEmployees();
    }

    // sync all locations from HRM
    public function syncLocations($force_sync = false)
    {
        try {
            // get last synced time
            $lastSyncedTimeModal = new HrmDataSyncHistoryModal();
            $lastSyncedTime = $lastSyncedTimeModal->select('*')->findAll(1);

            $locations_last_synced = null;

            if (!empty($lastSyncedTime)) {
                $locations_last_synced = $lastSyncedTime[0]['locations_last_synced'];
            }

            // check the difference between last synced date time and current date time, if it is more than 1 hour, sync the data
            if ($force_sync == true || $locations_last_synced == null || (strtotime(date('Y-m-d H:i:s')) - strtotime($locations_last_synced)) > 3600) {

                // truncate the locations table
                $locationModel = new \App\Models\LocationModel();
                $locationModel->truncate();

                // get all locations from HRM API
                $locations = $this->hrmApiRequestHelper->NewRequest('GetAllLocations', 'GET', null);

                if ($locations['status'] == 200) {

                    // get the locations from the response
                    $locations = $locations['data'];

                    foreach ($locations as $location) {

                        $locationModel->insert([
                            'location_id' => $location['id'],
                            'location_name' => $location['name'],
                            'location_address' => $location['address']
                        ]);
                    }

                    // update the last synced time
                    $updatedTime = date('Y-m-d H:i:s');
                    $lastSyncedTimeModal->set('locations_last_synced', $updatedTime)->where('id', 1)->update();

                    return [
                        'status' => 200,
                        'message' => 'Locations synced successfully.'
                    ];
                } else {
                    return [
                        'status' => 500,
                        'message' => 'Error syncing locations'
                    ];
                }
            } else {
                return [
                    'status' => 200,
                    'message' => 'Locations already synced'
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
    }

    // sync all cost centers from HRM
    public function syncCostCenters($force_sync = false)
    {
        try {
            // get last synced time
            $lastSyncedTimeModal = new HrmDataSyncHistoryModal();
            $lastSyncedTime = $lastSyncedTimeModal->select('*')->findAll(1);

            $cost_centers_last_synced = null;

            if (!empty($lastSyncedTime)) {
                $cost_centers_last_synced = $lastSyncedTime[0]['cost_centers_last_synced'];
            }

            // check the difference between last synced date time and current date time, if it is more than 1 hour, sync the data
            if ($force_sync == true || $cost_centers_last_synced == null || (strtotime(date('Y-m-d H:i:s')) - strtotime($cost_centers_last_synced)) > 3600) {

                // truncate the cost_centers table
                $costCenterModel = new \App\Models\CostCenterModel();
                $costCenterModel->truncate();

                // get all locations from LocationModal
                $locationModel = new \App\Models\LocationModel();
                $locations = $locationModel->select('*')->findAll();

                // foreach location, get the cost centers from HRM API
                foreach ($locations as $location) {

                    $request_data = [
                        'locId' => $location['location_id'],
                        'userName' => "",
                    ];

                    // get all cost centers from HRM API
                    $cost_centers = $this->hrmApiRequestHelper->NewRequest('GetLocationWiseCostCenters', 'GET', $request_data);

                    if ($cost_centers['status'] == 200) {

                        // get the cost centers from the response
                        $cost_centers = $cost_centers['data'];

                        foreach ($cost_centers as $cost_center) {

                            $costCenterModel->insert([
                                'location_id' => $location['location_id'],
                                'cost_center_id' => $cost_center['id'],
                                'cost_center_code' => $cost_center['costCentreCode'],
                                'cost_center_name' => $cost_center['costCentreName']
                            ]);
                        }
                    }
                }

                // update the last synced time
                $updatedTime = date('Y-m-d H:i:s');
                $lastSyncedTimeModal->set('cost_centers_last_synced', $updatedTime)->where('id', 1)->update();

                return [
                    'status' => 200,
                    'message' => 'Cost centers synced successfully.'
                ];
            } else {
                return [
                    'status' => 200,
                    'message' => 'Cost centers already synced'
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
    }

    // sync all designations from HRM
    public function syncDesignations($force_sync = false)
    {
        try {
            // get last synced time
            $lastSyncedTimeModal = new HrmDataSyncHistoryModal();
            $lastSyncedTime = $lastSyncedTimeModal->select('*')->findAll(1);

            $designations_last_synced = null;

            if (!empty($lastSyncedTime)) {
                $designations_last_synced = $lastSyncedTime[0]['designations_last_synced'];
            }

            // check the difference between last synced date time and current date time, if it is more than 1 hour, sync the data
            if ($force_sync == true || $designations_last_synced == null || (strtotime(date('Y-m-d H:i:s')) - strtotime($designations_last_synced)) > 3600) {

                // truncate the designations table
                $designationModel = new \App\Models\DesignationModel();
                $designationModel->truncate();

                // get all desginations from HRM API
                $designations = $this->hrmApiRequestHelper->NewRequest('GetAllDesignations', 'GET', null);

                if ($designations['status'] == 200) {

                    // get the designations from the response
                    $designations = $designations['data'];

                    foreach ($designations as $designation) {

                        $designationModel->insert([
                            'designation_id' => $designation['id'],
                            'designation_name' => $designation['description'],
                        ]);
                    }

                    // update the last synced time
                    $updatedTime = date('Y-m-d H:i:s');
                    $lastSyncedTimeModal->set('designations_last_synced', $updatedTime)->where('id', 1)->update();

                    return [
                        'status' => 200,
                        'message' => 'Designations synced successfully.'
                    ];
                } else {
                    return [
                        'status' => 500,
                        'message' => $designations['message']
                    ];
                }
            } else {
                return [
                    'status' => 200,
                    'message' => 'Designations already synced'
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
    }

    // sync all employees from HRM
    public function syncEmployees($force_sync = false)
    {
        try {
            // get last synced time
            $lastSyncedTimeModal = new HrmDataSyncHistoryModal();
            $lastSyncedTime = $lastSyncedTimeModal->select('*')->findAll(1);

            $employees_last_synced = null;

            if (!empty($lastSyncedTime)) {
                $employees_last_synced = $lastSyncedTime[0]['employees_last_synced'];
            }

            // check the difference between last synced date time and current date time, if it is more than 1 hour, sync the data
            if ($force_sync == true || $employees_last_synced == null || (strtotime(date('Y-m-d H:i:s')) - strtotime($employees_last_synced)) > 3600) {

                // truncate the employees table
                $employeeModel = new \App\Models\EmployeesModal();
                $employeeModel->truncate();

                // get all employees from HRM API
                $employees = $this->hrmApiRequestHelper->NewRequest('GetAllEmployees', 'GET', null);

                if ($employees['status'] == 200) {

                    // get the employees from the response
                    $employees = $employees['data'];

                    foreach ($employees as $employee) {

                        $employeeModel->insert([
                            'emp_code' => $employee['empNumber'],
                            'name' => $employee['empName'],
                            'designation' => $employee['designation'],
                            'location' => $employee['empLocation'],
                            'cost_center' => $employee['empCostCenter'],
                        ]);
                    }

                    // update the last synced time
                    $updatedTime = date('Y-m-d H:i:s');
                    $lastSyncedTimeModal->set('employees_last_synced', $updatedTime)->where('id', 1)->update();

                    return [
                        'status' => 200,
                        'message' => 'Employees synced successfully.'
                    ];
                } else {
                    return [
                        'status' => 500,
                        'message' => 'Error syncing employees'
                    ];
                }
            } else {
                return [
                    'status' => 200,
                    'message' => 'Employees already synced'
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
    }
}
