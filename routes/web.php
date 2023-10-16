<?php

use App\Livewire\Customers\Index as CustomersIndex;
use App\Livewire\Customers\Show as CustomerShow;
use App\Livewire\Resellers\Index as ResellersIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::middleware(['role:superadmin|reseller'])->group(function () {
    Route::prefix('customers')->group(function () {
        Route::get('/', CustomersIndex::class)->name('customers.index');
        Route::get('/{customer}', CustomerShow::class)->name('customers.show');
    });
});

Route::middleware(['role:superadmin'])->group(function () {
    Route::get('/resellers', ResellersIndex::class)->name('resellers.index');
});

require __DIR__.'/auth.php';
