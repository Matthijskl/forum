<?php
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'threads', 'as' => 'threads.'], function() {
       Route::get('{category}', ['as' => 'list', 'uses' => 'ThreadController@show']);
       Route::get('{thread}', ['as' => 'show', 'uses' => 'ThreadController@thread']);
    });

    Route::group(['prefix' => 'cp', 'as' => 'cp.'], function() {
        Route::group(['middleware' => 'acces.cp'], function() {
            Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);

            // UserManagement Related
            Route::group(['prefix' => 'users', 'as' => 'users.'], function() {
                Route::get('/', ['as' => 'index', 'uses' => 'AdminController@userIndex']);
            });

            // User Related
            Route::group(['prefix' => 'settings', 'as' => 'settings.'], function() {
               Route::get('/basic', ['as' => 'basic', 'uses' => 'AdminController@basic']);
               Route::post('/password/save', ['as' => 'password.save', 'uses' => 'AdminController@changePassword']);
               Route::post('/username/save', ['as' => 'username.save', 'uses' => 'AdminController@changeUsername']);
               Route::post('/email/save', ['as' => 'email.save', 'uses' => 'AdminController@changeEmail']);
            });
        });
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('/', '/home');

