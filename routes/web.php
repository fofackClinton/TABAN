<?php

use App\Http\Controllers\agenceController;
use App\Http\Controllers\chambreController;
use App\Http\Controllers\creer_utilisateur;
use App\Http\Controllers\hotelController;
use App\Http\Controllers\publicationControllers;
use App\Http\Controllers\reservationController;
use App\Http\Controllers\utilisateurController;
use App\Http\Controllers\voitureController;
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

route::get('/acceuil',[publicationControllers::class, 'index']);
route::get('/acceuil1',[publicationControllers::class, 'index1']);
//Route::get('/agence', [agenceController::class, 'show']);
Route::get('/agence', [agenceController::class, 'index']);
Route::post('/agence/create', [agenceController::class, 'create']);
Route::get('/agence/show', [agenceController::class, 'show']);



Route::get('/chambre', [chambreController::class, 'index']);
Route::post('/chambre/create', [chambreController::class, 'create']);
Route::get('/chambre/show', [chambreController::class, 'show']);
Route::get('/chambre/show1/{id}', [chambreController::class, 'show1']);

Route::get('/hotel/delete/{id}', [hotelController::class, 'destroy']);
Route::get('/hotel/update/{id}', [hotelController::class, 'edit']);
Route::get('/hotel', [hotelController::class, 'index']);
Route::post('/hotel/create', [hotelController::class, 'create']);
Route::get('/hotel/show', [hotelController::class, 'show']);


Route::put('/voiture/update/{id}', [voitureController::class, 'update']);
Route::get('/voiture/publier/{id}', [voitureController::class, 'store']);
Route::get('/agence/delete/{id}', [agenceController::class, 'destroy']);
Route::get('/agence/update/{id}', [agenceController::class, 'update']);
Route::get('/voiture', [voitureController::class, 'index']);
Route::post('/voiture/create', [voitureController::class, 'create']);
Route::get('/voiture/show', [voitureController::class, 'show']);
Route::get('/voiture/show1/{id}', [voitureController::class, 'show1']);
Route::get('/voiture/delete/{id}', [voitureController::class, 'destroy']);
Route::get('/voiture/edit/{id}', [voitureController::class, 'edit']);

Route::get('/reservation', [reservationController::class, 'show']);
Route::post('/reservation/create', [reservationController::class, 'storeV']);
Route::post('/reservation/create1', [reservationController::class, 'storeC']);
Route::get('/reservation/show/{id}', [reservationController::class, 'create']);
Route::get('/reservation/delete/{id}', [reservationController::class, 'update']);
Route::get('/reservation/update/{id}', [reservationController::class, 'destroy']);

Route::get('/utilisateur/show', [utilisateurController::class, 'show']);
Route::get('/utilisateur/onoff/{id}', [utilisateurController::class, 'onoff']);
Route::get('/users', [utilisateurController::class, 'voir']);
Route::get('/users/deconnexion', [utilisateurController::class, 'deconnexion']);
Route::get('/users/choix', [utilisateurController::class, 'choix']);
Route::post('/users/log', [utilisateurController::class, 'authentification']);
Route::post('/users/create', [utilisateurController::class, 'create']);
Route::post('/users/createA', [utilisateurController::class, 'createA']);
Route::post('/users/createH', [utilisateurController::class, 'createH']);
Route::get('/users/update/{id}', [utilisateurController::class, 'destroy']);
Route::get('/users/log', [utilisateurController::class, 'index'])->name('login');

Route::get('/compte', [utilisateurController::class, 'index']);
Route::get('/compteA', [utilisateurController::class, 'indexA']);
Route::get('/compteH', [utilisateurController::class, 'indexH']);


Route::get('/delete/pub1/{id}', [publicationControllers::class, 'delete1']);
Route::get('/delete/pub2/{id}', [publicationControllers::class, 'delete2']);
Route::middleware(['auth','role:h'])->group(function(){

Route::get('/hotel/reservation/{id}', [hotelController::class, 'resa']);
Route::get('/hotel/pub/{id}', [hotelController::class, 'publication']);
Route::get('/chambre/delete/{id}', [chambreController::class, 'destroy']);
Route::get('/chambre/edit/{id}', [chambreController::class, 'edit']);
Route::put('/chambre/update/{id}', [chambreController::class, 'update']);
Route::get('/chambre/publier/{id}', [chambreController::class, 'store']);

});
Route::middleware(['auth','role:a'])->group(function(){


Route::get('/agence/reservation/{id}', [agenceController::class, 'resa']);
Route::get('/agence/pub/{id}', [agenceController::class, 'publication']);
Route::get('/agence/resa/{id}', [agenceController::class, 'publication']);

 });
 Route::middleware(['auth'])->group(function(){
route::get('/reservation/chambre/{id}',[publicationControllers::class, 'reservationH']);
route::get('/reservation/voiture/{id}',[publicationControllers::class, 'reservationV']);

});



