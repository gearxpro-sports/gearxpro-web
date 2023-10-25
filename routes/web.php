<?php

use App\Livewire\Customers\Index as CustomersIndex;
use App\Livewire\Customers\Show as CustomerShow;
use App\Livewire\Customers\Edit as CustomerEdit;
use App\Livewire\Profile\Edit as ProfileEdit;
use App\Livewire\Resellers\Index as ResellersIndex;
use App\Livewire\Resellers\Show as ResellerShow;
use App\Livewire\Resellers\Create as ResellerCreate;
use App\Livewire\Resellers\Edit as ResellerEdit;
use App\Livewire\Products\Index as ProductsIndex;
use App\Livewire\Products\Edit as ProductsEdit;
use App\Livewire\Categories\Index as CategoriesIndex;
use App\Livewire\Categories\Create as CategoriesCreate;
use App\Livewire\Categories\Edit as CategoriesEdit;
use App\Livewire\Supply\Index as SupplyIndex;
use App\Livewire\Supply\Purchases\Index as SupplyPurchasesIndex;
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
            Route::get('/create', ResellerCreate::class)->name('resellers.create');
            Route::get('/{reseller}', ResellerShow::class)->name('resellers.show');
            Route::get('/{reseller}/edit', ResellerEdit::class)->name('resellers.edit')->middleware(['role:superadmin']);
        });

        Route::prefix('products')->group(function () {
            Route::get('/', ProductsIndex::class)->name('products.index');
            Route::get('/{product}/edit', ProductsEdit::class)->name('products.edit');
        });

        Route::prefix('categories')->middleware(['role:superadmin'])->group(function () {
            Route::get('/', CategoriesIndex::class)->name('categories.index');
            Route::get('/create', CategoriesCreate::class)->name('categories.create');
            Route::get('/{category}/edit', CategoriesEdit::class)->name('categories.edit');
        });
        Route::prefix('supply')->middleware(['role:reseller'])->group(function() {
            Route::get('/', SupplyIndex::class)->name('supply.index');
        });
        Route::prefix('purchases')->middleware(['role:reseller'])->group(function() {
            Route::get('/', SupplyPurchasesIndex::class)->name('supply.purchases.index');
        });
    });

    Route::get('/profile', ProfileEdit::class)->name('profile.edit');
});

require __DIR__.'/auth.php';
