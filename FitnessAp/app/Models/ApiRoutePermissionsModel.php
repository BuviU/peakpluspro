<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiRoutePermissionsModel extends Model
{
    protected $table = 'api_route_permissions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['route_group_id', 'permission', 'description'];
    protected $returnType = 'array';
}
