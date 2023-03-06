<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\KendaraanController;

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

// Route::get('/', [HomeController::class, 'index']);
// Route::get('/about', [AboutController::class, 'index']);
// Route::get('/articles/{id}', [ArticleController::class, 'show']);

// Route::get('/', [PageController::class, 'home']);

// Route::prefix('products')->group(function(){
//     Route::get('/list', [PageController::class, 'products']);
// });

// Route::get('/news/{key}', [PageController::class, 'news']);

// Route::prefix('programs')->group(function(){
//     Route::get('/list', [PageController::class, 'programs']);
// });

// Route::get('/about', [PageController::class, 'about']);

// Route::resource('contact', PageController::class);

// Route::get('/', [HomeController::class, 'home']);

// Route::prefix('product')->group(function(){
//     Route::get('/list', [HomeController::class, 'product']);
// });

// Route::get('/news/{key}', [HomeController::class, 'news']);

// Route::prefix('programs')->group(function(){
//     Route::get('/list', [HomeController::class, 'programs']);
// });

// Route::get('/about', [HomeController::class, 'about']);

// Route::resource('contact', HomeController::class);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/pengalaman', [PengalamanController::class, 'index']);

Route::get('/kendaraan', [KendaraanController::class, 'index']);

Route::get('/hobby', [HobbyController::class, 'index']);