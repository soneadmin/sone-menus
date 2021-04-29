<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->group(function () {
    Route::prefix(config('sone.prefix'))->group(function () {

        Route::get('/menus', function () {
            return view('sone::index');
        })->name('admin.menus');
        Route::get('/users', function () {
            return view('sone::index');
        })->name('admin.users');
        Route::get('/users/roles', function () {
            return view('sone::index');
        })->name('admin.users.roles');
        Route::get('/users/permissions', function () {
            return view('sone::index');
        })->name('admin.users.permissions');
    });
});
