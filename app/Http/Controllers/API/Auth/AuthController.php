<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login (Request $request)
    {
        $request->validate([
            'nik' => 'required|integer',
            'nama_lengkap' => 'required|string',
        ]);

        // Logic for handling login would go here
        $user = User::where('nik', '=', $request->nik)
            ->where('nama_lengkap', '=',$request->nama_lengkap)
            ->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        // Assuming successful login, you might want to return a token or user data
        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'nik' => 'required|integer',
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ]);
    }
}
