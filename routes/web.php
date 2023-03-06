<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NombreController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\FullCalendarController;

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
    return view('index');
});

Route::post('/reserva', function () {
    return view('reserva');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});


Route::get('/calendario', function () {
    return view('fullcalendar');
});

Route::get('/misreservas', function () {
    return view('misReservas');
});

Route::get('/contacto', function () {
    return view('contacto');
});







Auth::routes();

//HOME (Redirigir al index)

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//LOGIN

Route::get('/acceder', [LoginController::class, 'index']);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//REGISTRO

Route::get('/registrar', [RegisterController::class, 'index']);

//RESERVAS


Route::get('/misreservas', [ReservasController::class, 'showAll'])->middleware("auth");
Route::get('/eliminar/id={id}', [ReservasController::class, 'eliminarReservas'])->name('eliminar');
Route::post('/reserva', [ReservasController::class, 'recogerTodo']);
Route::post('/reservaIN', [ReservasController::class, 'storeinvitado']);
Route::post('/reservar', [ReservasController::class, 'store']);
Route::post('/reservas', [ReservasController::class, 'store']);

//FULLCALENDAR

Route::get('/fullcalendar', [ReservasController::class, 'Evento']);
Route::get('/fullcalendarajax', [ReservasController::class, 'Eventoajax']);

//CONTACTO

Route::post('/comentario', [ContactoController::class, 'comentario']);