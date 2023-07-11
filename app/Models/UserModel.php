<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $DBGroup = 'default';
    protected $allowedFields = ['id', 'name', 'phone', 'email', 'address', 'city', 'state'];
}
