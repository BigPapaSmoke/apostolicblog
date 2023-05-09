<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TagController;

// Home Route

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function(){

    // Dashboard Group
    Route::group(['prefix' => '', 'as' => 'dashboard.'], function(){
        Route::get('/', [DashboardController::class, 'index'])->name('index');

    });

    // Categories Group
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function(){

    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('create', [CategoryController::class, 'create'])->name('create');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('{category:slug}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('{category:slug}', [CategoryController::class, 'update'])->name('update');
    Route::delete('{category:slug}/delete', [CategoryController::class, 'destroy'])->name('delete');

    });


    // Tag Group
    Route::group(['prefix' => 'tags', 'as' => 'tags.'], function(){

        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('create', [TagController::class, 'create'])->name('create');
        Route::post('/', [TagController::class, 'store'])->name('store');
        Route::get('{tag:slug}/edit', [TagController::class, 'edit'])->name('edit');
        Route::put('{tag:slug}', [TagController::class, 'update'])->name('update');
        Route::delete('{tag:slug}/delete', [TagController::class, 'destroy'])->name('delete');

        });



});


