<?php

use App\Http\Controllers\CommuneController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NiveauController;
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
    return view('auth.login');
});

// ------------------------------------- Login ------------------------------------------- //
    Route::get('/logout', [loginController::class, 'logout'])->name('logout');
// ------------------------------------- Login ------------------------------------------- //

//  ----------------------------------- Niveau ------------------------------------------- //
    Route::match(['get', 'post'], '/ajouter-niveau', [NiveauController::class, 'index'])->name('ajouterNiveau');
    Route::match(['post', 'get'], '/liste-niveau', [NiveauController::class, 'liste'])->name('listeNiveau');
    Route::match(['post', 'get'], '/liste-niveau-{niveau}', [NiveauController::class, 'modifier'])->name('modifierNiveau');
    Route::match(['post', 'get'], '/supprimer-niveau-{niveau}', [NiveauController::class, 'supprimer'])->name('supprimerNiveau');
//  ----------------------------------- Niveau ------------------------------------------- //

//  ----------------------------------- Commune ------------------------------------------- //
    Route::match(['get', 'post'], '/liste-des-communes', [CommuneController::class, 'index'])->name('listeCommune');
    Route::match(['get', 'post'], '/ajoute-communes', [CommuneController::class, 'ajouter'])->name('ajouterCommune');
    Route::match(['get', 'post'], '/modifier-communes-{commune}', [CommuneController::class, 'modifier'])->name('modifierCommune');
//  ----------------------------------- Commune ------------------------------------------- //

//  ----------------------------------- Eleve ------------------------------------------- //
    Route::match(['get', 'post'], '/ajouter-eleve', [EleveController::class, 'index'])->name('eleveAjoute');
    Route::match(['get', 'post'], '/liste-eleve', [EleveController::class, 'liste'])->name('listeEleve');
//  ----------------------------------- Eleve ------------------------------------------- //
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';