<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    protected $fillable = [
        'sejarah_sekolah',
        'poin_value',
        'rules',
    ];
}
