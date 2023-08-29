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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $movie = new Movie($request->all());
        $movie->save();

        return redirect()
            ->route('movies.show', $movie->id)
            ->with('successful', 'La pelìcula se creó correctamente');
    }
}
