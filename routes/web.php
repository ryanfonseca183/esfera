<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::delete('empresas', [EmpresaController::class, 'destroy'])->name('empresas.destroy');
Route::resource('empresas', EmpresaController::class)->except('destroy');
Route::delete('empresas/{empresa}/funcionarios', [FuncionarioController::class, 'destroy'])->name('empresas.funcionarios.destroy');
Route::resource('empresas.funcionarios', FuncionarioController::class)->except('destroy', 'index', 'show');

Route::get('/home', [HomeController::class, 'index'])->name('home');
