<?php 

namespace App\Traits;

use App\Models\Backend\Friend;

trait Friendable {

	public function addFriend($id)
	{
		$friend = Friend::create(['user_id' => auth('api')->id(), 'friend_id' => $id]);

		if ($friend) {
			return true;
		}
		return false;
	}
}