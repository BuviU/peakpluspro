<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffMemberModel extends Model
{
    protected $table = 'staff_members';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'address', 'nic_no', 'contact_no', 'dob', 'gender', 'email', 'prof_pic', 'location_id', 'location_name', 'cost_center_id', 'cost_center_name', 'designation_id', 'designation_name', 'created_at', 'user', 'del', 'emp_num', 'updated_at', 'deleted_at', 'status'];
    protected $returnType = 'array';
}
