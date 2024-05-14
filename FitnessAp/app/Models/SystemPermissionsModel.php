<?php

namespace App\Models;

use CodeIgniter\Model;

class SystemPermissionsModel extends Model
{
    protected $table = 'system_permissions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['system_id', 'permission_id'];
    protected $returnType = 'array';
}
