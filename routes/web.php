<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageCrudController;

Route::get('/',[ImageCrudController::class,'index'])->name('all.product');
Route::post('/add',[ImageCrudController::class,'store'])->name('store.product');
Route::get('/edit/{id}',[ImageCrudController::class,'edit'])->name('edit.product');
Route::post('/update/{id}',[ImageCrudController::class,'update'])->name('update.product');
Route::get('/delete/{id}',[ImageCrudController::class,'destroy'])->name('delete.product');