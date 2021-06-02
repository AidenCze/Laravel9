<?php
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\SitesController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

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

Route::get('/test',[SitesController::class, 'test_redirect']);
Route::get('/logout',[UserController::class, 'lougout']);
Route::get('/produkt/{id}',[ProductController::class, 'product']);

Route::middleware(['user'])->group(function () {
Route::get('/register',[UserController::class, 'register_redirect']);
Route::post('/register', [UserController::class, 'store']);
Route::get('/login',  [LoginUserController::class, 'redirect']);
Route::post('/test',[LoginUserController::class, 'dologin']);
Route::post('/login',  [LoginUserController::class, 'dologin']);
});

Route::middleware(['admin'])->group(function () {
Route::get('/producer',[ProducerController::class, 'store']);
Route::post('/producer',[ProducerController::class, 'store']);
Route::get('delete/{id}',[ProducerController::class, 'destroy']);
Route::get('/category',[CategoryController::class, 'store']);
Route::post('/category',[CategoryController::class, 'store']);
Route::get('delete/{id}',[CategoryController::class, 'destroy']);
Route::get('/subcategory',[SubcategoryController::class, 'store']);
Route::post('/subcategory',[SubcategoryController::class, 'store']);
Route::get('/product',[ProductController::class, 'store']);
Route::post('/product',[ProductController::class, 'store']);
Route::get('/admin',[UserController::class, 'admin_redirect']);
});


