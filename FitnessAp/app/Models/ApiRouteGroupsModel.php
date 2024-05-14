<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiRouteGroupsModel extends Model
{
    protected $table = 'api_route_groups';
    protected $primaryKey = 'id';
    protected $allowedFields = ['group_name'];
    protected $returnType = 'array';
}
