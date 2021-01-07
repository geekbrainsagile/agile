<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/parser', [App\Http\Controllers\ParserController::class, 'index'])->name('parser');

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'App\\Http\\Controllers\\Admin\\',
        'as' => 'admin.',
        'middleware' => [ 'auth' ]
    ], function () {

    //источники каталогов
    Route::get('/resources', 'ResourcesController@index')->name('resources.index');
    Route::get('/resources/create', 'ResourcesController@create')->name('resources.create');
    Route::post('/resources/create', 'ResourcesController@store')->name('resources.store');
    Route::get('/resources/edit/{resource}', 'ResourcesController@edit')->name('resources.edit');
    Route::post('/resources/update/{resource}', 'ResourcesController@update')->name('resources.update');
    Route::get('/resources/destroy/{resource}', 'ResourcesController@destroy')->name('resources.destroy');

});


//Соцсети авторизация
//Route::get('/auth/vk', 'LoginController@login')->name('vklogin');
//Route::get('/auth/vk/response', 'LoginController@response')->name('vkResponse');
//Route::get('/auth/git', 'LoginController@login')->name('gitLogin');
//Route::get('/auth/git/response', 'LoginController@response')->name('gitResponse');

Auth::routes();
