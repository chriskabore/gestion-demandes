<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\CitoyenController;
use App\Http\Controllers\PieceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/mes-demandes', [DemandeController::class, 'mesDemandes'])->name('citoyen.mes.demandes');
    Route::get('/ma-demande/{demandeId}', [DemandeController::class, 'maDemande'])->name('citoyen.ma.demande');
    Route::post('/demandes', [DemandeController::class, 'store'])->name('demandes.store');
    Route::get('/citoyen/services', [ServiceController::class, 'index'])->name('citoyen.services');
    Route::get('/services/{serviceId}', [ServiceController::class, 'show'])->name('services.show');
    Route::post('/demandes/{demandeId}/pieces/{pieceId}', [DemandeController::class, 'attachPiece'])->name('demande.attach.piece');
    Route::delete('/services/{serviceId}', [ServiceController::class, 'destroy'])->name('services.destroy');
    Route::put('/services/{serviceId}', [ServiceController::class, 'edit'])->name('services.edit');

    // demandes
    Route::get('/demandes/create', [DemandeController::class, 'create'])->name('demandes.create');


});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services');
    Route::get('/admin/citoyens', [CitoyenController::class, 'index'])->name('admin.citoyens');
    Route::get('/admin/demandes', [DemandeController::class, 'index'])->name('admin.demandes');
    Route::get('/services', [ServiceController::class, 'create'])->name('services.create');
});




require __DIR__.'/auth.php';
