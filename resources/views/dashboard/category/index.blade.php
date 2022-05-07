<x-admin-layout>

    <x-slot name="content">
        <div class="container p-2 mx-auto sm:p-4 text-coolGray-100">
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
                        <tr class="text-left">
                            <th class="p-3"> #</th>
                            <th class="p-3">Category Name</th>
                            <th class="p-3">slug</th>
                            <th class="p-3">edit</th>
                            <th class="p-3 text-right">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-opacity-20 border-coolGray-700 bg-coolGray-900">
                            <td class="p-3">
                                <p>97412378923</p>
                            </td>
                            <td class="p-3">
                                <p>Microsoft Corporation</p>
                            </td>
                            <td class="p-3">
                                <p>14 Jan 2022</p>
                                <p class="text-coolGray-400">Friday</p>
                            </td>
                            <td class="p-3">
                                <p>01 Feb 2022</p>
                                <p class="text-coolGray-400">Tuesday</p>
                            </td>
                            <td class="p-3 text-right">
                                <span class="px-3 py-1 font-semibold rounded-md bg-violet-400 text-coolGray-900">
                                    <span>Pending</span>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>

</x-admin-layout>
