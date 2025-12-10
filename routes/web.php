<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home.index');
})->name('home');

Route::get('/portfolio', function () {
    return view('Portfolio.portfolio');
})->name('portfolio');


Route::get('/about', function () {
    return view('About.about');
})->name('about');


Route::get('/services', function () {
    return view('Services.services');
})->name('services');