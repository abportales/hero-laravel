<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Endpoint de testeo, el end point es la parte final de la url, que no pertenece al domain, en este caso, /heroes, /heroes/id, etc.
Route::get('/', 'APIController@index');

//endpoint of heroes
Route::get('heroes', 'APIController@getAllHeroes');
Route::get('heroes/{id}', 'APIController@getHero');

//endpoint of enemies
Route::get('enemies', 'APIController@getAllEnemies');
Route::get('enemies/{id}', 'APIController@getEnemy');

//endpoint of items
Route::get('items', 'APIController@getAllItems');
Route::get('items/{id}', 'APIController@getItem');

//endpoint of battle system
Route::get('bs/{heroId}/{enemyId}', 'APIController@runManulBattleSys');