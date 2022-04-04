<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
    	'user_id',
    	'designation',
    	'company',
    	'facebook',
    	'twitter',
    	'linkedin'
    ];
}
