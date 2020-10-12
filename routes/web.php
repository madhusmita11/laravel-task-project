<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskviewController;
// use App\Http\Middleware\CustomAuth;
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
// Route::view("register","register");
Route::get('register', function () {
    return view('register');
});
Route::get('login', function () {
    return view('login');
});


Route::post('insert', [RegisterController::class, 'insert']);
Route::post('userlogin', [LoginController::class, 'userlogin']);

Route::get('/logout', function () {
    session()->flush('session-data');
    return redirect('login');
});
Route::group(['middleware' => ['check-permission']], function () {
    Route::get('dashboard', [TaskviewController::class, 'taskview']);

    Route::get('task', function () {
        return view('task');
    });
    Route::post('taskinsert', [TaskController::class, 'taskinsert']);
    Route::get('delete/{id}', [TaskviewController::class, 'destroy']);

    Route::get('edit/{id}', [TaskviewController::class, 'show']);
    Route::post('edit/{id}', [TaskviewController::class, 'edit']);
});


