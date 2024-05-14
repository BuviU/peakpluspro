<?php

namespace App\Models;

use CodeIgniter\Model;

class ForwardAttachmentsModel extends Model
{
    protected $table = 'forward_attachments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['forward_id', 'attachment'];
    protected $returnType = 'array';
}
