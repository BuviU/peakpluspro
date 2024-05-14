<?php

namespace App\Models;

use CodeIgniter\Model;

class ExerciseFullDetailsModel extends Model
{
    protected $table = 'exercise_full_details';
    protected $allowedFields = ['id', 'exercise_name', 'membership_name', 'program', 'workout', 'series', 'sets', 'reps', 'tempo', 'rest', 'weight'];
    protected $returnType = 'array';
}
