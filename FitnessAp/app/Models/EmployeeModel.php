<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'staff_members';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 
        'address', 
        'contact_no', 
        'dob', 
        'gender', 
        'email',
        'prof_pic', 
        'created_at', 
        'user', 
        'del', 
        'emp_num', 
        'updated_at',
        'deleted_at', 
        'status',
    ];
    protected $returnType = 'array';
}
