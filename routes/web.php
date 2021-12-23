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
    return view('auth/login');
});
Auth::routes();
$to = '/dashboard';

Route::redirect('/', $to);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/userAdd', [App\Http\Controllers\HomeController::class, 'userAdd'])->name('userAdd');
Route::get('/userlist', [App\Http\Controllers\HomeController::class, 'userlist'])->name('userlist');
Route::post('/userEdit', [App\Http\Controllers\HomeController::class, 'userEdit'])->name('userEdit');
Route::post('/addUser', [App\Http\Controllers\HomeController::class, 'addUser'])->name('addUser');
Route::post('/deleteUser', [App\Http\Controllers\HomeController::class, 'deleteUser'])->name('deleteUser');
Route::get('/attendance_list', [App\Http\Controllers\HomeController::class, 'attendance_list'])->name('attendance_list');

Route::get('/start_login', [App\Http\Controllers\HomeController::class, 'start_login'])->name('start_login');
Route::get('/start_lunch', [App\Http\Controllers\HomeController::class, 'start_lunch'])->name('start_lunch');
Route::get('/stop_lunch', [App\Http\Controllers\HomeController::class, 'stop_lunch'])->name('stop_lunch');
Route::get('/stop_login', [App\Http\Controllers\HomeController::class, 'stop_login'])->name('stop_login');
Route::post('/check_email', [App\Http\Controllers\HomeController::class, 'check_email'])->name('check_email');

Route::get('/generate_password', [App\Http\Controllers\HomeController::class, 'generate_password'])->name('generate_password');

