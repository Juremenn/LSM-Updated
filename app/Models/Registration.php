<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = ['full_name', 'birth_date', 'gender', 'address', 'phone', 'email', 'status'];
}
