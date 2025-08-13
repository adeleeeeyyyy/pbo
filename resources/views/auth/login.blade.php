<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="h-screen flex justify-center items-center bg-amber-100">
    @csrf
<div class="w-[40rem] border-2 rounded px-10 pt-6 pb-8 mb-4 shadow-[5px_5px_0px_0px_rgba(0,0,0)] bg-gray-50">
    <form method="POST" action="{{ route('login-form') }}">
        @csrf
        <div class="mb-4 ">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nik">
                NIK
            </label>
            <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline shadow-[5px_5px_0px_0px_rgba(0,0,0)]"
                id="nik" name="nik" type="text" placeholder="Masukan NIK Anda" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_panjang">
                Nama Panjang
            </label>
            <input
                class=" appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline shadow-[5px_5px_0px_0px_rgba(0,0,0)]"
                id="nama_lengkap" name="nama_lengkap" type="text" placeholder="Masukan Nama Panjang Anda" required>
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded border-2 border-black shadow-[5px_5px_0px_0px_rgba(0,0,0)]  hover:shadow-none hover:translate-y-2 hover:translate-x-2 transition-all duration-300 ease-in-out"
                type="submit">
                Sign In
            </button>
        </div>
    </form>
</div>

</body>
</html>
