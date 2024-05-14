<?php

namespace App\Models;

use CodeIgniter\Model;

class AddExerciseModel extends Model
{
    protected $table = 'exercise';
    protected $primaryKey = 'id';
    protected $allowedFields = ['exercise_name', 'thumbnail', 'video_url','coach_id'];
    protected $returnType = 'array';
}
