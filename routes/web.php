<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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


Route::get('/',[ProjectController::class,'index']);
Route::get('/projects/tasks/{project}',[ProjectController::class,'showTasks'])->name('project.tasks');
Route::post('/projects/',[ProjectController::class,'store']);

Route::PUT('/tasks/{task}',[TaskController::class,'update']);
Route::post('/tasks/update_priorities',[TaskController::class,'updatePriorities']);
Route::post('/tasks/',[TaskController::class,'store']);
Route::delete('/tasks/{task}',[TaskController::class,'destroy']);


