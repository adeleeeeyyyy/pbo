<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Perjalanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerjalananController extends Controller
{
    public function index ()
    {
        return view('Home');
    }
    public function send( Request $request )
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i:s',
            'lokasi' => 'required|string|max:255',
            'suhu_tubuh' => 'required|numeric|min:30|max:45',
        ]);
        $user = Auth::user();
        $perjalanan = Perjalanan::create([
            'nama' => $user->nama_lengkap,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'suhu_tubuh' => $request->suhu_tubuh,
        ]);

        return response()->json([
            'message' => 'Perjalanan sent successfully',
            'perjalanan' => $perjalanan,
        ]);
    }
}
