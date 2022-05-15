<x-admin-layout>
    <x-slot name="content">

        <div class="container p-2 mx-auto sm:p-4 text-coolGray-100">
            @if (session('message'))
                <x-crud-alert message="{{ session('message') }}" status="success"/>
            @endif

            <x-link href="{{ route('categories.create') }}" class='text-white inline-block bg-blue-300'>
                New category
            </x-link>
            <h2 class="mb-4 text-2xl font-semibold leading-tight">Invoices</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-xs">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col class="w-24">
                    </colgroup>
                    <thead class="bg-coolGray-700">
                        <tr class="text-center">
                            <th class="p-3"> #</th>
                            <th class="p-3">Category Name</th>
                            <th class="p-3">slug</th>
                            <th class="p-3">edit</th>
                            <th class="p-3 text-right">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)

                        <tr class="border-b border-opacity-20 border-coolGray-700 bg-coolGray-900 text-center">
                            <td class="p-3">{{ $categories->firstItem() + $loop->index }}</td>
                            <td class="p-3">{{ $category->name }}</td>
                            <td class="p-3">{{ $category->slug }}</td>
                            <td class="p-3"><x-link class="bg-green-400" href="{{ route('categories.edit', $category) }}">Edit</x-link></td>
                            <td class="p-3 text-right">
                                <form method="POST" action="{{ route('categories.destroy', $category) }}">
                                    @csrf
                                    @method("DELETE")
                                    <x-button onclick="return confirm('Are you sure?')" class="bg-rose-400 hover:bg-pink-500">Delete</x-button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <p class="bg-red-200 py-2 px-4 text-md text-white">no data to show</p>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </x-slot>

</x-admin-layout>
