<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ComentarioController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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





Route::get('/register-profile', function () {
    return view('register-profile');
});

Route::post('/update', [UsuarioController::class, 'updateJetstream'])->name('usuario.updateJetstream');

Route::get('/myProfile/{usuario}',[UsuarioController::class,'myProfile'])->name('usuario.myProfile');

Route::post('/follow', [UsuarioController::class,'follow'])->name('usuario.follow');

Route::post('/unfollow', [UsuarioController::class,'unfollow'])->name('usuario.unfollow');

Route::get('/fav/{id}', [UsuarioController::class,'fav'])->name('usuario.fav');

Route::get('/unfav/{id}', [UsuarioController::class,'unfav'])->name('usuario.unfav');

Route::post('/banreceta', [UsuarioController::class,'banreceta'])->name('usuario.banreceta');

Route::post('/bancomentario', [UsuarioController::class,'bancomentario'])->name('usuario.bancomentario');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('receta', RecetaController::class);

Route::resource('usuario', UsuarioController::class);

Route::get('/', [RecetaController::class, 'landing'])->name('recetas.landing');

Route::get('/search', [RecetaController::class, 'search'])->name('recetas.search');

Route::resource('comentario', ComentarioController::class);

Route::get('/moderador/{usuario}',[UsuarioController::class,'moderador'])->name('usuario.moderador');
Route::get('/add/{usuario}',[UsuarioController::class,'moderadorAdd'])->name('usuario.moderadorAdd');
