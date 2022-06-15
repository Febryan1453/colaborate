<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    // Untuk Login
    public function register(Request $req)
    {
        $user = User::create(array_merge($req->all(), [
            'password'          => Hash::make($req->password)
        ]));

        if ($user) {
            return response()->json([
                'status'        => 1,
                'message'       => "$req->name, Berhasil Mendaftar",
                'data'          => $user,
            ], Response::HTTP_OK);
        }
    }

    // Nama : Febryan
}
