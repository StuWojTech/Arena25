<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Management\CategoryController;
use App\Http\Controllers\Management\HallController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\Coaches;
use App\Http\Controllers\CoachesController;
use App\Models\Hall;


Route::get('/', function () {
    $halls = Hall::all();
    return view('welcome')->with('halls', $halls);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/management', function () {
    return view('management.index');
});

Route::get('/coaches', [CoachesController::class, 'index']);
Route::get('/coaches', [CoachesController::class, 'index'])->name('coaches.index');
Route::get('/coaches/create', [CoachesController::class, 'create'])->name('add.coaches');
Route::post('/coaches/store', [CoachesController::class, 'store'])->name('store.coaches'); 


Route::resource('management/category', CategoryController::class);
Route::resource('management/hall', HallController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 //routes for report
    
 Route::get('/report', [ReportController::class, 'index']);
 Route::get('/report/show', [ReportController::class, 'show']);
 
 // Export to excel
 Route::get('/report/show/export', [ReportController::class, 'export']);

require __DIR__.'/auth.php';
