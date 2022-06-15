<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MovieController extends Controller
{
    public function index()
    {
        $m = Movie::orderBy('id', 'DESC')->get();

        return response()->json([
            'status'        => 1,
            'message'       => "Berhasil Get Data Movie",
            'data'          => $m,
        ], Response::HTTP_OK);
    }
}
