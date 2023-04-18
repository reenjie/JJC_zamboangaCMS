<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pledges extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'goods',
        'qty',
        'notes',
        'status',
        'where',
        'detail',
        'pledgedate',
        'received',
        'email'
    ];
}
