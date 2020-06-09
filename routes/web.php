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

//Login
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

//rutas para usuario administrador
Route::middleware(['auth', 'admin:yes'])->group(function(){
    //Crud
    Route::get('/usuarioCrud', 'usuarioControlador@crud')->name('usuario.crud');
    Route::get('/usuarioBorrar', 'usuarioControlador@borrar')->name('usuario.borrar');
    Route::post('/usuarioAdd', 'usuarioControlador@add')->name('usuario.add');
});

//rutas para usuario cliente
Route::middleware(['auth','admin:no'])->group(function(){

    //Marcas
    Route::get('/inicio', 'marcaControlador@listar')->name('inicio') ;
    Route::post('/autocompletar', 'marcaControlador@buscar');

    //Botas
    Route::get('/botMar', 'botasControlador@listarId')->name('botMar.ver');
    Route::get('/infoBota', 'botasControlador@info')->name('bota.info');
    Route::get('/botas', 'botasControlador@listarTodas')->name('bota.todas');
    Route::get('/botas1', 'botasControlador@fetch_data')->name('botas1');
    Route::get('/nuevas', 'botasControlador@nueva')->name('bota.proxima');

    //Carrito
    Route::get('/carritoAdd', 'carritoControlador@add')->name('carrito.add');
    Route::get('/carrito', 'carritoControlador@listar')->name('carrito');
    Route::get('/compra', 'carritoControlador@compra')->name('compra');
    Route::get('/carBorrar', 'carritoControlador@borrar')->name('carrito.borrar');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

