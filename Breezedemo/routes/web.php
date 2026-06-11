<?php

use App\Http\Controllers\AssistentController;
use App\Http\Controllers\MondhygienistController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PraktijkmanagementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TandartsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Role-based routes
Route::middleware(['auth', 'role:tandarts'])->group(function () {
    Route::get('/tandarts', [TandartsController::class, 'index'])->name('tandarts.index');
});

Route::middleware(['auth', 'role:mondhygiënist'])->group(function () {
    Route::get('/mondhygienist', [MondhygienistController::class, 'index'])->name('mondhygienist.index');
});

Route::middleware(['auth', 'role:praktijkmanagement'])->group(function () {
    Route::get('/praktijkmanagement', [PraktijkmanagementController::class, 'index'])->name('praktijkmanagement.index');
    Route::get('/praktijkmanagement/userroles', [PraktijkmanagementController::class, 'manageUserroles'])->name('praktijkmanagement.userroles');
    Route::get('/praktijkmanagement/{id}/edit', [PraktijkmanagementController::class, 'edit'])->name('praktijkmanagement.edit');
    Route::put('/praktijkmanagement/{id}', [PraktijkmanagementController::class, 'update'])->name('praktijkmanagement.update');
    Route::delete('/praktijkmanagement/{id}', [PraktijkmanagementController::class, 'destroy'])->name('praktijkmanagement.destroy');
    Route::get('/praktijkmanagement/{id}', [PraktijkmanagementController::class, 'show'])->name('praktijkmanagement.show');
});

Route::middleware(['auth', 'role:assistent'])->group(function () {
    Route::get('/assistent', [AssistentController::class, 'index'])->name('assistent.index');
});

Route::middleware(['auth', 'role:patient,praktijkmanagement'])->group(function () {
    Route::get('/patient', [PatientController::class, 'index'])->name('patient.index');
});

require __DIR__.'/auth.php';
