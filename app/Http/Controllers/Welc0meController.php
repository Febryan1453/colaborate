<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Welc0meController extends Controller
{

    public function index()
    {
        $title = "List Data Film";
        $i = 1;
        $movies = Movie::all();

        return view('crud.yield.index', compact('movies', 'title', 'i'));

        // return view('crud.index', [
        //     'movies' => $movies,
        //     'i'      => $i,
        // ]);
    }

    public function tambah()
    {
        // $name = "Muhammad Indra Anugrah Kadir";
        // $arrayName = explode(" ", $name);
        // for ($i = 0; $i < count($arrayName); $i++) {
        //     $arrayName[$i] = Str::mask($arrayName[$i], '*', 3);
        // }
        // $name = implode(" ", $arrayName);
        // echo $name;

        $title = "Input Data Film";

        return view('crud.yield.tambah', compact('title'));
    }

    public function save(Request $request)
    {
        // ddd($request);

        $psn = [
            'judul.required'            => 'Judul harus diisi !',
            'judul.unique'              => "Judul film $request->judul sudah ada !",
            'waktu_rilis.required'      => 'Waktu rilis harus diisi !',
            'sinopsis.required'         => 'Sinopsis harus diisi !',
            'gambar.required'           => 'Poster film harus diisi !',
            'harga.required'            => 'Harga tiket harus diisi !',
            'harga.numeric'             => 'Harga harus angka !',
        ];

        $request->validate([
            'judul'                     => 'required|unique:movies',
            'waktu_rilis'               => 'required',
            'sinopsis'                  => 'required',
            'gambar'                    => 'required',
            'harga'                     => 'required|numeric',
        ], $psn);

        // $fileName = '';
        // if ($request->gambar->getClientOriginalName()) {
        //     $file = str_replace(' ', '', $request->gambar->getClientOriginalName());
        //     $fileName = date('mYdHs') . rand(1, 999) . '_' . $file;
        // $request->gambar->storeAs('movie', $fileName); //direktori ada pada folder STORAGE/APP/PUBLIC/PRODUK
        // php artisan storage:link -> untuk bisa akses gambarnya
        // }

        Movie::create([
            'judul'                     => $request->judul,
            'slug'                      => Str::slug($request->judul, '-'),
            'waktu_rilis'               => $request->waktu_rilis,
            'sinopsis'                  => $request->sinopsis,
            'harga'                     => $request->harga,
            // 'gambar'                    => $fileName,
            'gambar'                    => $request->file('gambar')->store('image-movie'),
        ]);

        return redirect()->route('welcome.index');
    }

    public function hapus($id)
    {
        $movie = Movie::findOrFail($id);
        Storage::delete($movie->gambar);
        $movie->delete();
        return redirect()->back();
    }
}
