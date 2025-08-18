<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'FAVECIA')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased w-screen h-screen relative">
    <div class="min-h-screen bg-gray-100">
        @yield('content')
    </div>


    <footer class="fixed bottom-0 w-full">
        <div class="bg-gray-800 text-white py-4">
            <div class="container mx-auto text-center">
                <p>&copy; 2023 FAVECIA. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- Success message auto-hide script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.querySelector('.fixed.top-4.right-4');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.opacity = '0';
                    setTimeout(() => {
                        successMessage.remove();
                    }, 300);
                }, 3000);
            }
        });
    </script>
</body>
</html>
