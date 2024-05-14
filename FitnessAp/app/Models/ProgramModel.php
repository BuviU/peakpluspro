<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
    protected $table = 'program';
    protected $primaryKey = 'id';
    protected $allowedFields = ['membership', 'program', 'Description', 'thumbnail','coach_id'];
    protected $returnType = 'array';
}
