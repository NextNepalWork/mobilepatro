<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Backend\Friend;
use App\Models\Backend\User;
use App\Models\Backend\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Pusher\Pusher;
use Symfony\Component\HttpFoundation\Response;

class FriendController extends Controller
{
    public function fetchUsers()
    {
    	$users = User::select('users.id', 'users.first_name', 'users.last_name', 'users.username', 'users.email', 'users.image')->leftjoin('privilege_user', 'privilege_user.user_id',  '=', 'users.id')->where('users.id', '!=', auth('api')->id())->where('privilege_user.privilege_id', 2)->get();
    	foreach ($users as $key => $user) {
    		$user->image = $user->image ? asset('images/user/' . $user->image) : asset('images/default-user.png');
            $check = DB::table('friends')->where('user_id', auth('api')->id())->where('friend_id', $user->id)->exists();

            if ($check == false) {
                $user_list[] = $user;
            }
    	}

    	return response()->json($user_list, Response::HTTP_OK);
    }

    public function addFriend($id) 
    {
    	$user = Auth::user()->addFriend($id);

    	if ($user == true) {

            $sendData = array
            (
                'body'  => 'New Friend Request in your friend request list',
                'title' => 'Friend Request!!!',
                'user_id' => $id
            );
            $response = onesignalNotificationToSpecificUser($sendData, $id);

    		return response()->json(['success' => 'Friend request sent.', 'error' => false], Response::HTTP_OK);
    	}

    	return response()->json(['msg' => 'Failed sending request.', 'error' => true], Response::HTTP_BAD_REQUEST);
    }

    public function checkFriendRequest($id)
    {
    	$check = DB::table('friends')->where('user_id', auth('api')->id())->where('friend_id', $id)->exists();

    	if ($check) {
    		return response()->json(['msg' => $check, 'error' => false], Response::HTTP_OK);
    	}

    	return response()->json(['msg' => $check, 'error' => true], Response::HTTP_OK);
    }

    public function fetchFriendRequestList()
    {
    	$friends = User::select('users.id', 'users.first_name', 'users.last_name', 'users.username', 'users.email', 'users.image')->leftjoin('friends', 'friends.user_id', '=', 'users.id')->where('friends.friend_id', auth('api')->id())->where('friends.status', 0)->get();

    	foreach ($friends as $friend) {
    		$friend->image = asset('images/user/' . $friend->image);
    	}

    	return response()->json($friends, Response::HTTP_OK);
    }

    public function acceptFriendRequest($id)
    {
    	$friend = Friend::Where('user_id', $id)->where('friend_id', auth('api')->id())->where('status', 0)->first();

    	if ($friend) {
    		$friend->update(['status' => 1]);
    		return response()->json(['msg' => 'Friend request accepted.', 'error' => false], Response::HTTP_OK);
    	}

        $sendData = array
        (
            'body'  => 'He has accepted your friend request.',
            'title' => 'Friend Request Accepted!!!',
            'user_id' => $id
        );
        $response = onesignalNotificationToSpecificUser($sendData, $id);

    	return response()->json(['msg' => 'There is no such user.', 'error' => true], Response::HTTP_NOT_FOUND);
    }

    public function cancelFriendRequest($id)
    {
    	$friend = Friend::Where('user_id', $id)->where('friend_id', auth('api')->id())->where('status', 0)->first();
    	if ($friend) {
    		$friend->delete();
    		return response()->json(['msg' => 'Friend request cancelled.', 'error' => false], Response::HTTP_OK);
    	}
    	

    	return response()->json(['msg' => 'There is no such user.', 'error' => true], Response::HTTP_NOT_FOUND);
    }

    public function fetchFriends()
    {
    	$id = auth('api')->id();

    	$friends1 = Friend::select('id', 'user_id', 'friend_id')->where('status', 1)->where('user_id', $id)->get();

    	$friends2 = Friend::select('id', 'user_id', 'friend_id')->where('status', 1)->where('friend_id', $id)->get();

    	// merger two collection
        $friends = $friends1->merge($friends2);
        foreach ($friends as $friend) {
            if($friend->user_id == $id) {
                $friend->first_name = $friend->userFriend->first_name;
                $friend->last_name = $friend->userFriend->last_name;
                $friend->username = $friend->userFriend->username;
                $friend->email = $friend->userFriend->email;
                $friend->image = $friend->userFriend->image ? asset('images/user/' . $friend->userFriend->image) : asset('images/default-user.png');
                $friend->user_friend_id = $friend->friend_id;
                unset($friend->userFriend);
                unset($friend->user_id);
                unset($friend->friend_id);
            }
            elseif ($friend->friend_id == $id) {
                $friend->first_name = $friend->friendUser->first_name;
                $friend->last_name = $friend->friendUser->last_name;
                $friend->username = $friend->friendUser->username;
                $friend->email = $friend->friendUser->email;
                $friend->image = $friend->userFriend->image ? asset('images/user/' . $friend->friendUser->image) : asset('images/default-user.png');
                $friend->user_friend_id = $friend->user_id;
                unset($friend->friendUser);
                unset($friend->user_id);
                unset($friend->friend_id);
            }
            else {
                return response()->json(['msg' => 'You have no friends.', 'error' => 'true'], Response::HTTP_NOT_FOUND);
            }
        }

        return response()->json(['data' => $friends, 'error' => false], Response::HTTP_OK);
    }

    public function userProfile()
    {
        $user = User::where('id', auth('api')->id())->select('id', 'first_name', 'last_name', 'username', 'email', 'image')->first();
        $user->image = $user->image ? asset('images/user/' . $user->image) : asset('images/default-user.png');
        $user->designation = $user->userInfos ? $user->userInfos->designation : null;
        $user->company = $user->userInfos ? $user->userInfos->company : null;
        $user->facebook = $user->userInfos ? $user->userInfos->facebook : null;
        $user->twitter = $user->userInfos ? $user->userInfos->twitter : null;
        $user->linkedin = $user->userInfos ? $user->userInfos->linkedin : null;
        unset($user->userInfos);

        return response()->json($user, Response::HTTP_OK);
    }

    public function storeUserInfos(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'designation' => 'string|max:50',
            'company' => 'string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages(), 'error' => true], Response::HTTP_NOT_ACCEPTABLE);
        }

        UserInfo::updateOrCreate(['user_id' => auth('api')->id()],[
            'user_id' => auth('api')->id(),
            'designation' => $request->designation ? $request->input('designation') : null,
            'company' => $request->company ? $request->input('company') : null,
            'facebook' => $request->facebook ? $request->input('facebook') : null,
            'twitter' => $request->twitter ? $request->input('twitter') : null,
            'linkedin' => $request->linkedin ? $request->input('linkedin') : null
        ]);

        return response()->json(['msg' => 'User Information successfully added.', 'error' => false], Response::HTTP_CREATED);
    }
}
