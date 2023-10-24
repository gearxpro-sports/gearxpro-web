<?php

use App\Livewire\Customers\Index as CustomersIndex;
use App\Livewire\Customers\Show as CustomerShow;
use App\Livewire\Customers\Edit as CustomerEdit;
use App\Livewire\Resellers\Index as ResellersIndex;
use App\Livewire\Resellers\Show as ResellerShow;
use App\Livewire\Resellers\Create as ResellersCreate;
use App\Livewire\Products\Index as ProductsIndex;
use App\Livewire\Products\Edit as ProductsEdit;
use App\Livewire\Categories\Index as CategoriesIndex;
use App\Livewire\Categories\Create as CategoriesCreate;
use App\Livewire\Categories\Edit as CategoriesEdit;
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
})->name('shop.index');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function() {
    Route::middleware(['role:superadmin|reseller'])->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::prefix('customers')->group(function () {
            Route::get('/', CustomersIndex::class)->name('customers.index');
            Route::get('/{customer}', CustomerShow::class)->name('customers.show');
            Route::get('/{customer}/edit', CustomerEdit::class)->name('customers.edit')->middleware(['role:superadmin']);
        });

        Route::prefix('resellers')->middleware(['role:superadmin'])->group(function() {
            Route::get('/', ResellersIndex::class)->name('resellers.index');
            Route::get('/create', ResellersCreate::class)->name('resellers.create');
            Route::get('/{reseller}', ResellerShow::class)->name('resellers.show');
            // Route::get('/{reseller}/edit', CustomerEdit::class)->name('resellers.edit')->middleware(['role:superadmin']);
        });

        Route::prefix('products')->group(function () {
            Route::get('/', ProductsIndex::class)->name('products.index');
            Route::get('/edit/{product}', ProductsEdit::class)->name('products.edit');
        });

        Route::prefix('categories')->middleware(['role:superadmin'])->group(function () {
            Route::get('/', CategoriesIndex::class)->name('categories.index');
            Route::get('/create', CategoriesCreate::class)->name('categories.create');
            Route::get('/{category}/edit', CategoriesEdit::class)->name('categories.edit');
        });
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
