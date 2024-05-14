<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeesModal extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $allowedFields = ['emp_code', 'name', 'designation', 'location', 'cost_center'];
    protected $returnType = 'array';
}
