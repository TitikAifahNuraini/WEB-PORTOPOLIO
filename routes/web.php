<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FronendController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Pendidikancontroller;
use App\Http\Controllers\Pengalamancontroller;
use App\Http\Controllers\Profilcontroller;
use App\Models\profil;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FronendController::class, 'index'])->name('fronend.main');


Auth::routes();

Route::group(['middleware' => 'auth'], function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    
     //biodata
    Route::get('/Biodata', [BiodataController::class, 'index'])->name('biodata.index');
    Route::get('/Biodata/create', [BiodataController::class, 'create'])->name('biodata.create');
    Route::get('/Biodata/{id}/show', [BiodataController::class, 'show'])->name('biodata.show');
    Route::get('/Biodata/{id}/edit', [BiodataController::class, 'edit'])->name('biodata.edit');
    Route::patch('/Biodata/{id}', [BiodataController::class, 'update'])->name('biodata.update');
    Route::post('/Biodata/store', [BiodataController::class, 'store'])->name('biodata.store');
    Route::delete('/Biodata/destroy/{id}', [BiodataController::class, 'destroy'])->name('biodata.destroy');

    // routing gambar
Route::get('gambar/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path('app/gambar/' . $folder . '/' . $filename);

    if (!file_exists($path)) {
        abort(500);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file)->header('Content-Type', $type);
})->name('show-gambar');

  

    //Education
    Route::get('/Education', [EducationController::class, 'index'])->name('pendidikan.index');
    Route::get('/Education/create', [EducationController::class, 'create'])->name('pendidikan.create');
    Route::get('/Education/{id}/show', [EducationController::class, 'show'])->name('pendidikan.show');
    Route::get('/Education/{id}/edit', [EducationController::class, 'edit'])->name('pendidikan.edit');
    Route::patch('/Education/{id}', [EducationController::class, 'update'])->name('pendidikan.update');
    Route::post('/Education/store', [EducationController::class, 'store'])->name('pendidikan.store');
    Route::delete('/Education/destroy/{id}', [EducationController::class, 'destroy'])->name('pendidikan.destroy');

    //Pengalaman
    Route::get('/Experience', [ExperienceController::class, 'index'])->name('experience.index');
    Route::get('/Experience/create', [ExperienceController::class, 'create'])->name('experience.create');
    Route::get('/Experience/{id}/show', [ExperienceController::class, 'show'])->name('experience.show');
    Route::get('/Experience/{id}/edit', [ExperienceController::class, 'edit'])->name('experience.edit');
    Route::patch('/Experience/{id}', [ExperienceController::class, 'update'])->name('experience.update');
    Route::post('/Experience/store', [ExperienceController::class, 'store'])->name('experience.store');
    Route::delete('/Experience/destroy/{id}', [ExperienceController::class, 'destroy'])->name('experience.destroy');

    //kontaks
    Route::get('/Kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::get('/Kontak/create', [KontakController::class, 'create'])->name('kontak.create');
    Route::get('/Kontak/{id}/show', [KontakController::class, 'show'])->name('kontak.show');
    Route::get('/Kontak/{id}/edit', [KontakController::class, 'edit'])->name('kontak.edit');
    Route::patch('/Kontak/{id}', [KontakController::class, 'update'])->name('kontak.update');
    Route::post('/Kontak/store', [KontakController::class, 'store'])->name('kontak.store');
    Route::delete('/Kontak/destroy/{id}', [KontakController::class, 'destroy'])->name('kontak.destroy');
});




