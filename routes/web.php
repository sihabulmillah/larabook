<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LarabookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LoginController;


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

Route::get('/masuk', function () {
    return view('masuk');
})->name('masuk');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::post('/postlogin', [LoginController::class, 'login'])->name('cekLogin');

Route::get('/item', function () {
    return view('item');
});


Route::group(['middleware' => ['auth:pengguna', 'ceklevel:a,p,s']], function () {

    Route::get('/dashboard', [LarabookController::class, 'dashboard'])->name('dashboard');
    //membuat jalur ke controller, CRUD Table Buku
    Route::get('/book', [LarabookController::class, 'index'])->name('book');
    Route::get('/create-book', [LarabookController::class, 'create'])->name('create-book');
    Route::post('/book/store', [LarabookController::class, 'store']);
    Route::get('/edit{id}', [LarabookController::class, 'edit'])->name('edit-book');
    Route::post('/book/update-{id}', [LarabookController::class, 'update']);
    Route::get('/hapus{id}', [LarabookController::class, 'destroy'])->name('delete-book');
    Route::get('/show-{id}', [LarabookController::class, 'show'])->name('show');

    //membuat jalur ke controller, CRUD Table Kategori
    // Route::resource('category', [CategoryController::class]);
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/tambah', [CategoryController::class, 'create'])->name('tambah-category');
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::get('/rubah-{id}', [CategoryController::class, 'edit'])->name('rubah-category');
    Route::post('/category/update{id}', [CategoryController::class, 'update']);
    Route::get('/buang-{id}', [CategoryController::class, 'destroy'])->name('buang-category');


    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::get('/create', [PenggunaController::class, 'create'])->name('create-pengguna');
    Route::post('/pengguna/store', [PenggunaController::class, 'store']);
    Route::get('/ubah-{id}', [PenggunaController::class, 'edit'])->name('edit-pengguna');
    Route::post('/pengguna/update-{id}', [PenggunaController::class, 'update']);
    Route::get('/delete-{id}', [PenggunaController::class, 'destroy'])->name('delete-pengguna');
});
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
