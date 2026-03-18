<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if(auth()->check() && session('api_token'))
        <meta name="api-token" content="{{ session('api_token') }}">
        @endif
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <title>Laravel App</title>
</head>
<body>

    <main class="container ">
        <div class="d-flex justify-content-center align-items-center mt-5">
            <div class="p-4 border bg-light border-primary rounded p-2" style="width: 60%;">
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="p-3 bg-light text-center">
        &copy; Laravel  Exam
    </footer>

    @yield('scripts')
</body>
</html>