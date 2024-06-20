<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

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



    Route::post('/mes-demandes', [DemandeController::class, 'mesDemandes'])->name('demandes.mes-demandes');
    Route::post('/ma-demande/{demandeId}', [DemandeController::class, 'maDemande'])->name('demandes.ma-demande');
    Route::post('/demandes', [DemandeController::class, 'store'])->name('demandes.store');
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/{serviceId}', [ServiceController::class, 'show'])->name('services.show');
    Route::post('/demandes/{demandeId}/pieces/{pieceId}', [DemandeController::class, 'attachPiece'])->name('demande.attach.piece');

});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services');
    Route::get('/admin/citoyens', [CitoyenController::class, 'index'])->name('admin.citoyens');
    Route::get('/admin/demandes', [DemandeController::class, 'index'])->name('admin.demandes');
    Route::get('/services', [ServiceController::class, 'create'])->name('services.create');
});




require __DIR__.'/auth.php';
