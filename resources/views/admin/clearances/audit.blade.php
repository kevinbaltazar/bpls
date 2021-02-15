<x-admin-layout>
    
    <div class="mx-20">
        <div class="flex justify-end items-center">
            <div>
                <label for="date_from" class="text-sm font-medium mr-2">Date from</label>
                <input type="date" name="date_from" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" >  
                <label for="date_from" class="text-sm font-medium mr-2 ml-4">Date from</label>
                <input type="date" name="date_from" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" >  
                <select class="text-center items-center px-10 ml-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="activities" id="">
                    <option value="all_activities">All Activties</option>
                    <option value="approved">Approved</option>
                    <option value="reject">Rejected</option>
                    <option value="inspected">Inspected</option>
                    <option value="reviewed">Reviewed</option>
                </select>
                <button class="inline-flex items-center px-4 ml-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Apply</button>
            </div>
        </div>

        <div class="flex flex-col mt-5">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Activity
                                    </th>

        
                                </tr>
                            </thead>
                            
                            <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="w-10 px-6 py-3 whitespace-nowrap text-sm text-gray-500">
                                           123asdasdasdasdasasdasd
                                        </td>
                                        
                                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500">
                                           12
                                        </td>
                                        <td class="px-6 py-3 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                               name
                                            </div>

                                            <div class="text-sm text-gray-500">
                                                email
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                        <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
                            <div class="hidden sm:block">
                              <p class="text-sm text-gray-700">
                                Showing
                                <span class="font-medium"></span>
                                to
                                <span class="font-medium"></span>
                                of
                                <span class="font-medium"></span>
                                results
                              </p>
                                      </div>
                            <div class="flex-1 flex justify-between sm:justify-end">
                              <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Previous
                              </a>
                              <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
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