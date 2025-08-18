<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAVECIA - Login</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-color: #e5e7eb;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-200 flex items-center justify-center p-4">
    <div class="w-full max-w-6xl flex items-center justify-center">
        <!-- Login Form Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center gap-2 mb-2">
                    <div class="w-8 h-8 bg-blue-600 rounded transform rotate-45 flex items-center justify-center">
                        <div class="w-4 h-4 bg-white rounded-sm transform -rotate-45"></div>
                    </div>
                    <span class="text-xl font-bold text-gray-800">FAVECIA</span>
                </div>
                <p class="text-sm text-gray-500">LOGIN</p>
            </div>

            <!-- Login Form -->
            <form action="{{ route('login-form') }}" method="POST" class="space-y-4">
                @csrf

                <!-- NIK Field -->
                <div>
                    <input
                        type="text"
                        name="nik"
                        placeholder="Masukkan NIK Anda"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        value="{{ old('nik') }}"
                        required
                    >
                    @error('nik')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Name Field -->
                <div>
                    <input
                        type="text"
                        name="nama_lengkap"
                        placeholder="Masukkan Nama lengkap Anda"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        value="{{ old('name') }}"
                        required
                    >
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sign In Button -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200 ease-in-out transform hover:scale-[1.02]"
                >
                    Sign In
                </button>
            </form>

            <!-- Sign Up Link -->
            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">
                    Don't have an account?
                    <a href="" class="text-blue-600 hover:text-blue-700 font-medium">
                        Sign Up
                    </a>
                </p>
            </div>
        </div>

    <!-- Mobile Responsive Adjustments -->
    <style>
        @media (max-width: 1024px) {
            .lg\:block {
                display: none !important;
            }
        }
    </style>
</body>
</html>
