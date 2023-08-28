<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $movies = Movie::get();

        return view('movies.index')->with(compact('movies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\View\View
     */
    public function show(Movie $movie)
    {
        return view('movies.show')->with(compact('movie'));
    }
}
