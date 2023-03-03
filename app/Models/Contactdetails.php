<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactdetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
        'email',
        'phonedetails',
        'opendetails',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
    ];
}
