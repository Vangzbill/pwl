<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PageController;
use App\Models\Article;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Models\NilaiKhs;
use App\Models\MahasiswaModel;

use Illuminate\Support\Facades\Auth;

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
Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/pengalaman', [PengalamanController::class, 'index']);
    Route::get('/kendaraan', [KendaraanController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/article/cetak_pdf', function(){
        $articles = Article::all();
        $pdf = Pdf::loadview('articles.articles_pdf', ['articles'=>$articles]);
        return $pdf->stream();
    });
    Route::resource('/mahasiswa', MahasiswaController::class)->parameter('mahasiswa', 'id');
    Route::post('/mahasiswa/data', [MahasiswaController::class, 'data']);
    Route::resource('/matkul', MatkulController::class)->parameter('matkul', 'id');
    Route::resource('/hobby', HobbyController::class)->parameter('hobby', 'id');
    Route::resource('/keluarga', KeluargaController::class)->parameter('keluarga', 'id');
    Route::get('/mhs/khs/{id}', function($id){
        $mhs = MahasiswaModel::find($id);

        $khs = NilaiKhs::where('mhs_id',$id)->get();
        return view('mahasiswa.khs')
            ->with('mhs', $mhs)
            ->with('khs', $khs); 
    });
    Route::resource('/articles', ArticleController::class);
    Route::get('/mahasiswa/cetak_khs/{id}', [MahasiswaController::class, 'cetak_pdf']);
    
});

