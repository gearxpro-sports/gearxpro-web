<?php

use App\Livewire\Customers\Index as CustomersIndex;
use App\Livewire\Customers\Show as CustomerShow;
use App\Livewire\Customers\Edit as CustomerEdit;
use App\Livewire\Customers\Profile as CustomerProfile;
use App\Livewire\Invoices\Show as InvoiceShow;
use App\Livewire\Invoices\Index as InvoicesIndex;
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
use App\Livewire\Shop\Splash;
use App\Livewire\Stocks\Index as StocksIndex;
use App\Livewire\Supply\Index as SupplyIndex;
use App\Livewire\Supply\Recap as SupplyRecap;
use App\Livewire\Supply\Purchases\Index as SupplyPurchasesIndex;
use App\Livewire\Supply\Purchases\Show as SupplyPurchaseShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Shop\Index as ShopIndex;
use App\Livewire\Shop\Products\Index as ProductIndex;
use App\Livewire\Shop\Products\Show as ProductShow;
use App\Livewire\Shop\Cart\Index as CartIndex;
use App\Livewire\Shop\Cart\Checkout as CartCheckout;
use App\Livewire\Shop\Cart\Payment as CartPayment;
use App\Livewire\Register\Index as RegisterIndex;

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

Route::domain(env('APP_URL'))->group(function() {
    Route::get('/', function() {
        return redirect()->route('splash');
    });
    Route::get('/welcome', Splash::class)->name('splash');
});

Route::middleware('country')->domain('{country_code}.'.env('APP_URL'))->group(function() {
    Route::get('/', [ShopIndex::class, '__invoke'])->name('home');

    Route::name('shop.')->group(function () {
        Route::get('/shop/register', [RegisterIndex::class, '__invoke'])->name('register');

        Route::get('/shop', [ProductIndex::class, '__invoke'])->name('index');
        Route::get('/shop/cart', [CartIndex::class, '__invoke'])->name('cart');
        Route::get('/shop/checkout', [CartCheckout::class, '__invoke'])->name('checkout');
        Route::get('/shop/payment', [CartPayment::class, '__invoke'])->name('payment');
        Route::get('/shop/{product}', [ProductShow::class, '__invoke'])->name('show');
    });

    // TODO: check se vista accessibile sempre o solo se c'è un ordine effettuato in precedenza
    Route::get('/confirm', function() {
        return view('confirm');
    })->name('confirm');
});

Route::middleware(['auth', 'verified'])->domain(env('APP_URL'))->group(function() {
    Route::get('customer/profile', CustomerProfile::class, '__invoke')->name('customer.profile');
});

Route::middleware(['auth', 'verified'])->domain(env('APP_URL'))->prefix('dashboard')->group(function() {
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
            Route::get('/recap', SupplyRecap::class)->name('supply.recap');
        });

        Route::prefix('purchases')->group(function() {
            Route::get('/', SupplyPurchasesIndex::class)->name('supply.purchases.index');
            Route::get('/{supply}', SupplyPurchaseShow::class)->name('supply.purchases.show')->middleware(['role:superadmin|reseller']);
            Route::get('/{supply}/invoice', InvoiceShow::class)->name('supply.purchases.invoice');
        });

        Route::prefix('invoices')->group(function() {
            Route::get('/', InvoicesIndex::class)->name('invoices.index');
        });

        Route::prefix('stocks')->middleware(['role:reseller'])->group(function() {
            Route::get('/', StocksIndex::class)->name('stocks.index');
        });
    });

    Route::get('/profile', ProfileEdit::class)->name('profile.edit');
});



require __DIR__.'/auth.php';
