<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Financial Technology</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.header')
    <main class="container mx-auto lg:px-12 px-4 py-5 flex flex-col gap-3">
        @yield('content')
    </main>
    <div class="backdrop hidden bg-slate-900/70 fixed top-0 w-full h-full  z-40">
    </div>
    <script type="module" src="{{ asset('javascript/lib/jquery.min.js') }}"></script>
    <script type="module" src="{{ asset('javascript/script/auth.js') }}"></script>
    <script type="module" src="{{ asset('javascript/script/cart.js') }}"></script>
    <script type="module" src="{{ asset('javascript/script/topup.js')}}"></script>
</body>

</html>