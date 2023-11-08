<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Addtask', [TaskController::class, 'index'])->name('Addtask');
Route::post('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::get('/updateTask/{id}', [TaskController::class, 'update'])->name('task.update');
Route::get('/updateMyTask/{id}/{task}', [TaskController::class, 'updateMyTask'])->name('task.updateMytask');
Route::post('/task/update', [TaskController::class, 'updateTask'])->name('task.updateTask');
Auth::routes();
