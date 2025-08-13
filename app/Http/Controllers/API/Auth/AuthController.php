<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nik' => ['required', 'string'],
            'nama_lengkap' => ['required', 'string'],
        ]);

        $user = User::where('nik', $credentials['nik'])
                    ->where('nama_lengkap', $credentials['nama_lengkap'])
                    ->first();

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'nik' => 'NIK atau nama lengkap salah.',
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
