<?php

namespace App\Models;

use CodeIgniter\Model;

class CoachModel extends Model
{
    protected $table = 'user_acc_tbl';
    protected $primaryKey = 'id';
    protected $allowedFields = ['f_name','l_name','email','prof_pic','gender','dob','group_id','user','pass'];
    protected $returnType = 'array';
}
