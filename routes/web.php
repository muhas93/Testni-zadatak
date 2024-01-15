<?php
use Illuminate\Support\Facades\Auth;

use app\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\StavkaShow;
use App\Http\Controllers\StavkaController;
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

Auth::routes();
// web.php
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/stavka', [StavkaController::class, 'index'])->name('stavka.index');
Route::get('/stavka/edit/{stavka_id}', [StavkaController::class, 'edit'])->name('stavka.edit');
Route::post('/stavka/update/{stavka_id}', [StavkaController::class, 'update'])->name('stavka.update');
Route::get('/stavka/delete/{stavka_id}', [StavkaController::class, 'delete'])->name('stavka.delete');
Route::post('/stavka/destroy/{stavka_id}', [StavkaController::class, 'destroy'])->name('stavka.destroy');
