<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\TransactionController;


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

Route::domain('shopeasy.ge')->group(function () {
    Route::get('/', function () {
        return view('main.shopeasy');
    });
    Route::get('/terms', function () {
        return view('main.terms');
    });
    Route::get('/refresh_captcha', [MainController::class, 'captcha'])->name('captcha');

});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    // Route::get('/dashboard', [MainController::class, 'redirectShopAdmin']);
    // admin
    Route::get('/dashboard', [AdminController::class, 'dashboardIndex']);
    Route::get('admin/products', [ProductController::class, 'index']);
    Route::post('admin/add-product', [ProductController::class, 'store']);
    Route::put('admin/edit-product/{id}', [ProductController::class, 'update']);
    Route::delete('admin/delete-product/{id}', [ProductController::class, 'delete']);
    Route::get('admin/setting', [AdminController::class, 'settingIndex']);
    Route::put('admin/setting', [AdminController::class, 'settingUpdate']);
    Route::get('admin/terms', [AdminController::class, 'termsIndex']);
    Route::put('admin/terms', [AdminController::class, 'termsUpdate']);
    Route::get('admin/orders', [AdminController::class, 'orderIndex']);
    Route::post('admin/orders', [AdminController::class, 'orderUpdate']);
    Route::get('admin/transactions', [AdminController::class, 'transactionIndex']);
    Route::post('admin/transactions', [AdminController::class, 'transactionUpdate']);
    Route::get('admin/additional-options', [AdminController::class, 'additionalOptions']);
    Route::put('admin/additional-options', [AdminController::class, 'additionalUpdate'])->name('additional.update');
    Route::get('admin/payment-methods', [AdminController::class, 'paymentMethodIndex']);
    Route::post('admin/payment-methods', [AdminController::class, 'paymentMethodUpdate']);
    Route::post('admin/add-iban', [AdminController::class, 'addIban']);
    Route::get('admin/integration', [AdminController::class, 'integration']);
    Route::put('admin/integration', [AdminController::class, 'integrationUpdate'])->name('integration.update');
    Route::get('admin', [AdminController::class, 'dashboardIndex']);
    Route::get('admin/dashboard', [AdminController::class, 'dashboardIndex']);
    Route::put('admin/payment-update', [AdminController::class, 'paymentUpdate'])->name('payment.update');
    Route::get('admin/main-page', [AdminController::class, 'mainPageIndex']);
    Route::put('admin/main-page', [AdminController::class, 'mainPageUpdate']);
});

Route::domain('{company_name}.shopeasy.ge')->group(function () {
    Route::get('/', [MainController::class, 'index']);
    Route::get('/terms-condition', [MainController::class, 'termsCondition']);
    Route::get('/terms-delivery', [MainController::class, 'termsDelivery']);
    Route::get('/return-policy', [MainController::class, 'returnPolicy']);
    Route::get('/confidence-policy', [MainController::class, 'confidencePolicy']);

    Route::post('create-order', [OrderController::class, 'store']);
    Route::get('transaction/{id}', [TransactionController::class, 'createTransaction']);
    Route::get('refound/{id}', [TransactionController::class, 'refound']);

    Route::get('cart/show-product', [CartController::class, 'show']);
    Route::get('cart/add-product/{id}', [CartController::class, 'store']);
    Route::put('cart/edit-product/{id}', [CartController::class, 'update']);
    Route::get('cart/delete-product/{id}', [CartController::class, 'delete']);
    Route::get('cart/plus-product/{id}', [CartController::class, 'plus']);
    Route::get('cart/minus-product/{id}', [CartController::class, 'minus']);

});

Route::get('merchants', [DashboardController::class, 'merchants']);
Route::put('edit-merchants/{id}', [DashboardController::class, 'merchantsUpdate'])->name('update.merchants');
Route::delete('delete-merchants/{id}', [DashboardController::class, 'merchantsDestroy'])->name('delete.merchants');

Route::get('callback/{id}', [TransactionController::class, 'callback']);

Route::get('test', [TransactionController::class, 'test']);


Route::get('locale/{lang}', [LocalizationController::class, 'setLang']);





