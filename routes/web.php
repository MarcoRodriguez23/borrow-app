<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile-{user}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard',HomeController::class)->name('dashboard');

//rutas para el item
Route::get('/create-item',[ItemController::class, 'create'])->name('item.create');
Route::post('/create-item',[ItemController::class, 'store'])->name('item.store');
Route::get('/item/{item}',[ItemController::class, 'show'])->name('item.show');
Route::get('/item/{item}/edit',[ItemController::class, 'edit'])->name('item.edit');
Route::patch('/item/{item}/edit',[ItemController::class, 'update'])->name('item.update');
// Route::get('/items/{item}',[ItemController::class, 'index'])->name('item.index');

//rutas para contactos
Route::get('/solicitudes',[ContactController::class,'index'])->name('solicitudes');
Route::post('/profile-{user}/contact',[ContactController::class,'store'])->name('user.contact');
Route::delete('/profile-{contact}/uncontact',[ContactController::class,'destroy'])->name('user.uncontact');
Route::put('/profile-{contact}/accept',[ContactController::class,'update'])->name('user.accept');

require __DIR__.'/auth.php';
