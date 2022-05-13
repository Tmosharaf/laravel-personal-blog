<x-admin-layout>
    <x-slot name="content">
        {{-- Post Index Contents --}}
        <div class="">
            <x-link href="{{ route('post.create') }}" class="inline-block mb-4 bg-blue-300">Create New Post</x-link>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <td scope="col" class="px-6 py-3">
                            Id
                        </td>
                        <td scope="col" class="px-6 py-3">
                           Title
                        </td>
                        <td scope="col" class="px-6 py-3">
                            Description
                        </td>
                        <td scope="col" class="px-6 py-3">
                            Thumbnail
                        </td>
                        <td scope="col" class="px-6 py-3">
                            Is Featured
                        </td>
                        <td scope="col" class="px-6 py-3">
                            Category
                        </td>
                        <td scope="col" class="px-6 py-3">

                            Edit
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $post->id }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-normal">
                            {{ $post->title }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-normal">
                            {{ Str::limit($post->description, 80, '...') }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">

                            <img src="{{ $post->thumbnail }}" class="w-36" alt="">
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            @if ($post->is_featured)
                            <span class="bg-yellow-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Featured</span>
                            @endif

                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap uppercase">
                            {{ $post->category->name}}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <a href="{{ route('post.edit', $post) }}"  class="bg-green-100 text-green-800 text-md  mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900 hover:text-white hover:bg-slate-700">Edit</a>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>

    </x-slot>

</x-admin-layout>
