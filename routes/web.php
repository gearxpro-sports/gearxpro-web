<?php

use App\Livewire\Customers\Index as CustomersIndex;
use App\Livewire\Customers\Show as CustomerShow;
use App\Livewire\Customers\Edit as CustomerEdit;
use App\Livewire\Resellers\Index as ResellersIndex;
use App\Livewire\Resellers\Show as ResellerShow;
use App\Livewire\Resellers\Create as ResellerCreate;
use App\Livewire\Resellers\Edit as ResellerEdit;
use Illuminate\Support\Facades\Route;
use App\Livewire\Shop\Index as ShopIndex;
use App\Livewire\Shop\Products\Index as ProductIndex;
use App\Livewire\Shop\Products\Show as ProductShow;
use App\Livewire\Shop\Cart\Index as CartIndex;
use App\Livewire\Shop\Cart\Checkout as CartCheckout;
use App\Livewire\Shop\Cart\Payment as CartPayment;
use App\Livewire\Register\Index as RegisterIndex;
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

Route::get('/', [ShopIndex::class, '__invoke'])->name('home');

Route::get('/shop/register', [RegisterIndex::class, '__invoke'])->name('register');

Route::name('shop.')->group(function () {
    Route::get('/shop', [ProductIndex::class, '__invoke'])->name('index');
    Route::get('/shop/cart', [CartIndex::class, '__invoke'])->name('cart');
    Route::get('/shop/checkout', [CartCheckout::class, '__invoke'])->name('checkout');
    Route::get('/shop/payment', [CartPayment::class, '__invoke'])->name('payment');
    Route::get('/shop/{product}', [ProductShow::class, '__invoke'])->name('show');
});

Route::get('/confirm', function() {
    return view('confirm');
})->name('confirm');

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
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
