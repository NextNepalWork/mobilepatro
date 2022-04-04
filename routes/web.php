<?php
Route::get('clear', function () {
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');
    return back();
});
Route::group(['namespace' => 'Backend'], function () {
    Route::any('/', 'AdminController@login')->name('login');
});


Route::group(['namespace' => 'Backend'], function () {
    Route::any('login', 'AdminController@login')->name('login');
});

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::any('/', 'AdminController@index')->name('index');
    Route::any('logout', 'AdminController@logout')->name('logout');

    Route::group(['prefix' => 'users', 'middleware' => 'Usercheck'], function () {
        Route::any('add-privilege', 'PrivilegeController@add_privilege')->name('add-privilege');
        Route::any('privilege-status', 'PrivilegeController@privilege_status')->name('privilege-status');
        Route::any('delete-privilege/{id?}', 'PrivilegeController@delete_privilege')->name('delete-privilege');
        Route::any('edit-privilege/{id?}', 'PrivilegeController@edit_privilege')->name('edit-privilege');
        Route::any('edit-privilege-action', 'PrivilegeController@edit_privilege_action')->name('edit-privilege-action');

        Route::any('add-user', 'AdminController@add_user')->name('add-user');
        Route::any('show-user', 'AdminController@show_user')->name('show-user');
        Route::any('add-user-action', 'AdminController@add_user_action')->name('add-user-action');
        Route::any('delete-user/{id?}', 'AdminController@delete_user')->name('delete-user');
        Route::any('edit-user/{id?}', 'AdminController@edit_user')->name('edit-user');
        Route::any('edit-user-action', 'AdminController@edit_user_action')->name('edit-user-action');


    });

    Route::any('add-horo', 'HoroscopeController@add_horo')->name('add-horo');
    Route::any('save-daily', 'HoroscopeController@save_daily')->name('save-daily');
    Route::any('save-weekly', 'HoroscopeController@save_weekly')->name('save-weekly');
    Route::any('save-monthly', 'HoroscopeController@save_monthly')->name('save-monthly');
    Route::any('save-yearly', 'HoroscopeController@save_yearly')->name('save-yearly');

    Route::get('edit/{id}', 'HoroscopeController@edit')->name('edit');
    Route::get('edit-w/{id}', 'HoroscopeController@edit_w')->name('edit-w');
    Route::get('edit-m/{id}', 'HoroscopeController@edit_m')->name('edit-m');
    Route::get('edit-y/{id}', 'HoroscopeController@edit_y')->name('edit-y');
    Route::any('show-horo-daily', 'HoroscopeController@show_horo_daily')->name('show-horo-daily');
    Route::any('show-horo-weekly', 'HoroscopeController@show_horo_weekly')->name('show-horo-weekly');
    Route::any('show-horo-monthly', 'HoroscopeController@show_horo_monthly')->name('show-horo-monthly');
    Route::any('show-horo-yearly', 'HoroscopeController@show_horo_yearly')->name('show-horo-yearly');


    Route::any('delete-horo-daily/{id?}', 'HoroscopeController@delete_horo_daily')->name('delete-horo-daily');
    Route::any('delete-horo-weekly/{id?}', 'HoroscopeController@delete_horo_weekly')->name('delete-horo-weekly');
    Route::any('delete-horo-monthly/{id?}', 'HoroscopeController@delete_horo_monthly')->name('delete-horo-monthly');
    Route::any('delete-horo-yearly/{id?}', 'HoroscopeController@delete_horo_yearly')->name('delete-horo-yearly');


    Route::any('edit-horo-daily/{id?}', 'HoroscopeController@edit_horo_daily')->name('edit-horo-daily');
    Route::any('edit-horo-daily-action', 'HoroscopeController@edit_horo_daily_action')->name('edit-horo-daily-action');
    Route::any('edit-horo-weekly/{id?}', 'HoroscopeController@edit_horo_weekly')->name('edit-horo-weekly');
    Route::any('edit-horo-weekly-action', 'HoroscopeController@edit_horo_weekly_action')->name('edit-horo-weekly-action');
    Route::any('edit-horo-monthly/{id?}', 'HoroscopeController@edit_horo_monthly')->name('edit-horo-monthly');
    Route::any('edit-horo-monthly-action', 'HoroscopeController@edit_horo_monthly_action')->name('edit-horo-monthly-action');
    Route::any('edit-horo-yearly/{id?}', 'HoroscopeController@edit_horo_yearly')->name('edit-horo-yearly');
    Route::any('edit-horo-yearly-action', 'HoroscopeController@edit_horo_yearly_action')->name('edit-horo-yearly-action');


    Route::group(['prefix' => 'News'], function () {
        Route::any('add-news', 'AdminController@add_news')->name('add-news');
        Route::any('add-news-action', 'AdminController@add_news_action')->name('add-news-action');
        Route::any('show-news', 'AdminController@show_news')->name('show-news');
        Route::any('edit-news/{id?}', 'AdminController@edit_news')->name('edit-news');
        Route::any('edit-news-action', 'AdminController@edit_news_action')->name('edit-news-action');
        Route::any('delete-news', 'AdminController@delete-news')->name('delete-news');
    }
    );
    Route::group(['prefix' => 'slides'], function () {
        Route::any('add-slides', 'AdminController@add_slides')->name('add-slides');
    });
    Route::group(['prefix' => 'forex'], function () {
        Route::any('update-forex', 'ForexController@update_forex')->name('update-forex');
    });
    Route::group(['prefix' => 'videos'], function () {
        Route::any('add-videos', 'VideosController@add_videos')->name('add-videos');
        Route::any('youtube-videos', 'VideosController@youtube_videos')->name('youtube-videos');
        Route::any('delete-youtube/{id?}', 'VideosController@delete_youtube')->name('delete-youtube');
        Route::any('save-videos', 'VideosController@save_videos')->name('save-videos');
        Route::any('show-videos', 'VideosController@show_videos')->name('show-videos');
        Route::any('delete-videos/{id?}', 'VideosController@delete_videos')->name('delete-videos');
    });
    Route::any('widgets', 'AdminController@widgets')->name('widgets');
    Route::any('Calendar', 'AdminController@Calendar')->name('Calendar');
    Route::any('Panchang', 'AdminController@Panchang')->name('Panchang');
    Route::any('forex', 'AdminController@forex')->name('forex');

    Route::resource('/card', 'CardController')->except('show');

});

