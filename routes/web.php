<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\gallerycontroller;
use Illuminate\Support\Facades\Route;

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
});


Route::get('/userdashboard', [usercontroller::class, 'index']);
Route::get('/admindashboard', [admincontroller::class, 'index'])->middleware(['auth','admin']);


Route::get('/usergallery', [gallerycontroller::class, 'usergallery'])->name('user.gallery');
Route::delete('/usergallery/{Gallery}', [gallerycontroller::class, 'purchasegallery'])->name('purchase.gallery');


Route::get('/addgallery', [gallerycontroller::class, 'index'])->name('view.gallery')->middleware(['auth','admin']);
Route::post('/addgallery', [gallerycontroller::class, 'store'])->name('add.gallery')->middleware(['auth','admin']);
Route::delete('/addgallery/{Gallery}', [gallerycontroller::class, 'destroy'])->name('delete.gallery')->middleware(['auth','admin']);
Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('edit.gallery')->middleware(['auth','admin']);
Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('update.gallery')->middleware(['auth','admin']);


require __DIR__.'/auth.php';
