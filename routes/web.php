<?php

use App\Http\Controllers\RecetaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', [RecetaController::class, 'landing'])->name('recetas.landing'); 

Route::resource('comentario', ComentarioController::class);

