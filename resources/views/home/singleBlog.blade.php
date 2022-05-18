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
                        <div class="flex flex-wrap flex-col -m-12">

                            <div class="p-12 w-4/5 m-auto flex flex-col items-start">
                                <img src="{{ File::exists(public_path('images/blog/' . $post->thumbnail))
                                    ? asset('images/blog/' . $post->thumbnail)
                                    : $post->thumbnail }}"
                                    alt="">
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
                                <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">
                                    {{ $post->title }}</h2>
                                <p class="leading-relaxed mb-8">{{ $post->description }}</p>
                            </div>
                        </div>
                        {{-- Comment --}}
                        <div class="w-4/6 m-auto">

                            @foreach ($post->comments as $comment)
                            <div class="border-2 mb-2">
                                <h2 class="text-lg text-green-400">{{ $comment->name }}</h2>
                                <span>{{ $comment->email }}</span>
                                <p>{{ $comment->comment }}</p>
                            </div>
                            @endforeach

                            @if (session('message'))
                                <x-crud-alert message="{{ session('message') }}" status="success" />
                            @endif
                            @if ($errors->any())

                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <x-crud-alert message="{{ $error }}" status="danger" />
                                    @endforeach
                                </ul>
                            @endif

                            <form action="{{ route('comment.store') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div>

                                        <input class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Name"
                                            type="text" name="name" />
                                    </div>

                                    <div>

                                        <input class="w-full p-3 text-sm border-gray-200 rounded-lg"
                                            placeholder="info@email.com" type="email" name="email" />
                                    </div>
                                </div>
                                <div>
                                    <textarea class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Message" rows="8"
                                        name="comment"></textarea>
                                </div>

                                <div class="mt-4">
                                    <button type="submit"
                                        class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto">
                                        <span class="font-medium"> Send</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        @include('home.inc.footer')
    </div>
</body>

</html>
