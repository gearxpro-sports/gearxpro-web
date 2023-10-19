<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Shop\Index as ShopIndex;
use App\Livewire\Shop\Products\Index as ProductIndex;
use App\Livewire\Shop\Products\Show as ProductShow;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ShopIndex::class, '__invoke'])->name('home');

Route::name('shop.')->group(function () {
    Route::get('/shop', [ProductIndex::class, '__invoke'])->name('index');
    Route::get('/shop/{product}', [ProductShow::class, '__invoke'])->name('show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['role:superadmin'])->group(function () {
    Route::prefix('resellers')->group(function() {
        Route::get('/', \App\Livewire\Resellers\Index::class)->name('resellers.index');
        Route::get('/create', \App\Livewire\Resellers\Create::class)->name('resellers.create');
    });
});

require __DIR__.'/auth.php';
