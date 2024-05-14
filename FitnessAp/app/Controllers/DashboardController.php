<?php

namespace App\Controllers;

use App\Models\DocumentUploadModel;
use App\Models\DocumentForwardModel;
use App\Libraries\MenuLoader;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = array();

        // // Load menu data using the custom library
        $menuLoader = new MenuLoader();
        $data = $menuLoader->loadMenuData();

        // // get user's uploads count
        // $emp_code = session()->get('emp_code');
        // $document_upload_model = new DocumentUploadModel();
        // $data['user_uploads_count'] = $document_upload_model->where('employee_code', $emp_code)->countAllResults();

        // // get unseen mail count
        // $data['unseen_mail_count'] = 0;
        // $utility_data_controller = new UtilityDataController();
        // $inbox_data = json_decode($utility_data_controller->sync_notifications(), true);
        // if ($inbox_data) {
        //     $data['unseen_mail_count'] = count($inbox_data);
        // }

        // // get sent mail count
        // $data['sent_mail_count'] = 0;
        // $document_forward_model = new DocumentForwardModel();
        // $data['sent_mail_count'] = $document_forward_model->where('forwarded_by', $emp_code)->countAllResults();

        return view('pages/index', $data);
    }
}
