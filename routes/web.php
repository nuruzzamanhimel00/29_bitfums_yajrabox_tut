<?php

use App\DataTables\UserDataTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function (UserDataTable $dataTable) {
    return $dataTable->render('index');
    // return view('index');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user-delete/{id}', [HomeController::class, 'userDelete'])->name('user.delete');
Route::get('/get-users', [HomeController::class, 'getUsers'])->name('get.users');
