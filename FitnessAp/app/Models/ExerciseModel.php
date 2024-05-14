<?php

namespace App\Models;

use CodeIgniter\Model;

class ExerciseModel extends Model
{
    protected $table = 'exercise_details';
    protected $primaryKey = 'id';
    protected $allowedFields = ['exercise_name', 'membership', 'program', 'workout', 'series', 'sets', 'reps', 'tempo', 'rest', 'weight'];
    protected $returnType = 'array';
}
