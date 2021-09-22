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

Route::get('/', function () {
    return redirect ('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/task',App\Http\Controllers\TaskController::class);
Route::post('/assignTask', [App\Http\Controllers\TaskController::class, 'assignTasks'])->name('assignTasks');
Route::post('/assignProject', [App\Http\Controllers\ProjectController::class, 'assignProject'])->name('assignProject');
Route::post('/assignTeam', [App\Http\Controllers\TeamController::class, 'assignTeam'])->name('assignTeam');



// Route::post('/assignTasks','TaskController@assignTasks')->name('assignTasks');

Route::post('/deleteTask',[App\Http\Controllers\TaskController::class,'destroy'])->name('delete');
