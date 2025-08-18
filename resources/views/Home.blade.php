@extends('layout.main')

@section('title', 'Dashboard - FAVECIA')

@section('content')
<div class="min-h-screen bg-gray-100">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                        <div class="w-4 h-4 border-2 border-white transform rotate-45"></div>
                    </div>
                    <span class="text-xl font-bold text-gray-900">FAVECIA</span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-sm border mb-8">
            <div class="p-8">
                <div class="text-center">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang di FAVECIA</h1>
                    <p class="text-lg text-gray-600">Sistem monitoring perjalanan untuk kesehatan dan keamanan Anda</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Travel Information Table -->
            <div class="bg-white rounded-lg shadow-sm border">
                <div class="px-6 py-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-900">Informasi Perjalanan</h2>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Tanggal</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Waktu</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Lokasi</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-900">Suhu Tubuh</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($travelData as $travel)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $travel->tanggal }}</td>
                                    <td class="py-3 px-4">{{ $travel->jam }}</td>
                                    <td class="py-3 px-4">{{ $travel->lokasi }}</td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 rounded-full text-xs font-medium
                                            @if($travel->suhu_tubuh > 37.5)
                                                bg-red-100 text-red-800
                                            @else
                                                bg-green-100 text-green-800
                                            @endif">
                                            {{ $travel->suhu_tubuh }}°C
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="py-8 px-4 text-center text-gray-500">
                                        Belum ada data perjalanan
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Data Input Form -->
            <div class="bg-white rounded-lg shadow-sm border">
                <div class="px-6 py-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-900">Input Data Perjalanan</h2>
                </div>
                <div class="p-6">
                    <form action="{{ route('travel.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div class="space-y-2">
                            <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input
                                type="date"
                                id="date"
                                name="tanggal"
                                value="{{ old('tanggal') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('date') border-red-500 @enderror"
                                required
                            >
                            @error('tanggal')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="time" class="block text-sm font-medium text-gray-700">Waktu</label>
                            <input
                                type="time"
                                id="time"
                                name="jam"
                                value="{{ old('jam') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('time') border-red-500 @enderror"
                                required
                            >
                            @error('jam')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
                            <input
                                type="text"
                                id="location"
                                name="lokasi"
                                placeholder="Masukkan lokasi"
                                value="{{ old('lokasi') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('location') border-red-500 @enderror"
                                required
                            >
                            @error('lokasi')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="temperature" class="block text-sm font-medium text-gray-700">Suhu Tubuh (°C)</label>
                            <input
                                type="number"
                                step="0.1"
                                id="temperature"
                                name="suhu_tubuh"
                                placeholder="36.5"
                                value="{{ old('suhu_tubuh') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('temperature') border-red-500 @enderror"
                                required
                            >
                            @error('suhu_tubuh')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button
                            type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200"
                        >
                            Simpan Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
        {{ session('success') }}
    </div>
@endif
@endsection
