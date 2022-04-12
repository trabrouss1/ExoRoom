<?php

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';