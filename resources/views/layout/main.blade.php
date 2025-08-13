<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catatan Dinas</title>
    @vite('resources/css/app.css')
</head>
<body class="p-10 w-screen flex flex-col justify-center">
    <nav class="flex items-center gap-10">
        <img src="{{ asset('images/tes.jpg') }}" alt="" class="w-40 border-2 rounded-lg">
        <div class="flex flex-col gap-5">
            <h1 class="font-bold text-8xl">Peduli Diri</h1>
            <h2 class="font-semibold text-4xl">Catatan Perjalanan</h2>
            <ul class="flex">
                <a href="" class="border-r-2 px-2"><li>Home </li></a>
                <a href="" class="border-r-2 px-2 mr-2"><li>Catatan Perjalanan </li></a>
                <a href=""><li>Isi Data </li></a>
            </ul>
        </div>
    </nav>

    <div class="mt-10">
        @yield('content')
    </div>

    <div class="a">
        <a href="/isi-data" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-[5px_5px_0px_0px_rgba(0,0,0)] hover:shadow-none hover:translate-y-2 hover:translate-x-2 transition-all duration-300 ease-in-out">Isi Catatan Perjalanan</a>
    </div>
</body>
</html>
