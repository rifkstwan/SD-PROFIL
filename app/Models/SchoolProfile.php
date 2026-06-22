<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    protected $table = 'school_profile';

    protected $fillable = [
        'name',
        'description',
        'address',
        'phone',
        'email',
        'logo',
    ];
}
