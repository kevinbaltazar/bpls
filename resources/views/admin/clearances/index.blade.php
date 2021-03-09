<x-admin-layout>
    <div class="mx-20">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    {{-- search --}}
                    <form action="{{route('admin.search')}}" method="get">
                        @csrf
                        
                        <div>
                            <div class="mt-1 mb-5">
                            <input 
                                id="search" 
                                name="search" 
                                type="search" 
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Search..."
                                >
                            </div>
                        </div>
                    </form>
                    
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
                                        Type
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
                                        {{ $clearance->id }}
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
                                        @if ($clearance->clearance_id === NULL)
                                            <span>New</span>
                                        @else
                                            <span>Renew</span>
                                        @endif
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
                        <div class="p-5">
                            {{-- {!! $clearances->render() !!} --}}
                            {{ $clearances->appends(array_filter(request()->except('page')))->render() }}
                        </div>
                        {{-- <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
                            <div class="hidden sm:block">
                              <p class="text-sm text-gray-700">
                                Showing
                                <span class="font-medium">{{($clearances->currentpage()-1)*$clearances->perpage()+1}}</span>
                                to
                                <span class="font-medium">{{$clearances->currentpage()*$clearances->perpage()}}</span>
                                of
                                <span class="font-medium">{{$clearances->total()}}</span>
                                results
                              </p>
                            </div>
                            <div class="flex-1 flex justify-between sm:justify-end">
                              <a href="{{$clearances->previousPageUrl()}}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Previous
                              </a>
                              <a href="{{$clearances->nextPageUrl()}}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Next
                              </a>
                            </div>
                          </nav> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>