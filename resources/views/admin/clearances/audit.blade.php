<x-admin-layout>
    
    <div class="mx-20">
        <div class="flex justify-end items-center">
            <div>
                <form action=" {{Route('auditFilter')}} " method="post">
                    @csrf
                    <label for="date_from" class="text-sm font-medium mr-2">Date from</label>
                    <input type="date" name="date_from" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" >  
                    <label for="date_to" class="text-sm font-medium mr-2 ml-4">Date from</label>
                    <input type="date" name="date_to" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" >  
                    <select name="activity" class="text-center items-center px-10 ml-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="activities" id="">
                        <option selected value="all">All Activties</option>
                        <option value="approved">Approved</option>
                        <option value="reject">Rejected</option>
                        <option value="inspected">Inspected</option>
                        <option value="reviewed">Reviewed</option>
                    </select>
                    <button type="submit" class="inline-flex items-center px-4 ml-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Apply</button>
                </form>
            </div>
        </div>

        

        <div class="flex flex-col mt-5">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Business Information
                        </th>
                        <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Reviewed by
                        </th>
                        <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Inpespected by
                        </th>
                        <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Approved by
                        </th>
                        <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Printed by
                        </th>
                        <th scope="col" class="text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Rejected by
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 overflow-ellipsis">
                            <div class="text-sm  w-40 font-medium text-gray-900 overflow-ellipsis">
                                <p class="truncate">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem eius animi, maxime tempora expedita tenetur quidem beatae consequuntur modi quibusdam vel eveniet ducimus hic eligendi, sit dolore laborum ea maiores!
                                 </p>
                             </div>
     
                             <div class="text-sm w-40 text-gray-500 overflow-ellipsis">
                               <p class="truncate">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam, cumque ea animi sint nobis laborum repellat debitis amet ab aliquid tenetur, in perspiciatis ipsam, necessitatibus totam aut quaerat maxime repudiandae.
                                </p>
                             </div>
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                          jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        
                      </tr>
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 overflow-ellipsis">
                            <div class="text-sm  w-40 font-medium text-gray-900 overflow-ellipsis">
                                <p class="truncate">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem eius animi, maxime tempora expedita tenetur quidem beatae consequuntur modi quibusdam vel eveniet ducimus hic eligendi, sit dolore laborum ea maiores!
                                 </p>
                             </div>
     
                             <div class="text-sm w-40 text-gray-500 overflow-ellipsis">
                               <p class="truncate">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam, cumque ea animi sint nobis laborum repellat debitis amet ab aliquid tenetur, in perspiciatis ipsam, necessitatibus totam aut quaerat maxime repudiandae.
                                </p>
                             </div>
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                          jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        
                      </tr>
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 overflow-ellipsis">
                            <div class="text-sm  w-40 font-medium text-gray-900 overflow-ellipsis">
                                <p class="truncate">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem eius animi, maxime tempora expedita tenetur quidem beatae consequuntur modi quibusdam vel eveniet ducimus hic eligendi, sit dolore laborum ea maiores!
                                 </p>
                             </div>
     
                             <div class="text-sm w-40 text-gray-500 overflow-ellipsis">
                               <p class="truncate">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam, cumque ea animi sint nobis laborum repellat debitis amet ab aliquid tenetur, in perspiciatis ipsam, necessitatibus totam aut quaerat maxime repudiandae.
                                </p>
                             </div>
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                          jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        
                      </tr>
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 overflow-ellipsis">
                            <div class="text-sm  w-40 font-medium text-gray-900 overflow-ellipsis">
                                <p class="truncate">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem eius animi, maxime tempora expedita tenetur quidem beatae consequuntur modi quibusdam vel eveniet ducimus hic eligendi, sit dolore laborum ea maiores!
                                 </p>
                             </div>
     
                             <div class="text-sm w-40 text-gray-500 overflow-ellipsis">
                               <p class="truncate">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam, cumque ea animi sint nobis laborum repellat debitis amet ab aliquid tenetur, in perspiciatis ipsam, necessitatibus totam aut quaerat maxime repudiandae.
                                </p>
                             </div>
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                          jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        <td class="text-center truncate w-64 py-4 whitespace-nowrap text-sm text-gray-500">
                            jane.cooper@example.com
                        </td>
                        
                      </tr>
                      
          
                      <!-- More items... -->
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
        </div>
    </div>
</div>
</div>
</x-admin-layout>