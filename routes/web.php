<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
    // Route::post('task', [TaskController::class,'addTask'])->name('task');
})->name('dashboard');


Route::post('task', [TaskController::class,'addTask'])->name('task');
Route::get('task/{id}', [TaskController::class,'userTask'])->name('task');
Route::put('task/{id}', [HomeController::class,'TaskStatus'])->name('task/{id}');
Route::get('showTask', [TaskController::class,'showTask'])->name('showTask');


Route::get('home', [HomeController::class,'index']);
Route::get('adminhome',[HomeController::class,'adminHome'])->name('adminhome');
Route::get('status/{id}', [HomeController::class,'userStatus'])->name('status');
