<?php

use Illuminate\Support\Facades\Route;
use App\http\Middleware\Cors;

Route::group([
    'middleware' => 'api',
    'prefix' => 'v1/auth'

], function ($router) {
    Route::post('login', [\App\Http\Controllers\Api\V1\AuthController::class, 'login'])->name('login');
    Route::post('logout', [\App\Http\Controllers\Api\V1\AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [\App\Http\Controllers\Api\V1\AuthController::class, 'refresh'])->name('refresh');
    Route::post('me', [\App\Http\Controllers\Api\V1\AuthController::class, 'me'])->name('me');
});

    Route::post('newUser','user_controller@newUser');
    Route::post('consulta_sesion','user_controller@consulta_sesion')->middleware(Cors::class);
    Route::put('out','user_controller@out')->middleware(Cors::class);

    Route::post('consulta_tareas','tareas_controller@consulta_tareas')->middleware(Cors::class);
    Route::put('agrega_tarea','tareas_controller@agrega_tarea')->middleware(Cors::class);

    Route::put('modifica_tarea','tareas_controller@modifica_tarea')->middleware(Cors::class);
    Route::put('elimina_tarea','tareas_controller@elimina_tarea')->middleware(Cors::class);

