<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
	protected $fillable = ['user_id', 'friend_id', 'status'];
	
	public function friendUser()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function userFriend()
	{
		return $this->belongsTo(User::class, 'friend_id');
	}
}
