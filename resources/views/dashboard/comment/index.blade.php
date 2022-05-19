<x-admin-layout>
    <x-slot name="content">
        @if (session('message'))
                <x-crud-alert message="{{ session('message') }}" status="success"/>
            @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <td scope="col" class="px-6 py-3">
                            Id
                        </td>
                        <td scope="col" class="px-6 py-3">
                            Name
                        </td>
                        <td scope="col" class="px-6 py-3">
                            Email
                        </td>
                        <td scope="col" class="px-6 py-3">
                            Comment
                        </td>
                        <td scope="col" class="px-6 py-3">
                            Post Title
                        </td>
                        <td scope="col" class="px-6 py-3">
                            Delete
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comments as $comment)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $comment->id }}

                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-normal">
                                {{ $comment->name }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-normal">
                                {{ $comment->email }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ Str::limit($comment->comment, 50) }}

                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap uppercase">
                                <a class="underline text-sky-400" href="{{ route('blogs.single', $comment->post->id) }}">{{ Str::limit($comment->post->title, 50, '...') }}</a>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <form action="{{ route('comment.destroy', $comment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="bg-red-100 text-red-800 text-md  mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900 hover:text-white hover:bg-slate-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <div class="my-8 mx-4">
                {{ $comments->links() }}
            </div>
        </div>

    </x-slot>

</x-admin-layout>
