<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
//use App\Http\Controllers\Controller;

Route::get('/cadastro', [SiteController::class, 'showCadastro']);#->name('site.principal');
Route::post('/cadastro',[SiteController::class, 'cadastro'])->name('site.cadastro');
