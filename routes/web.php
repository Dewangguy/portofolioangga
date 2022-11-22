<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LoginController;
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
//admin
Route::middleware('auth')->group(function (){
    Route::get('/dashbord', [Dashboardcontroller::class, 'index']);
    Route::get('/', [HomeController::class, 'index']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/mastersiswa/{id_siswa}/hapus', [Siswacontroller::class, 'hapus'])->name('mastersiswa.hapus');
    Route::resource('/mastersiswa', SiswaController::class);
    Route::resource('/masterproject', ProjectController::class);
    Route::get('/masterproject/create/{id}', [ProjectController::class, 'createProject']);
    Route::resource('/masterkontak', ContactController::class);
    Route::get('/masterproject/{id_siswa}/hapus',[ProjectController::class,"hapus"] )->name('masterproject.hapus');
    Route::resource('/jnsKontak',JenisController::class);
});
Route::get('/homee', [HomeController::class, 'home']);

//guest
Route::middleware(['guest'])->group(function (){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
    Route::get('/home', function () { return view('home');});
    Route::get('/about', function () { return view('about');});
    Route::get('/project', function () { return view('project');});
    Route::get('/dashboard', function () { return view('dashboard');});
});