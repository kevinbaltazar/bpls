

@extends('applicant.application')
@section('application')
<div class="lg:border-t lg:border-b lg:border-gray-200">
  <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
    <ol class="rounded-md overflow-hidden lg:flex lg:border-l lg:border-r lg:border-gray-200 lg:rounded-none">
      <li class="relative overflow-hidden lg:flex-1">
        <div class="border border-gray-200 overflow-hidden border-b-0 rounded-t-md lg:border-0">
            <!-- Completed Step -->

            {{-- <a href="#" class="group">
                <span class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-gray-200 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                <span class="px-6 py-5 flex items-start text-sm font-medium">
                  <span class="flex-shrink-0">
                    <span class="w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full">
                      <!-- Heroicon name: check -->
                      <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </span>
                  <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                    <span class="text-lg mt-1 font-semibold uppercase tracking-wide">Information</span>
                  </span>
                </span>
              </a>
               --}}
            <a href="#" aria-current="step">
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
            </a>
              
        </div>
      </li>
      
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
                  <span class="text-lg mt-1 font-semibold text-gray-500 uppercase tracking-wide">requirement</span>
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

          {{-- forms --}}
          <div class="pt-3">
              <div class="mt-1 grid grid-cols-1 gap-y-4 gap-x-4 sm:grid-cols-6">
                  
                <div class="sm:col-span-2">
                      <label for="first_name" class="block text-sm font-medium text-gray-700">
                          First Name
                      </label>
                      <div class="mt-1">
                        <input type="text" name="first_name" value="{{$first['first_name'] ?? old('first_name')}}" id="first_name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md {{($errors->first('first_name') ? " border-red-600" : "")}}" placeholder="Juan">
                      </div>
                      <span class="flex text-red-600 items-center {{($errors->first('business_type') ? "block" : "hidden")}}">
                        <svg class="w-4 h-4 mr-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-sm">This field is required.</span>
                      </span>
                </div>
      
                <div class="sm:col-span-2">
                    <label for="middle_name" class="block text-sm font-medium text-gray-700">
                        Middle Name
                    </label>
                    <div class="mt-1">
<<<<<<< HEAD
                        <input type="text" name="middle_name" value="{{$first['middle_name'] ?? ''}}" id="middle_name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Samson">
=======
                        <input type="text" name="middle_name" value="{{$first['middle_name'] ?? ''}}" id="middle_name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Dela Cruz">
>>>>>>> f55981b7249c514177a0e35b66c95de45ecc28ec
                    </div>
                    
                </div>
      
                <div class="sm:col-span-2">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">
                        Last Name
                    </label>
                    <div class="mt-1">
<<<<<<< HEAD
                        <input type="text" name="last_name" value="{{$first['last_name'] ?? old('last_name')}}" id="last_name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md {{($errors->first('last_name') ? " border-red-600" : "")}}" placeholder="Dela Cruz">
=======
                        <input type="text" name="last_name" value="{{$first['last_name'] ?? old('last_name')}}" id="last_name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md {{($errors->first('last_name') ? " border-red-600" : "")}}" placeholder="Dimaano">
