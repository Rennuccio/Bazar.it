<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;

// route Public
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/dashboard',[PublicController::class,'dashboard'])->name('dashboard');
Route::post('/leng/{lang}',[PublicController::class,'lenguage'])->name('lenguage');

// route Category
Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/edit/{category}',[CategoryController::class,'edit'])->name('category.edit');
Route::put('/category/update/{category}',[CategoryController::class,'update'])->name('category.update');
Route::delete('/category/delete/{category}',[CategoryController::class,'destroy'])->name('category.delete');


// route x articoli
Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::get('/bycategory/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/serached-article',[ArticleController::class,'searchArticles'])->name('article.searcharticle');


// route SubCategory
Route::get('/subcategory',[SubcategoryController::class,'index'])->name('subcategory.index');
Route::get('/subcategory/create',[SubcategoryController::class,'create'])->name('subcategory.create');
Route::post('/subcategory/store',[SubcategoryController::class,'store'])->name('subcategory.store');
Route::get('/subcategory/edit/{subcategory}',[SubcategoryController::class,'edit'])->name('subcategory.edit');
Route::put('/subcategory/update/{subcategory}',[SubcategoryController::class,'update'])->name('subcategory.update');
Route::delete('/subcategory/delete/{subcategory}',[SubcategoryController::class,'destroy'])->name('subcategory.delete');

// route revisor

Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
Route::patch('/article/recontroll/{article}',[RevisorController::class,'newRevisor'])->name('new.revisor');