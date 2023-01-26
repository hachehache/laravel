<?php

// recup depuis web2.php pour Breeze 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\EtiquetteController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hello/{name}', [HelloController::class, 'index'])->name('hello');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/etiquette', [EtiquetteController::class, 'index'])->name('etiquette');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
Route::get('/mentions-legales', [MentionsLegalesController::class, 'index'])->name('mentions-legales');
Route::get('/copyright', [CopyrightController::class, 'index'])->name('copyright');

// middleware('auth'): acces avec mot de passe pour accéder a page reservation
Route::get('/admin/reservation', [AdminReservationController::class, 'index'])->middleware('auth')->name('admin.reservation.index');
Route::get('/admin/reservation/create', [AdminReservationController::class, 'create'])->middleware('auth')->name('admin.reservation.create');

// pour une nouvelle reservation
Route::post('/admin/reservation/store', [AdminReservationController::class, 'store'])->middleware('auth')->name('admin.reservation.store');
// get - est là pour afficher le formulaire
Route::get('/admin/reservation/{id}/edit', [AdminReservationController::class, 'edit'])->middleware('auth')->name('admin.reservation.edit');
// post - remet le formulaire
Route::post('/admin/reservation/{id}update', [AdminReservationController::class, 'update'])->middleware('auth')->name('admin.reservation.update');


// route de Breeze
// recup depuis web2.php pour Breeze 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// middleware: toute les routes en dessous seront protegees par pwd
Route::middleware('auth')->group(function () {
//pour afficher compte
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//Patch:pour modif compte ou maj partielle (exemple:changement adresse email 
//sans changer pwd)
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
