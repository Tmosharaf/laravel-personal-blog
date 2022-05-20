
<div class="mt-8 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="p-5">
        <h5 class="text-lg font-bold tracking-tight text-gray-900 dark:text-white">Popular Posts</h5>
    </div>
    <div class="p-5 ">
        @foreach ($top_posts as $post)
        <div class="grid grid-cols-2">
            <div class="pic mr-1">
                <a href="{{ route('blogs.single', $post->id) }}">
                    <img class="w-fit h-auto" src="{{ asset('images/blog/'. $post->thumbnail) }}" alt="">
                </a>
            </div>
            <div class="body flex flex-col">
                <h4 class=""><a href="{{ route('blogs.single', $post->id) }}">{{ $post->title }}</a></h4>
                <a href="{{ route('blogs.by.category', $post->category->slug) }}" class="text-sm text-green-300">{{ $post->category->name }}</a>
                <span class="text-gray-300 text-sm font-thin">{{ (!empty($post->created_at)) ? $post->created_at->todatestring() : '' }}</span>

            </div>
        </div>
        <hr class="my-5">
        @endforeach
    </div>
</div>
