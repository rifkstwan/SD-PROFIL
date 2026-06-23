<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'title_line1',
        'title_line2',
        'title',
        'description',
        'image',
        'category',
        'date',
        'student_name',
    ];
}
