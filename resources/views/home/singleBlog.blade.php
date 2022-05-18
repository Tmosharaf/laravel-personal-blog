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

        {{-- @Main Content Section And @Sidebar Area --}}
        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-8 mx-auto  sm:flex-nowrap flex-wrap">










                <section class="text-gray-600 bg-white mt-4 rounded-sm shadow body-font overflow-hidden">
                    <div class="container px-5 pt-24 pb-6 mx-auto">
                        <div class="flex flex-wrap -m-12">

                            <div class="p-12 w-4/5 m-auto flex flex-col items-start">
                                <img src="{{ File::exists(public_path('images/blog/' . $post->thumbnail))
                                ? asset('images/blog/' . $post->thumbnail)
                                : $post->thumbnail }}" alt="">
                                <span
                                class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">{{ $post->category->name }}</span>
                                <a class="inline-flex items-center my-4">
                                    <img alt="blog" src="https://dummyimage.com/103x103"
                                        class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                                    <span class="flex-grow flex flex-col pl-4">
                                        <span class="title-font font-medium text-gray-900">Alper Kamu</span>
                                        <span class="text-gray-400 text-xs tracking-widest mt-0.5">DESIGNER</span>
                                    </span>
                                </a>
                                <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{ $post->title }}</h2>
                                <p class="leading-relaxed mb-8">{{ $post->description }}</p>

                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </section>


        @include('home.inc.footer')


    </div>
</body>

</html>
