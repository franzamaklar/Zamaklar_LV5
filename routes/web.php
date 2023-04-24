<?php

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\TasksController::class, 'index'], function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');

Route::get('/updateusers', [App\Http\Controllers\UserController::class, 'updateindex'])->name('updateusers');

Route::get('/updaterole/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::post('/edituser', [App\Http\Controllers\UserController::class, 'editUser'])->name('user.edit');

Route::get('/tasks', [App\Http\Controllers\TasksController::class, 'index'])->name('tasks');

Route::post('/addtask', [App\Http\Controllers\TasksController::class, 'store'])->name('addtask');

Route::get('/createtask', function(){return view('createtask');})->name('createtask');

Route::get('/edittask/{id}', [App\Http\Controllers\TasksController::class, 'edit'])->name('task.edit');

Route::get('/aceepttask/{id}', [App\Http\Controllers\TasksController::class, 'aceept'])->name('task.aceept');

Route::get('/declinetask/{id}', [App\Http\Controllers\TasksController::class, 'decline'])->name('task.decline');

Route::get('/createtask/{locale?}', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
    }
    
    return view('createtask');
});