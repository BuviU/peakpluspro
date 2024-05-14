<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user_acc_tbl';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user', 'pass', 'group_id', 'access'];
    protected $returnType = 'array';
}
