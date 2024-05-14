<?php

namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{
    protected $table = 'test'; // Replace with your actual table name
    protected $primaryKey = 'id'; // Replace with your primary key column name
    protected $allowedFields = ['name']; // Replace with your table columns
}
