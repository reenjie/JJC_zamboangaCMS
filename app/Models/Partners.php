<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'firstname',
        'middlename',
        'lastname',
        'dateofbirth',
        'gender',
        'status',
        'religion',
        'placeofbirth',
        'address',
        'members',
        'pledges',
        'volunteer',
        'partnership',
        'userID',
        'message',
        'contact',
        'contactadd',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'approvedstate'
    ];
    
}
