<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::group(['namespace' => 'Site'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/','MainController@index')->name('welcome');
        Route::get('/about','MainController@about')->name('about');
        Route::get('/affiliate','MainController@affiliate')->name('affiliate');
        Route::get('/lawyers','MainController@lawyers')->name('all_lawyers');
        Route::get('/lawyers/category','MainController@lawyersCategory')->name('lawyers_by_category');
        Route::get('/lawyers/profile','MainController@lawyerProfile')->name('lawyer_profile');
        Route::get('/single','MainController@single')->name('single');
        Route::get('/terms','MainController@terms')->name('terms');
        Route::get('/privacy','MainController@privacy')->name('privacy');
    });
});

Route::middleware('user')->group(function () {
    Route::group(['prefix' => 'user','namespace' => 'User'], function () {
        Route::get('/dashboard','UserController@index');
    });
});
Route::middleware('lawyer')->group(function () {
    Route::group(['prefix' => 'lawyer','namespace' => 'Lawyer'], function () {
        Route::get('/dashboard','LawyerController@index');
        Route::get('/messages','LawyerController@messages')->name('lawyer_messages');
        Route::get('/calendar','LawyerController@calendar')->name('lawyer_calendar');

    });
});
Route::middleware('admin')->group(function () {
    Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {
        Route::get('/dashboard','AdminController@index')->name('admin_dashboard');
        Route::group(['prefix' => 'home','namespace' => 'Home'], function () {
            //welcome
            Route::get('/home_first','HomeController@homeFirst')->name('home_first');
            Route::get('/home_second','HomeController@homeSecond')->name('home_second');
            Route::get('/home_third','HomeController@homeThird')->name('home_third');
            //about
            Route::get('/about_first','HomeController@aboutFirst')->name('about_first');
            Route::get('/about_second','HomeController@aboutSecond')->name('about_second');
            Route::get('/about_third','HomeController@aboutThird')->name('about_third');
            //terms
            Route::get('/terms','HomeController@terms')->name('admin_terms');
            //privacy
            Route::get('/privacy','HomeController@privacy')->name('admin_privacy');


            Route::post('/content/update/{id}','HomeController@update')->name('update_home_content');
        });
    });
});
