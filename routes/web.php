<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {

//Rutas Actividades
Route::get('/actividades', [App\Http\Controllers\admin\ActividadesController::class, 'index']);
Route::get('/actividades/create', [App\Http\Controllers\admin\ActividadesController::class, 'create']);
Route::get('/actividades/{actividades}/edit', [App\Http\Controllers\admin\ActividadesController::class, 'edit']);
Route::post('/actividades', [App\Http\Controllers\admin\ActividadesController::class, 'sendData']);
Route::put('/actividades/{actividades}', [App\Http\Controllers\admin\ActividadesController::class, 'update']);
Route::delete('/actividades/{actividades}', [App\Http\Controllers\admin\ActividadesController::class, 'destroy']);

//Rutas Empleados
Route::resource('empleados', 'App\Http\Controllers\admin\EmpleadosController');

//Rutas usuarios
Route::resource('usuarios', 'App\Http\Controllers\admin\UsuariosController');

//Rutas Reportes
Route::get('/reportes/citas/line', [App\Http\Controllers\admin\ChartController::class, 'appointmens']);
Route::get('/reportes/empleados/column', [App\Http\Controllers\admin\ChartController::class, 'emplead']);

Route::get('/reportes/empleados/column/data', [App\Http\Controllers\admin\ChartController::class, 'empleadJson']);
});

Route::middleware(['auth', 'empleados'])->group(function (){
    Route::get('/horario', [App\Http\Controllers\empleado\HorarioController::class, 'edit']);
    Route::post('/horario', [App\Http\Controllers\empleado\HorarioController::class, 'store']);
});

Route::middleware('auth')->group(function(){

    Route::get('/reservarcitas/create', [App\Http\Controllers\AppointmentController::class, 'create']);
    Route::post('/reservarcitas', [App\Http\Controllers\AppointmentController::class, 'store']);
    Route::get('/miscitas', [App\Http\Controllers\AppointmentController::class, 'index']);
    Route::get('/miscitas/{appointments}', [App\Http\Controllers\AppointmentController::class, 'show']);
    Route::post('/miscitas/{appointments}/cancel', [App\Http\Controllers\AppointmentController::class, 'cancel']);
    Route::post('/miscitas/{appointments}/confirm', [App\Http\Controllers\AppointmentController::class, 'confirm']);
    Route::get('/miscitas/{appointments}/cancel', [App\Http\Controllers\AppointmentController::class, 'formCancel']);

    Route::get('/profile', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/profile', [App\Http\Controllers\UserController::class, 'update']);


    //JSON
    Route::get('/actividades/{actividades}/empleados', [App\Http\Controllers\Api\ActividadesController::class, 'emplead']);
    Route::get('/horario/horas', [App\Http\Controllers\Api\HorarioController::class, 'hours']);

});
