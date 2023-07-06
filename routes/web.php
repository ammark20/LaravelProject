<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


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

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::view("/register",'register');
Route::post("/login",[UserController::class,'login']);
Route::post("/register", [UserController::class,'register'])->name('register');
Route::get("/", [ProductController::class, 'index'])->name('index');
Route::get("detail/{id}", [ProductController::class, 'detail']);
Route::get("search", [ProductController::class, 'search']);
Route::post("add_to_cart", [ProductController::class, 'addToCart']);
Route::get("cartlist", [ProductController::class, 'cartList']); 
Route::get("removecart/{id}", [ProductController::class, 'removeCart']);
Route::get("ordernow", [ProductController::class, 'orderNow']); 
Route::post("orderplace", [ProductController::class, 'orderPlace']);
Route::get("myorders", [ProductController::class, 'myOrders']);

// Updated route for filtering
Route::get("/filter", [ProductController::class, 'index'])->name('products.filter');

// Routes for Admin Dashboard
//Route::middleware(['auth', 'admin'])->group(function () {
    Route::get("/dashboard", [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get("/admin/users", [AdminController::class, 'users'])->name('admin.users');
    Route::get("/product", [AdminController::class, 'products'])->name('admin.products');
    Route::get("/admin/orders", [AdminController::class, 'orders'])->name('admin.orders');
    Route::post("/admin/users/{id}/make-admin", [AdminController::class, 'makeAdmin'])->name('admin.users.makeAdmin');
    Route::post("/product/{id}/delete", [AdminController::class, 'deleteProduct'])->name('admin.products.delete');
    Route::post("/order/{id}/update-status", [AdminController::class, 'updateOrderStatus'])->name('admin.orders.update-status');
//});
