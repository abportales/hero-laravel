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

Route::get('/', function () {
    return view('welcome');
});

//@param1: motivo, array asociativo, queremos que el prefix tenga el valor de admin
// Route::get('/admin', 'AdminController@index')->name('admin');
// Route::get('/admin/heroes', 'HeroController@index')->name('admin.heroes');
// Route::get('/admin/items', 'ItemController@index')->name('admin.items');
// Route::get('/admin/enemies', 'EnemyController@index')->name('admin.enemies');
//simplifica lo de arriba a esto:
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');  //debe de concordar con su controller

    Route::resource('heroes', 'HeroController');
    // Route::resource('heroes', HeroController::class);

    /*Route::group(['prefix' => 'heroes'], function () {
        Route::get('/', 'HeroController@index')->name('admin.heroes');
        Route::get('create', 'HeroController@create')->name('admin.heroes.create');
        Route::post('store', 'HeroController@store')->name('admin.heroes.store');
        Route::get('edit/{id}', 'HeroController@edit')->name('admin.heroes.edit');
        Route::post('update/{id}', 'HeroController@update')->name('admin.heroes.update');
        Route::delete('destroy/{id}', 'HeroController@destroy')->name('admin.heroes.destroy');
    });*/
    Route::get('items', 'ItemController@index')->name('admin.items');
    Route::get('enemies', 'EnemyController@index')->name('admin.enemies');
});

// Route::get('/home/{name}',function($name){
//     return view('home', ['name' => $name]);
//     // return "hola " . $name . "! como estas hoy?";
// })->where('name', '[A-Za-z]+');
