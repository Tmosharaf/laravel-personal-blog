<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased ">
    <div class="min-h-screen bg-gray-50">
        @include('home.inc.navbar')
        @yield('hero')
        {{-- @Main Content Section And @Sidebar Area --}}
        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-8 mx-auto flex sm:flex-nowrap flex-wrap">
                <div class="lg:w-3/4 md:w-2/3  rounded-lg overflow-hidden sm:mr-10 p-10  relative">
                    @yield('contents')
                </div>
                <div class="lg:w-1/4 md:w-1/3 flex flex-col md:ml-auto w-full">
                    @include('home.inc.sidebar')

                </div>
            </div>
        </section>
        @include('home.inc.contact')






        @include('home.inc.footer')


    </div>
</body>

</html>
