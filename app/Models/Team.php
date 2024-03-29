<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'name',
        'desc',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'dump'
    ];
}
