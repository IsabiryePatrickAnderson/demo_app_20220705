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

Route::get('/',  [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//TASKS
Route::get('/tasks',  [App\Http\Controllers\TasksController::class, 'index']);
Route::get('/create-task',  [App\Http\Controllers\TasksController::class, 'create']);
Route::post('/store-task',  [App\Http\Controllers\TasksController::class, 'store']);
Route::get('/edit-task/{id}',  [App\Http\Controllers\TasksController::class, 'edit']);
Route::put('/update-task/{id}',  [App\Http\Controllers\TasksController::class, 'update']);
Route::get('/delete-task/{id}',  [App\Http\Controllers\TasksController::class, 'delete']);
Route::get('/unapproved-tasks',  [App\Http\Controllers\TasksController::class, 'unapproved']);
Route::get('/approve-task/{id}',  [App\Http\Controllers\TasksController::class, 'approve']);