<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        // return response()->json($request);
        $login = Auth::Attempt($request->all());
        if ($login) {
            $user = Auth::user();

            return response()->json([
                'response_code' => 200,
                'message' => 'Login Berhasil',
                'content' => $user
            ]);
        }else{
            return response()->json([
                'response_code' => 404,
                'message' => 'Username atau Password Tidak Ditemukan!'
            ]);
        }
    }
}
