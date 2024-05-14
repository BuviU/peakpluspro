<?php

namespace App\Models;

use CodeIgniter\Model;

class MembershipModel extends Model
{
    protected $table = 'membership';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','membership_name', 'thumbnail', 'coach_id'];
    protected $returnType = 'array';
}
