<?php

namespace App\Libraries;

use App\Models\UserPrevQModel;
use App\Models\CoachModel;
use App\Models\MenuCategoryModel;
use App\Models\MenuListModel;
// use App\Models\HrmPrivilegeModel;

class MenuLoader
{
    public function loadMenuData()
    {
        $data = [];
        
        $emp_id = session()->get('emp_id');
        $user_id = session()->get('user_id');

        $userPrevQModel = new UserPrevQModel();

        $data['allowed_categories'] = $userPrevQModel
        ->select('cat_id, category, cat_oid')
        ->where('emp_id', $emp_id)
        ->where('user_id', $user_id)
        ->groupBy('category, cat_oid, cat_id')
        ->orderBy('cat_oid', 'ASC')
        ->findAll();

        $data['allowed_menu_list'] = $userPrevQModel
        ->select('cat_id, menu, menu_id, menu_oid, url,menu_icon')
        ->where('emp_id', $emp_id)
        ->where('user_id', $user_id)
        ->groupBy('menu_id, menu, menu_oid, cat_id, url,menu_icon')
        ->orderBy('menu_oid', 'ASC')
        ->findAll();

         
        $emp_code = session()->get('emp_code');

        $CoachModel = new CoachModel();
        $employee = $CoachModel->select('f_name , prof_pic')->where('id', $emp_code)->get()->getRow();

        $data['sidebar_employee_name'] = $employee->f_name;
        $data['sidebar_employee_prof_pic'] = $employee->prof_pic;


        $data['user_role'] = session()->get('group_id');

        return $data;
    }
}
