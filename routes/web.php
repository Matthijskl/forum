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
        Route::post('{category}/create', ['as' => 'create', 'uses' => 'ThreadController@create']);
       Route::get('thread/{thread}', ['as' => 'show', 'uses' => 'ThreadController@thread']);
       Route::post('thread/{thread}/comment', ['as' => 'comment', 'uses' => 'ThreadController@comment']);
       Route::post('/thread/{thread}/close', ['as' => 'close', 'uses' => 'ThreadController@close']);
        Route::post('/thread/{thread}/unlock', ['as' => 'unlock', 'uses' => 'ThreadController@unlock']);

    });

    Route::group(['prefix' => 'cp', 'as' => 'cp.'], function() {
        Route::group(['middleware' => 'acces.cp'], function() {
            Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);

            // UserManagement Related
            Route::group(['prefix' => 'users', 'as' => 'users.'], function() {
                Route::get('/', ['as' => 'index', 'uses' => 'AdminController@userIndex']);
                Route::get('/{user}', ['as' => 'edit', 'uses' => 'UserController@edit']);
                Route::post('/{user}/update', ['as' => 'update', 'uses' => 'UserController@update']);
            });

            // User Related
            Route::group(['prefix' => 'settings', 'as' => 'settings.'], function() {
               Route::get('/basic', ['as' => 'basic', 'uses' => 'AdminController@basic']);
               Route::post('/password/save', ['as' => 'password.save', 'uses' => 'AdminController@changePassword']);
               Route::post('/username/save', ['as' => 'username.save', 'uses' => 'AdminController@changeUsername']);
               Route::post('/email/save', ['as' => 'email.save', 'uses' => 'AdminController@changeEmail']);
            });

            // Roles related

            Route::group(['prefix' => 'roles', 'as' => 'roles.'], function() {
               Route::get('/', ['as' => 'index', 'uses' => 'AdminController@roleIndex']);
               Route::post('/', ['as' => 'add', 'uses' => 'AdminController@addRole']);
               Route::post('/{role}/delete', ['as' => 'delete', 'uses' => 'AdminController@deleteRole']);
            });

            // Category related
            Route::group(['prefix' => 'categories', 'as' => 'categories.'], function() {
               Route::get('/', ['as' => 'index', 'uses' => 'AdminController@categoryIndex']);
               Route::post('/create', ['as' => 'create', 'uses' => 'AdminController@createCategory']);
               Route::post('/sub/create', ['as' => 'sub.create', 'uses' => 'AdminController@createSubCategory']);
               Route::post('/{category}/delete', ['as' => 'delete', 'uses' => 'AdminController@deleteCategory']);
               Route::post('/{category}/edit', ['as' => 'edit', 'uses' => 'AdminController@editCategory']);
            });
        });
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('/', '/home');

