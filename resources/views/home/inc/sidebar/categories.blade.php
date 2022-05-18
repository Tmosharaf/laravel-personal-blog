<div class="mt-8 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="p-5">
        <h5 class="text-lg font-bold tracking-tight text-gray-900 dark:text-white">Categories</h5>
    </div>
    <hr>
    <div class="p-5 grid grid-cols-2 gap-x-2 gap-y-3">
        @forelse ($categories as $category)

        <a href="#" class="">{{ $category->name }} ({{ $category->post->count() }})</a>
        @empty

        @endforelse
    </div>
</div>
