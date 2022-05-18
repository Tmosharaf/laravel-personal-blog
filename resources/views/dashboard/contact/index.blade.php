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
                            Subject
                        </td>
                        <td scope="col" class="px-6 py-3">
                            Message
                        </td>
                        <td scope="col" class="px-6 py-3">
                            View
                        </td>
                        <td scope="col" class="px-6 py-3">
                            Delete
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $contact)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $contact->id }}

                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-normal">
                                {{ $contact->name }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-normal">
                                {{ $contact->email }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $contact->subject }}

                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap uppercase">
                                {{ $contact->message }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <a href="{{ route('contacts.show', $contact) }}"
                                    class="bg-green-100 text-green-800 text-md  mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900 hover:text-white hover:bg-slate-700">
                                    {{ ($contact->is_read == false) ? 'Unread' : 'Read'}}
                                </a>
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <form action="{{ route('contacts.destroy', $contact) }}" method="POST">
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
                {{ $contacts->links() }}
            </div>
        </div>

    </x-slot>

</x-admin-layout>
