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

    /*Route::get('/userlogued', function (Request $request) {
        return $request->user();
    });*/

    //Rutas del Modelo Categoria
    Route::resource('categoria', 'CategoriaController')->only([
        'index', 'store','show', 'update', 'destroy'
    ]);

    //Rutas del Modelo Url
    Route::resource('url', 'UrlController')->only([
        'index', 'store','show', 'update', 'destroy'
    ]);
    Route::get('url_any_user/{user_id}', 'UrlController@url_any_user')->name('url_any_user');
    Route::get('url_login_user', 'UrlController@url_login_user')->name('url_login_user');

    //Rutas del Modelo Grupo
    Route::resource('grupo', 'GrupoController')->only([
        'index', 'store','show', 'update', 'destroy'
    ]);

    //Rutas del Modelo Sitios Permitidos
    Route::resource('sitio_permitido', 'SitioPermitidoController')->only([
        'index', 'store','show', 'update', 'destroy'
    ]);

    //Rutas del Modelo Factura
    Route::resource('factura', 'FacturaController')->only([
        'index', 'store','show', 'update', 'destroy'
    ]);
    Route::get('factura_any_user/{user_id}', 'FacturaController@factura_any_user')->name('factura_any_user');
    Route::get('factura_login_user', 'FacturaController@factura_login_user')->name('factura_login_user');

    //Rutas del Modelo Noticia
    Route::resource('noticia', 'NoticiaController')->only([
        'index', 'store','show', 'update', 'destroy'
    ]);

    //Rutas del Modelo Referido
    Route::resource('referido', 'ReferidoController')->only([
    'index', 'store','show', 'destroy'
    ]);

     //Rutas del Modelo User
    Route::resource('user', 'UserController')->only([
    'index','show','update', 'destroy'
    ]);
    Route::get('showAuthenticate', 'UserController@showAuthenticate')->name('showAuthenticate');

});







