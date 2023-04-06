<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pledges extends Model
{
    use HasFactory;

    protected $fillable=[
        'amount',
        'email',
        'goods',
        'qty',
        'notes'
    ];
}
