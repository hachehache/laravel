<?php

// recup depuis web2.php pour Breeze 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\EtiquetteController as AdminEtiquetteController;
use App\Http\Controllers\Admin\CategorieController as AdminCategorieController;
use App\Http\Controllers\Admin\PlatController as AdminPlatController;

use App\Http\Controllers\Admin\PhotoPlatController as AdminPhotoPlatController;


//use App\Http\Controllers\EtiquetteController;//

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ActusController;
use App\Http\Controllers\ContactController;


//use App\Http\Controllers\ReservationController;//
//use App\Http\Controllers\CopyrightController;//
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
/** ajout pour test modif categorie */
Route::resource('admin.categorie' , 'CategorieController');

// routes du front office

// page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
Route::get('/actus', [ActusController::class, 'index'])->name('actus');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');


Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/reservation', function () {
    return view('reservation');
})->name('reservation');

Route::get('/categorie', function () {
    return view('categorie');
})->name('categorie');

Route::get('/etiquette', function () {
    return view('etiquette');
})->name('etiquette');

Route::get('/categorie', function () {
    return view('categorie');
})->name('categorie');

// Ajouter Route PLAT au dessus ?? //

Route::get('/mentions-legales', function () {
    return view('mentions-legales');
})->name('mentions-legales');

// routes de back office

//CRUD des plats
//@todo liste des plats ==> OK Fait


//@todo modif des plats
//@todo suppression des plats

//  ******** AVERIFIER SI BON ???????
/*Route::get('/categorie', [CategorieController::class, 'index'])->name('categorie');
Route::get('/etiquette', [EtiquetteController::class, 'index'])->name('etiquette');
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
Route::get('/mentions-legales', [MentionsLegalesController::class, 'index'])->name('mentions-legales');
Route::get('/copyright', [CopyrightController::class, 'index'])->name('copyright');*/

// CRUD reservation - ADMIN: pour une nouvelle reservation
// --------------------------------
// ADMIN: middleware('auth'): acces avec mot de passe pour accéder a page reservation
Route::get('/admin/reservation', [AdminReservationController::class, 'index'])->middleware('auth')->name('admin.reservation.index');
Route::get('/admin/reservation/create', [AdminReservationController::class, 'create'])->middleware('auth')->name('admin.reservation.create');
// /store n'est pas nécessaire pour Laravel
Route::post('/admin/reservation', [AdminReservationController::class, 'store'])->middleware('auth')->name('admin.reservation.store');
// get - est là pour afficher le formulaire
Route::get('/admin/reservation/{id}/edit', [AdminReservationController::class, 'edit'])->middleware('auth')->name('admin.reservation.edit');
// post - remet le formulaire
// pour {id}update le update n'est pas nécessaire pour Laravel
//Route::post('/admin/reservation/{id}', [AdminReservationController::class, 'update'])->middleware('auth')->name('admin.reservation.update');//
Route::put('/admin/reservation/{id}', [AdminReservationController::class, 'update'])->middleware('auth')->name('admin.reservation.update');
Route::delete('/admin/reservation/{id}', [AdminReservationController::class, 'delete'])->middleware('auth')->name('admin.reservation.delete');


// ADMIN: pour une nouvelle categorie
// --------------------------------
// ADMIN: middleware('auth'): acces avec mot de passe pour accéder a page categorie
Route::get('/admin/categorie', [AdminCategorieController::class, 'index'])->middleware('auth')->name('admin.categorie.index');
// get pour la creation d'une catégorie, il n'existe pas encore de id, ne pas mettre /{id}create
Route::get('/admin/categorie/create', [AdminCategorieController::class, 'create'])->middleware('auth')->name('admin.categorie.create');
// post - remet le formulaire
Route::post('/admin/categorie', [AdminCategorieController::class, 'store'])->middleware('auth')->name('admin.categorie.store');
// get - est là pour afficher le formulaire
Route::get('/admin/categorie/{id}/edit', [AdminCategorieController::class, 'edit'])->middleware('auth')->name('admin.categorie.edit');
Route::post('/admin/categorie/{id}update', [AdminCategorieController::class, 'update'])->middleware('auth')->name('admin.categorie.update');
Route::delete('/admin/categorie/{id}', [AdminCategorieController::class, 'delete'])->middleware('auth')->name('admin.categorie.delete');

