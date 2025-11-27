<?php

use App\Http\Controllers\ProductsController;

Route::get('/produtos', [ProductsController::class, 'index']);
Route::get('/produtos', [ProductsController::class, 'index'])->name('produtos.index');
Route::get('/produtos/create', [ProductsController::class, 'create'])->name('produtos.create');
Route::post('/produtos', [ProductsController::class, 'store'])->name('produtos.store');
Route::get('/produtos/{id}/edit', [ProductsController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{id}', [ProductsController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/{id}', [ProductsController::class, 'destroy'])->name('produtos.destroy');
Route::get('/carrinho', [ProductsController::class, 'carrinho'])->name('carrinho.index');
Route::get('/carrinho/adicionar/{id}', [ProductsController::class, 'addCarrinho'])->name('carrinho.adicionar');
Route::get('/carrinho/remover/{id}', [ProductsController::class, 'removerCarrinho'])->name('carrinho.remover');
