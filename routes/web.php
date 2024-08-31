<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/', [HomeController::class, 'page'])->name('home.page');
Route::get('/categoria/{id}', [HomeController::class, 'showProductsByCategory'])->name('category.products');
Route::get('/categorias', [HomeController::class, 'showCategories'])->name('categories');
Route::get('/marca/{id}', [HomeController::class, 'showProductsByBrand'])->name('brand.products');
Route::get('/marcas', [HomeController::class, 'showBrands'])->name('brands');
Route::get('/producto/{id}', [HomeController::class, 'showProductSelected'])->name('view.product');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/show', [HomeController::class, 'show_cart'])->name('cart.show');
Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/order/confirmation/{order}', [HomeController::class, 'orderConfirmation'])->name('order_confirmation');
Route::get('/mis-ordenes', [HomeController::class, 'showOrders'])->middleware('auth')->name('user.orders');
Route::get('/search/results/{name}', [HomeController::class, 'searchResults'])->name('search.results');


// Route::get('/correo',function(){
//     Mail::to('fabian.leo2911@gmail.com')->send(new OrderConfirmationMail());
//     return 'Mensaje enviado';
// })->name('correo');