// ADMIN: pour une nouvelle etiquette
// --------------------------------
// ADMIN: middleware('auth'): acces avec mot de passe pour accéder a page etiquette sinon erreur 404
Route::get('/admin/etiquette', [AdminEtiquetteController::class, 'index'])->middleware('auth')->name('admin.etiquette.index');
Route::get('/admin/etiquette/create', [AdminEtiquetteController::class, 'create'])->middleware('auth')->name('admin.etiquette.create');
// post - remet le formulaire
Route::post('/admin/etiquette', [AdminEtiquetteController::class, 'store'])->middleware('auth')->name('admin.etiquette.store');
// get - est là pour afficher le formulaire
Route::get('/admin/etiquette/{id}/edit', [AdminEtiquetteController::class, 'edit'])->middleware('auth')->name('admin.etiquette.edit');
// post - remet le formulaire
Route::post('/admin/etiquette/{id}', [AdminEtiquetteController::class, 'update'])->middleware('auth')->name('admin.etiquette.update');
Route::delete('/admin/etiquette/{id}', [AdminEtiquetteController::class, 'delete'])->middleware('auth')->name('admin.etiquette.delete');

// ADMIN: pour une nouvelle Entrée
// --------------------------------
// ADMIN: middleware('auth'): acces avec mot de passe pour accéder a page Entrée
Route::get('/admin/entree', [AdminEntreeController::class, 'index'])->middleware('auth')->name('admin.entree.index');
Route::get('/admin/entree/create', [AdminEntreeController::class, 'create'])->middleware('auth')->name('admin.entree.create');
Route::post('/admin/entree', [AdminEntreeController::class, 'store'])->middleware('auth')->name('admin.entree.store');
// get - est là pour afficher le formulaire
Route::get('/admin/entree/{id}/edit', [AdminEntreeController::class, 'edit'])->middleware('auth')->name('admin.entree.edit');
// post - remet le formulaire
// pour {id}update le update n'est pas nécessaire pour Laravel
Route::post('/admin/entree}', [AdminEntreeController::class, 'update'])->middleware('auth')->name('admin.entree.update');
Route::delete('/admin/entree/{id}', [AdminEntreeController::class, 'delete'])->middleware('auth')->name('admin.entree.delete');

// ADMIN: pour un nouveau plat
// --------------------------------
// ADMIN: middleware('auth'): acces avec mot de passe pour accéder a page plat
Route::get('/admin/plat', [AdminPlatController::class, 'index'])->middleware('auth')->name('admin.plat.index');
Route::get('/admin/plat/create', [AdminPlatController::class, 'create'])->middleware('auth')->name('admin.plat.create');
Route::post('/admin/plat', [AdminPlatController::class, 'store'])->middleware('auth')->name('admin.plat.store');
// get - est là pour afficher le formulaire
Route::get('/admin/plat/{id}/edit', [AdminPlatController::class, 'edit'])->middleware('auth')->name('admin.plat.edit');
// post - remet le formulaire
// pour {id}update le update n'est pas nécessaire pour Laravel
Route::post('/admin/plat/{id}', [AdminPlatController::class, 'update'])->middleware('auth')->name('admin.plat.update');
Route::delete('/admin/plat/{id}', [AdminPlatController::class, 'delete'])->middleware('auth')->name('admin.plat.delete');

// ADMIN: pour une nouvelle PhotoPlat
// -------------------------------
// ADMIN: middleware('auth'): acces avec mot de passe pour accéder a page photoplat
Route::get('/admin/photoplat', [AdminPhotoPlatController::class, 'index'])->middleware('auth')->name('admin.photoplat.index');
Route::get('/admin/photoplat/create', [AdminPhotoPlatController::class, 'create'])->middleware('auth')->name('admin.photoplat.create');
Route::post('/admin/photoplat', [AdminPhotoPlatController::class, 'store'])->middleware('auth')->name('admin.photoplat.store');
// get - est là pour afficher le formulaire
Route::get('/admin/photoplat/{id}/edit', [AdminPhotoPlatController::class, 'edit'])->middleware('auth')->name('admin.photoplat.edit');
// post - remet le formulaire
// pour {id}update le update n'est pas nécessaire pour Laravel
Route::post('/admin/photoplat/{id}', [AdminPhotoPlatController::class, 'update'])->middleware('auth')->name('admin.photoplat.update');
Route::delete('/admin/photoplat/{id}', [AdminPhotoPlatController::class, 'delete'])->middleware('auth')->name('admin.photoplat.delete');

//====================================================================================================================================/

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
