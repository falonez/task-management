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
// Ini cara Satu"
// Route::get('/Addtask', [TaskController::class, 'index'])->name('Addtask');
// Route::post('/task/create', [TaskController::class, 'create'])->name('task.create');
// Route::get('/updateTask/{id}', [TaskController::class, 'update'])->name('task.update');
// Route::get('/updateMyTask/{id}/{task}', [TaskController::class, 'updateMyTask'])->name('task.updateMytask');
// Route::post('/task/update', [TaskController::class, 'updateTask'])->name('task.updateTask');

// Ini cara di grouping
// Route::controller(TaskController::class)->group(function(){
//     Route::get('/Addtask','index')->name('Addtask');
//     Route::post('/task/create', 'create')->name('task.create');
//     Route::get('/updateTask/{id}', 'update')->name('task.update');
//     Route::get('/updateMyTask/{id}/{task}', 'updateMyTask')->name('task.updateMytask');
//     Route::post('/task/update',  'updateTask')->name('task.updateTask');
// });

// jika menggunakan middleware 
Route::middleware('auth')->group(function(){
    Route::controller(TaskController::class)->group(function(){
        Route::get('/Addtask','index')->name('Addtask');
        Route::post('/task/create', 'create')->name('task.create');
        Route::get('/updateTask/{id}', 'update')->name('task.update');
        Route::get('/updateMyTask/{id}/{task}', 'updateMyTask')->name('task.updateMytask');
        Route::post('/task/update',  'updateTask')->name('task.updateTask');
    });
});

Auth::routes();
