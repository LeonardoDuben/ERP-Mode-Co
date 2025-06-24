<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
//use App\Http\Controllers\Controller;

Route::get('/', [SiteController::class, 'principal'])->name('site.principal');
Route::get('/cadastro', [SiteController::class, 'showCadastro']);#->name('site.principal');
Route::post('/cadastro',[SiteController::class, 'cadastro'])->name('site.cadastro');
Route::get('/produtos', [SiteController::class, 'listar'])->name('site.produtos');

Route::post('/carrinho/adicionar', [SiteController::class, 'adicionarCarrinho'])->name('site.carrinho_adicionar');
Route::get('/carrinho', [SiteController::class, 'mostrarCarrinho'])->name('site.carrinho');

Route::get('/login', [SiteController::class, 'showLogin'])->name('site.login');
Route::post('/login', [SiteController::class, 'login'])->name('site.login.submit');
Route::post('/logout', [SiteController::class, 'logout'])->name('site.logout');

Route::get('/registrar', [SiteController::class, 'showRegistrar'])->name('site.registrar');
Route::post('/registrar', [SiteController::class, 'registrar'])->name('site.registrar.submit');

Route::get('/finalizar', [SiteController::class, 'finalizarCompra'])->name('site.finalizar');
Route::post('/finalizar', [SiteController::class, 'processarFinalizacao'])->name('site.finalizar.submit');

Route::get('/finalizarCompra', [SiteController::class, 'finalizarCompraView'])->name('site.finalizarCompra');