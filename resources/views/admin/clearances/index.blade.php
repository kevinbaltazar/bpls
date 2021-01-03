<x-admin-layout>
    <div class="mx-20">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        #
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Business
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Applicant
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>

                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Show</span>
                                    </th>
                                </tr>
                            </thead>
                            
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($clearances as $clearance)
                                    <tr>
                                        <td class="w-8 px-6 py-3 whitespace-nowrap text-sm text-gray-500">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="px-6 py-3 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $clearance->business_name }}
                                            </div>

                                            <div class="text-sm text-gray-500">
                                                {{ $clearance->business_address }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-3 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $clearance->first_name . ' ' . $clearance->last_name }}
                                            </div>

                                            <div class="text-sm text-gray-500">
                                                {{ $clearance->mobile_number }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500">
                                            <x-clearance-status-chip status="{{ $clearance->status }}" />
                                        </td>

                                        <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.clearances.show', $clearance) }}" class="text-indigo-600 hover:text-indigo-900">
                                                Show
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>