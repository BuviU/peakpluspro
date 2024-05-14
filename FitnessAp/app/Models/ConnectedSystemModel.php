<?php

namespace App\Models;

use CodeIgniter\Model;

class ConnectedSystemModel extends Model
{
    protected $table = 'connected_systems';
    protected $primaryKey = 'id';
    protected $allowedFields = ['system_id', 'system_name', 'api_key', 'access', 'connected_at', 'access_last_updated_at', 'del', 'user'];
    protected $returnType = 'array';
}
