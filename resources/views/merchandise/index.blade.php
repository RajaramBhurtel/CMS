@php
    $i = 1 ;
@endphp
<x-layout >
    <x-main title="View All ">
        <x-panel>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Merchandise ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Merchandise Code</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Delete</span>
                                        </th>
                                    </tr>
                                    @foreach ($merchandises as $merchandise)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $i }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $merchandise->merchandise_code }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $merchandise->name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="/merchandise/{{ $merchandise->id }}/edit" class="text-blue-500 hover:text-blue-600"> <x-component.icons name="fa-solid fa-pen-to-square" /> Edit</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="POST" action="/merchandise/{{ $merchandise->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-xs text-red-400 hover:text-red-600"><x-component.icons name="fa-solid fa-trash-can" /> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php
                                            $i++
                                        @endphp
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </x-panel>
    </x-main >
</x-layout >
    