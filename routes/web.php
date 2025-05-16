<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
Route::get('/', [EventController::class, 'index']); //todos registros

Route::get('/events/create', [EventController::class, 'create']) -> middleware('auth'); //mostrar formulario de criar com registro no banco

Route::get('/events/{id}', [EventController::class, 'show']); //mostrar dado em especifico

Route::post('/events', [EventController::class, 'store']); //enviar os dados do banco

Route::delete('/events/{id}', [EventController::class, 'destroy']) -> middleware('auth');

Route::get('/events/edit/{id}', [EventController::class, 'edit']) -> middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update']) -> middleware('auth');

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/dashboard', [EventController::class, 'dashboard']) -> middleware('auth');

Route::post('events/join/{id}', [EventController::class, 'joinEvent'])-> middleware('auth');

Route::delete('events/leave/{id}', [EventController::class, 'leaveEvent'])-> middleware('auth');
