<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'Api'], function () {
    Route::post('login', 'ApiAdminController@login')->name('login');
    Route::post('register', 'ApiAdminController@register')->name('register');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Api'], function () {
    Route::get('show-horo-weekly', 'ApiAdminController@show_horo_weekly')->name('show-horo-weekly');
    Route::get('show-horo-daily', 'ApiAdminController@show_horo_daily')->name('show-horo-daily');
    Route::get('show-horo-monthly', 'ApiAdminController@show_horo_monthly')->name('show-horo-monthly');
    Route::get('show-horo-yearly', 'ApiAdminController@show_horo_yearly')->name('show-horo-yearly');
    Route::get('youtube-videos', 'ApiAdminController@youtube_videos')->name('youtube-videos');
    Route::get('tv-videos', 'ApiAdminController@custom_videos');
    Route::get('newsrss', 'ApiAdminController@newsrss')->name('newsrss');

    // Forex
    Route::get('/forex', 'ForexController@index');
});

Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function() {

    // Friends
    Route::get('/users', 'FriendController@fetchUsers');
    Route::get('/add-friend/{user_id}', 'FriendController@addFriend');
    Route::get('/check-friend-request/{id}', 'FriendController@checkFriendRequest');
    Route::get('/friend-request-list', 'FriendController@fetchFriendRequestList');
    Route::get('/accept-friend-request/{id}', 'FriendController@acceptFriendRequest');
    Route::get('/cancel-friend-request/{id}', 'FriendController@cancelFriendRequest');
    Route::get('/friends', 'FriendController@fetchFriends');
    Route::get('/user-profile', 'FriendController@userProfile');
    Route::post('/add-user-info', 'FriendController@storeUserInfos');

    Route::get('/cards', 'CardController@cards');
    Route::get('/alignments', 'CardController@alignments');
    Route::post('/store-visiting-card', 'CardController@storeVisitingCard');
    Route::get('/view-visiting-card', 'CardController@viewVisitingCard');
    Route::post('/share-visiting-card', 'CardController@shareCard');
    Route::get('/view-shared-card', 'CardController@viewSharedCard');

});
