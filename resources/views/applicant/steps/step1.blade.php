<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Step</title>


    
    </head>
    <body>
        <div class="lg:border-t lg:border-b lg:border-gray-200">
            <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
              <ol class="rounded-md overflow-hidden lg:flex lg:border-l lg:border-r lg:border-gray-200 lg:rounded-none">
                <li class="relative overflow-hidden lg:flex-1">
                  <div class="border border-gray-200 overflow-hidden border-b-0 rounded-t-md lg:border-0">
                    <!-- Completed Step -->
                    
                        <span class="absolute top-0 left-0 w-1 h-full bg-indigo-600 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                        <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                          <span class="flex-shrink-0">
                            <span class="w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                              <span class="text-indigo-600">01</span>
                            </span>
                          </span>
                          <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                            <span class="text-lg mt-1 font-semibold text-indigo-600 uppercase tracking-wide">Information</span>
                          </span>
                        </span>
                      
          
                <li class="relative overflow-hidden lg:flex-1">
                  <div class="border border-gray-200 overflow-hidden lg:border-0">
                    <!-- Current Step -->
                    <span class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-gray-200 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                      <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                        <span class="flex-shrink-0">
                          <span class="w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">
                            <span class="text-gray-500">02</span>
                          </span>
                        </span>
                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                          <span class="text-lg mt-1 font-semibold text-gray-500 uppercase tracking-wide">Requirements</span>
                        </span>
                      </span>
                    
          
                    <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                      <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                        <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
                      </svg>
                    </div>
                  </div>
                </li>
          
                <li class="relative overflow-hidden lg:flex-1">
                  <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                    <!-- Upcoming Step -->
                 
                      <span class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-gray-200 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                      <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                        <span class="flex-shrink-0">
                          <span class="w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">
                            <span class="text-gray-500">03</span>
                          </span>
                        </span>
                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                          <span class="text-lg mt-1 font-semibold text-gray-500 uppercase tracking-wide">Summary</span>
                        </span>
                      </span>
                    
          
                    <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                      <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                        <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
                      </svg>
                    </div>
                  </div>
                </li>
              </ol>
            </nav>
        </div>

        <div class="px-4 md:px-16 lg:px-20 mt-12">
            <form class="space-y-8" method="POST" action="#">
              @csrf
                <div class="space-y-8">
                   
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Business Information
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            This information will be in your business application.
                        </p>
                    </div>
    
                    <div class="pt-3">
                        <div class="mt-1 grid grid-cols-1 gap-y-4 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-2">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">
                                    First Name
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="first_name" id="first_name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                
                        <div class="sm:col-span-2">
                            <label for="middle_name" class="block text-sm font-medium text-gray-700">
                                Middle Name
                            </label>
                            <div class="mt-1">
                                <input type="text" name="middle_name" id="middle_name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                
                        <div class="sm:col-span-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">
                                Last Name
                            </label>
                            <div class="mt-1">
                                <input type="text" name="zip" id="zip" autocomplete="postal-code" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="personal_address" class="block text-sm font-medium text-gray-700">
                                Personal Address
                            </label>
                            <div class="mt-1">
                                <input type="text" name="personal_address" id="personal_address" autocomplete="street-address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="business_name" class="block text-sm font-medium text-gray-700">
                               Business Name
                            </label>
                            <div class="mt-1">
                                <input type="text" name="business_name" id="business_name" autocomplete="street-address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="business_address" class="block text-sm font-medium text-gray-700">
                              Business Address
                            </label>
                            <div class="mt-1">
                                <input type="text" name="business_address" id="business_address" autocomplete="street-address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="birthdate" class="block text-sm font-medium text-gray-700">
                               Birthdate
                            </label>
                            <div class="mt-1">
                                <input type="date" name="birthdate" id="birthdate" autocomplete="street-address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="birthplace" class="block text-sm font-medium text-gray-700">
                              Birthplace
                            </label>
                            <div class="mt-1">
                                <input type="text" name="birthplace" id="birthplace" autocomplete="street-address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="birthdate" class="block text-sm font-medium text-gray-700">
                               Business Mobile Number
                            </label>
                            <div class="mt-1">
                                <input type="text" name="birthdate" id="birthdate" autocomplete="street-address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="birthplace" class="block text-sm font-medium text-gray-700">
                              Business Telephone Number(Optional)
                            </label>
                            <div class="mt-1">
                                <input type="text" name="birthplace" id="birthplace" autocomplete="street-address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 w-9/12">
                    <h2 class="font-semibold text-sm">Please select the following type of business:</h2>
                    <button type="button" class="bg-blue-100 text-sky-blue w-48 focus:outline-none h-8 text-xs rounded  font-normal mt-2">Accomodation and Lodging</button>
                    <button type="button" class="bg-blue-100 text-sky-blue w-32 focus:outline-none h-8 text-xs rounded font-normal mt-2">Manufacture</button>
                    <button type="button" class="bg-blue-100 text-sky-blue w-24 focus:outline-none h-8 text-xs rounded font-normal mt-2">Agriculture</button>
                    <button type="button" class="bg-blue-100 text-sky-blue w-48 focus:outline-none h-8 text-xs rounded font-normal mt-2">Food and Beverage</button>
                    <button type="button" class="bg-blue-100 text-sky-blue w-32 focus:outline-none h-8 text-xs rounded font-normal mt-2">Healthcare</button>
                    <button type="button" class="bg-blue-100 text-sky-blue w-24 focus:outline-none h-8 text-xs rounded font-normal mt-2">Services</button>
                    <button type="button" class="bg-blue-100 text-sky-blue w-24 focus:outline-none h-8 text-xs rounded font-normal mt-2">Real State</button>
                    <button type="button" class="bg-blue-100 text-sky-blue w-24 focus:outline-none h-8 text-xs rounded font-normal mt-2">Retail</button>
                    <button type="button" class="bg-blue-100 text-sky-blue w-24 focus:outline-none h-8 text-xs rounded font-normal mt-2">Others</button>
                </div>





                <div class="pt-5">
                    <div class="flex justify-end">
                        <a href="#"><button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button></a>
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Next
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </body>
</html>
