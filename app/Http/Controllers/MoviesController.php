<?php

namespace App\Http\Controllers;

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
        $movies = Movie::get();

        eval(\Psy\Sh());

        return view('movies.index')->with(compact('movies'));
    }
}
