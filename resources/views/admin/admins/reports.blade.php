<x-admin-layout>
  <div class="flex w-10/12 mx-auto justify-between">
    <div class="w-64 rounded-lg bg-white shadow-md p-5">
      <h1 class="text-blue-600 font-medium text-sm">Filter By:</h1>
      <div>
        <label for="date_to" class="block text-sm font-medium text-gray-700 mt-2">Date from</label>
        <input type="date" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      </div>
      <div>
        <label for="date_to" class="block text-sm font-medium text-gray-700 mt-2">Date to</label>
        <input type="date" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      </div>
      <div> 
        <label for="age_from" class="block text-sm font-medium text-gray-700 mt-2">Age from</label>
        <input type="number" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      </div>
      <div> 
        <label for="age_to" class="block text-sm font-medium text-gray-700 mt-2">Age to</label>
        <input type="number" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      </div>
      <div> 
        <label for="address" class="block text-sm font-medium text-gray-700 mt-2">Address</label>
        <input type="text" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      </div>

     <div class="mt-5 mb-12 w-full">
      <button type="button" class="mb-5 w-full items-center text-center py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Filter Search Result
      </button>
      <button type="button" class="inline-flex  px-12 w-full items-center text-center py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <svg class="-ml-1 mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
        Export as PDF
      </button>
     </div>
    </div>
    

    <div></div>
    <div class="ml-5">
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



  </div>
    
    
    
   
</x-admin-layout>