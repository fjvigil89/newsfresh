<?php

use App\Categoria;
use Illuminate\Http\Request;

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




Route::post('/login', 'AuthController@login')->name('api.login');
Route::post('/register', 'AuthController@register')->name('api.register');

// estas rutas requiren de un token válido para poder accederse.

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('/logout', 'AuthController@logout')->name('api.logout');
    
    /*Route::get('/user', function (Request $request) {
        return $request->user();
    });*/

    
    Route::resource('categoria', 'CategoriaController')->only([
        'index', 'store','show', 'update', 'destroy'
    ]);
    
    Route::resource('url', 'UrlController')->only([
        'index', 'store','show', 'update', 'destroy'
    ]);

    Route::resource('grupo', 'GrupoController')->only([
        'index', 'store','show', 'update', 'destroy'
    ]);
});





