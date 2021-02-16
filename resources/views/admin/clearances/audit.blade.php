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
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>

                                    <th scope="col" class="px-10 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Activity
                                    </th>

        
                                </tr>
                            </thead>
                            
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($audits as $audit)
                                    <tr>
                                        <td class="w-5 px-6 py-3 whitespace-nowrap text-sm text-gray-500">
                                           {{date('d-m-Y', strtotime($audit->created_at))}}
                                        </td>
                                        <td class="px-10 py-3 whitespace-nowrap text-gray-500">
                                            <div class=" whitespace-nowrap text-sm text-black font-medium">
                                                {{$audit->first_name}}
                                            </div>
                                            <div class=" whitespace-nowrap text-sm text-gray-500">
                                                {{$audit->business_name}}
                                            </div>
                                        </td>
                                        <td class="py-3 whitespace-nowrap text-gray-500">
                                            @if ($audit->rejected_by)
                                                <div class="text-sm font-medium">
                                                    <span class="text-black"> Rejected by: </span> {{$audit->rejected_by}} <span class="text-gray-500"> on {{date('d-m-Y', strtotime($audit->rejected_at))}} </span>
                                                </div>
                                            @else
                                                @if ($activity === 'all')
                                                    @if ($audit->reviewed_by)
                                                        <div class="text-sm font-medium">
                                                            <span class="text-black"> Reviewed by: </span>  {{$audit->reviewed_by}} <span class="text-gray-500"> on {{date('d-m-Y', strtotime($audit->requirements_approved_at))}} </span>
                                                        </div>
                                                    @endif
                                                    @if ($audit->inspected_by)
                                                        <div class="text-sm font-medium">
                                                            <span class="text-black"> Inspected by: </span> {{$audit->inspected_by}} <span class="text-gray-500"> on {{date('d-m-Y', strtotime($audit->inspected_at))}} </span>
                                                        </div>
                                                    @endif
                                                    @if ($audit->approved_by)
                                                        <div class="text-sm font-medium">
                                                            <span class="text-black"> Approved by: </span> {{$audit->approved_by}} <span class="text-gray-500"> on {{date('d-m-Y', strtotime($audit->signed_at))}} </span>
                                                        </div>
                                                    @endif
                                                    @if ($audit->printed_by)
                                                        <div class="text-sm font-medium">
                                                            <span class="text-black"> Printed by: </span> {{$audit->printed_by}} <span class="text-gray-500"> on {{date('d-m-Y', strtotime($audit->printed_at))}} </span>
                                                        </div>
                                                    @endif
                                                @endif
                                                @if($activity === 'reviewed') 
                                                    <div class="text-sm font-medium">
                                                        <span class="text-black"> Reviewed by: </span>  {{$audit->reviewed_by}} <span class="text-gray-500"> on {{date('d-m-Y', strtotime($audit->requirements_approved_at))}} </span>
                                                    </div>
                                                @endif
                                                @if($activity === 'approved') 
                                                    <div class="text-sm font-medium">
                                                        <span class="text-black"> Approved by: </span> {{$audit->approved_by}} <span class="text-gray-500"> on {{date('d-m-Y', strtotime($audit->signed_at))}} </span>
                                                    </div>
                                                @endif
                                                @if($activity === 'inspected') 
                                                    <div class="text-sm font-medium">
                                                        <span class="text-black"> Inspected by: </span> {{$audit->inspected_by}} <span class="text-gray-500"> on {{date('d-m-Y', strtotime($audit->inspected_at))}} </span>
                                                    </div>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
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