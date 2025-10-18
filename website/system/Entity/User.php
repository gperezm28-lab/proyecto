<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    protected $dates = ['created_at', 'updated_at'];
    protected $casts = [
        'id'       => 'integer',
        'active'   => 'integer',
        'is_admin' => 'integer',
    ];
}