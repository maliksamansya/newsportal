<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = [
        'type',
        'slug',
        'header_top',
        'body_top',
        'body_middle',
        'body_bottom',
        'sidebar_one',
        'sidebar_two'
    ];
}
