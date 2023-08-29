<?php

use App\Http\Controllers\Dashboard\MoviesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/movies', function () {
    return view('dashboard.movies');
});