>>>>>>> f55981b7249c514177a0e35b66c95de45ecc28ec
                    </div>
                    <span class="pt-1 flex text-red-600 items-center  {{($errors->first('last_name') ? "block" : "hidden")}}">
                      <svg class="w-4 h-4 mr-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <span class="text-sm">This field is required.</span>
                    </span>
                </div>

                <div class="sm:col-span-6">
                    <label for="personal_address" class="block text-sm font-medium text-gray-700">
                        Personal Address
                    </label>
                    <div class="mt-1">
                        <input type="text" name="personal_address" value="{{$first['personal_address'] ?? ''}}" id="personal_address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md {{($errors->first('personal_address') ? " border-red-600" : "")}}" placeholder="Km 39, Pulong Buhangin, Santa Maria, Bulacan">
                    </div>
                    <span class="pt-1 flex text-red-600 items-center  {{($errors->first('personal_address') ? "block" : "hidden")}}">
                      <svg class="w-4 h-4 mr-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <span class="text-sm">This field is required.</span>
                    </span>
                </div>

                <div class="sm:col-span-3">
                    <label for="business_name" class="block text-sm font-medium text-gray-700">
                      Business Name
                    </label>
                    <div class="mt-1">
                        <input type="text" name="business_name" value="{{$first['business_name'] ?? ''}}" id="business_name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md {{($errors->first('business_name') ? " border-red-600" : "")}}" placeholder="Juan Dela Cruz Dimaano Motor Shop">
                    </div>
                    <span class="pt-1 flex text-red-600 items-center  {{($errors->first('business_name') ? "block" : "hidden")}}">
                      <svg class="w-4 h-4 mr-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <span class="text-sm">This field is required.</span>
                    </span>
                </div>

                <div class="sm:col-span-3">
                    <label for="business_address" class="block text-sm font-medium text-gray-700">
                      Business Address
                    </label>
                    <div class="mt-1">
                        <input type="text" name="business_address" value="{{$first['business_address'] ?? ''}}" id="business_address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md {{($errors->first('business_address') ? " border-red-600" : "")}}" placeholder="Km 39, Pulong Buhangin, Santa Maria, Bulacan">
                    </div>
                    <span class="pt-1 flex text-red-600 items-center  {{($errors->first('business_address') ? "block" : "hidden")}}">
                      <svg class="w-4 h-4 mr-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <span class="text-sm">This field is required.</span>
                    </span>
                </div>

                <div class="sm:col-span-1">
                    <label for="birthdate" class="block text-sm font-medium text-gray-700">
                      Birthdate
                    </label>
                    <div class="mt-1">
                        <input type="date" name="birthdate" value="{{$first['birthdate'] ?? ''}}" id="birthdate" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md {{($errors->first('birthdate') ? " border-red-600" : "")}}">
                    </div>
                    <span class="pt-1 flex text-red-600 items-center  {{($errors->first('birthdate') ? "block" : "hidden")}}">
                      <svg class="w-4 h-4 mr-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <span class="text-sm">This field is required.</span>
                    </span>
                </div>

                <div class="sm:col-span-2">
                    <label for="birthplace" class="block text-sm font-medium text-gray-700">
                      Birthplace
                    </label>
                    <div class="mt-1">
                        <input type="text" name="birthplace" value="{{$first['birthplace'] ?? ''}}" id="birthplace" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md {{($errors->first('birthplace') ? " border-red-600" : "")}}" placeholder="Santa Maria, Bulacan">
                    </div>
                    <span class="pt-1 flex text-red-600 items-center  {{($errors->first('birthplace') ? "block" : "hidden")}}">
                      <svg class="w-4 h-4 mr-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <span class="text-sm">This field is required.</span>
                    </span>
                </div>

                <div class="sm:col-span-2">
                    <label for="birthdate" class="block text-sm font-medium text-gray-700">
                     Mobile Number
                    </label>

                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                        +63
                      </span>
                      <input type="number" name="mobile_number"  value="{{$first['mobile_number'] ?? ''}}"  class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 {{($errors->first('mobile_number') ? " border-red-600" : "")}}" placeholder="9551238299">
                    </div>

                    {{-- <div class="mt-1">
                        <input type="text" name="mobile_number" value="{{$first['mobile_number'] ?? ''}}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md {{($errors->first('mobile_number') ? " border-red-600" : "")}}">
                    </div> --}}
                    <span class="pt-1 flex text-red-600 items-center  {{($errors->first('mobile_number') ? "block" : "hidden")}}">
                      <svg class="ml-12 w-4 h-4 mr-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <span  class="text-sm">{{($errors->first('mobile_number'))}}</span>
                    </span>
                </div>

                <div class="sm:col-span-1">
                    <label for="birthplace" class="block text-sm font-medium text-gray-700">
                     Telephone number
                    </label>
                    <div class="mt-1">
                        <input type="number" name="telephone_number" value="{{$first['telephone_number'] ?? ''}}"  id="birthplace" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="641-58-39">
                    </div>
                </div>

            </div>
        </div>

      <div class="w-9/12">
		  	<h2 class="font-semibold text-sm">Please input your business type</h2>
      </div>

    {{-- <input type="text" list="business_type" name="business_type" value="{{$first['business_type'] ?? ''}}"  id="birthplace" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 w-full sm:text-sm border-gray-300 rounded-md mb-0 {{($errors->first('business_type') ? " border-red-600" : "")}}" placeholder="e.g Sari-sari store" /> --}}
    
   
    <select name="business_type" onchange='checkType(this.value);' class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md {{($errors->first('business_type') ? " border-red-600" : "")}}"> 
      <option selected disabled>Choose one</option>
      @foreach ($business_type as $type)
      <option value="{{$type->name}}">{{$type->name}}</option>
      @endforeach
      <option value="others">others</option>
    </select>
    <input type="text" name="business_type" id="type" style='display:none;' class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" placeholder="Please type your business here...">

    <span class=" flex text-red-600 items-center {{($errors->first('business_type') ? "block" : "hidden")}}">
      <svg class="-mt-10 w-4 h-4 mr-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
      <span class="-mt-10 text-sm">This field is required.</span>
    </span>
      <div class="pt-5">
          <div class="flex justify-end mb-8">
              <a href="{{ url('/')}}"><button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Cancel
              </button></a>
              <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Next
              </button>
          </div>
      </div>

    </form>


</div>
@endsection
