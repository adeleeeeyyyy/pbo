<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Perjalanan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PerjalananController extends Controller
{
    public function index ()
    {
        $travelData = Perjalanan::orderBy('tanggal', 'desc')
                           ->orderBy('jam', 'desc')
                           ->get();
        return view('Home', compact('travelData'));
    }
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required',
            'lokasi' => 'required|string|max:255',
            'suhu_tubuh' => 'required|numeric|min:30|max:45',
        ], [
            'tanggal.required' => 'Tanggal harus diisi',
            'tanggal.date' => 'Format tanggal tidak valid',
            'jam.required' => 'Waktu harus diisi',
            'lokasi.required' => 'Lokasi harus diisi',
            'lokasi.max' => 'Lokasi maksimal 255 karakter',
            'suhu_tubuh.required' => 'Suhu tubuh harus diisi',
            'suhu_tubuh.numeric' => 'Suhu tubuh harus berupa angka',
            'suhu_tubuh.min' => 'Suhu tubuh minimal 30°C',
            'suhu_tubuh.max' => 'Suhu tubuh maksimal 45°C',
        ]);

        Perjalanan::create($validated);

        return redirect()->route('home')
                        ->with('success', 'Data perjalanan berhasil disimpan!');
    }
}
