<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return view('home');
        return view('content.index');
    }

    public function film()
    {
        $title = "List Data Film";
        $i = 1;
        $movies = Movie::all();
        return view('content.data-film', compact('movies', 'title', 'i'));
    }
}
