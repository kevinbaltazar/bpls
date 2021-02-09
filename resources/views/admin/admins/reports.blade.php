<x-admin-layout>
    <div class="max-w-7xl mx-20  flex justify-between items-center mb-4">
        <h2 class="text-lg leading-6 font-medium text-gray-900">Reports</h2>
        <form action="{{route('filter')}}" method="get">
          @csrf
        <div class="flex">
          <div class="mr-3">
            <label class="sr-only">Date</label>
            <input type="date" name="date_from" id="date_from" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
        </div>
            <div class="mr-3" >
                <label class="sr-only">Date</label>
                <input type="date" name="date_to" id="date_to" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mr-3">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                   Filter
                </button>
            </div>
            <div>
        </form>
                <a href="{{route('exportPDF')}}" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <!-- Heroicon name: mail -->
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Export
                </a>
            </div>
            
        </div>
    </div>
    {{-- amount --}}
    
    
    <div class="mx-20">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                     
                      <tr>
                        <th scope="col" class="px-8 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Control Number
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Sticker Number
                          </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Business Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Owner's Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Cost
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                          </th>
                      </tr>
                      
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach ($reports as $report)
                      <tr>
                        <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                          {{$report->control_number}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                          {{$report->sticker_number}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                          {{$report->business_name}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                          {{$report->first_name .' '. $report->last_name}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                          @if (!$report->clearance_id)
                              New    
                          @else
                              Renew
                          @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                           {{$report->amount}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                          {{$report->created_at}}
                         </td>
                        
                      </tr>
                      @endforeach
                      <!-- More items... -->
                    </tbody>
                  </table>
                  <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
                    <div class="hidden sm:block">
                      <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">{{($reports->currentpage()-1)*$reports->perpage()+1}}</span>
                        to
                        <span class="font-medium">{{$reports->currentpage()*$reports->perpage()}}</span>
                        of
                        <span class="font-medium">{{$reports->total()}}</span>
                        results
                      </p>
					          </div>
                    <div class="flex-1 flex justify-between sm:justify-end">
                      <a href="{{$reports->previousPageUrl()}}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
					            	Previous
                      </a>
                      <a href="{{$reports->nextPageUrl()}}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
						            Next
                      </a>
                    </div>
                  </nav>
                </div>
              </div>
            </div>
          </div>
    
    </div>
</x-admin-layout>