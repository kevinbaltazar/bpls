<x-admin-layout>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center mb-4">
        <h2 class="text-lg leading-6 font-medium text-gray-900">Viewing of all rejected documents</h2>
        <div>
            <label for="search" class="sr-only">search</label>
            <input type="text" name="search" id="search" class=" justify-betweenshadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-56 sm:text-sm border-gray-300 rounded-md" placeholder="Search anything here...">
        </div>
    </div>
   
    <div class="hidden sm:block">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex flex-col mt-2">
            <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead>
                  <tr>
                    <th class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Control Number
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Business Name
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Business Type
                    </th>
                    <th class="hidden px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider md:block">
                      Mobile Number
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Date
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($clearance as $clearances)
                  <tr class="bg-white">
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                        <span class="text-gray-900 font-medium">{{$clearances->control_number ?? '-- -- --'}}</span>
                    </td>
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                      <span class="text-gray-900 font-medium">{{$clearances->business_name}}</span>
                    </td>
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                      <span class="text-gray-900 font-medium">{{$clearances->business_type}}</span>
                    </td>
                    <td class="hidden px-6 text-center py-4 whitespace-nowrap text-sm text-gray-500 md:block">
                        {{$clearances->mobile_number}}
                    </td>
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                        {{$clearances->created_at->toFormattedDateString()}}
                    </td>
                  </tr>
                  @endforeach

                  <!-- More rows... -->
                  
                </tbody>
              </table>
              
              <!-- Pagination -->
              <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
                    <div class="hidden sm:block">
                      <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">{{($clearance->currentpage()-1)*$clearance->perpage()+1}}</span>
                        to
                        <span class="font-medium">{{$clearance->currentpage()*$clearance->perpage()}}</span>
                        of
                        <span class="font-medium">{{$clearance->total()}}</span>
                        results
                      </p>
					</div>
                    <div class="flex-1 flex justify-between sm:justify-end">
                      <a href="{{$clearance->previousPageUrl()}}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
						Previous
                      </a>
                      <a href="{{$clearance->nextPageUrl()}}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
						Next
                      </a>
                    </div>
                  </nav>
            </div>
          </div>
        </div>
      </div>
</x-admin-layout>