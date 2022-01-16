<?php

use App\Http\Controllers\TodoController;
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

Route::get('todo', [TodoController::class, 'get']);
Route::post('todo', [TodoController::class, 'create']);
Route::delete('todo', [TodoController::class, 'delete']);
Route::patch('todo', [TodoController::class, 'toggle']);
