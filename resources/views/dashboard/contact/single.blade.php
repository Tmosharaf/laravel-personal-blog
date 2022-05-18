<x-admin-layout>
    <x-slot name="content">
        @if (session('message'))
            <x-crud-alert message="{{ session('message') }}" status="success" />
        @endif

        <a href="{{ route('contacts.index') }}"
            class="bg-blue-300 px-3 py-2 text-white rounded-md mb-4 inline-block">Back</a>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex flex-col px-3">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-300 inline-block">
                    Name: {{ $contact->name }}
                </h1>
                <h4 class="block my-2">Email: {{ $contact->email }}</h4>
                <h4 class="block my-2">Phone: {{ $contact->phone }}</h4>
                <h4 class="block my-2">subject: {{ $contact->subject }}</h4>
                <p class="block my-2 bg-slate-300">message: {{ $contact->message }}</p>
            </div>


        </div>

        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="mt-6">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure?')"
                class="bg-red-100 text-red-800 text-md  mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900 hover:text-white hover:bg-slate-700">Delete</button>
        </form>
        <a href="{{ route('contacts.markasread', $contact) }}"
            class="bg-green-100 text-green-800 text-md  mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900 hover:text-white hover:bg-slate-700 mt-4 inline-block" >Mark
            As read</a>
    </x-slot>

</x-admin-layout>
