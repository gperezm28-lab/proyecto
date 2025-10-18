<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table         = 'task';
    protected $primaryKey    = 'id';

    protected $allowedFields = ['description'];


    protected $returnType    = 'App\Entities\Task';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'description' => 'required|min_length[3]',
    ];

    protected $validationMessages = [
        'description' => [
            'required'   => 'Please enter a description',
            'min_length' => 'Description must be at least 3 characters long',
        ],
    ];
}