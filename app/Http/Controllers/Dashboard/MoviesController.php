<?php

namespace App\Http\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        eval(\Psy\Sh());

        $movies = Movie::get();

        return view('dashboard.movies')->with(compact('movies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $movie = Movie::where(['slug' => $request->slug])->first();

        return view('movies.show')->with(compact('movie'));
    }
}
