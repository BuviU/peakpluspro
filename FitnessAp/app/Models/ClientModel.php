<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','f_name','l_name','email','gender','prof_pic','dob'];
    protected $returnType = 'array';
}
