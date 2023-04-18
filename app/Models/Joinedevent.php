<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joinedevent extends Model
{
    use HasFactory;

    protected $fillable= [
        'userID',      
        'typeof',
        'TableID',
        'joinedDate',
        'status',
        'typeofjoin'
    ];
}
