<?php

namespace App\Models;

use CodeIgniter\Model;

class WorkoutModel extends Model
{
    protected $table = 'workout';
    protected $primaryKey = 'id';
    protected $allowedFields = ['workout','description','program','membership','coach_id'];
    protected $returnType = 'array';
}
