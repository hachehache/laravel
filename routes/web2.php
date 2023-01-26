<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\EtiquetteController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CopyrightController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// middleware: toute les route en dessous seront protegees par pwd
Route::middleware('auth')->group(function () {
    //pour afficher compte
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Patch:pour modif compte ou maj partielle (exemple:changement adresse email 
    //sans changer pwd)
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
