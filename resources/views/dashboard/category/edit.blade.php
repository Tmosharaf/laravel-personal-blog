<x-admin-layout>

    <x-slot name="content">
        <x-link href="{{ route('categories.index') }}" class='text-white inline-block bg-blue-300'>Back </x-link>
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm mx-auto">
            <form method="POST" action="{{ route('categories.update', $category) }}">
                @csrf
                @method("PUT")
                <div class="form-group mb-6">
                    <input name="name" type="text" value="{{ $category->name }}"
                        class="form-control block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Category">
                </div>
                <button type="submit"
                    class="
                w-full
                px-6
                py-2.5
                bg-blue-600
                text-white
                font-medium
                text-xs
                leading-tight
                uppercase
                rounded
                shadow-md
                hover:bg-blue-700 hover:shadow-lg
                focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                active:bg-blue-800 active:shadow-lg
                transition
                duration-150
                ease-in-out">Submit</button>
            </form>


            @error('name')

            <x-crud-alert message="{{ $errors->first('name') }}" status="danger"/>
            @enderror
            @if (session('message'))

            <x-crud-alert message="{{ session('message') }}" status="success"/>
            @endif
        </div>
    </x-slot>

</x-admin-layout>
