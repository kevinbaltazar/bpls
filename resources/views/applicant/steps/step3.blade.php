@extends('applicant.application')
@section('application')
<div class="lg:border-t lg:border-b lg:border-gray-200">
    <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
      <ol class="rounded-md overflow-hidden lg:flex lg:border-l lg:border-r lg:border-gray-200 lg:rounded-none">
        <li class="relative overflow-hidden lg:flex-1">
          <div class="border border-gray-200 overflow-hidden border-b-0 rounded-t-md lg:border-0">
            <!-- Completed Step -->

            <a href="#" class="group">
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
              
           
              
          </div>
        </li>
  
        <li class="relative overflow-hidden lg:flex-1">
          <div class="border border-gray-200 overflow-hidden lg:border-0">
            <!-- Current Step -->
            

              <a href="#" class="group">
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
                    <span class="text-lg mt-1 font-semibold uppercase tracking-wide">Requirements</span>
                  </span>
                </span>
            </a>
            
  
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
            
                <span class="absolute top-0 left-0 w-1 h-full bg-indigo-600 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                  <span class="flex-shrink-0">
                    <span class="w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                      <span class="text-indigo-600">03</span>
                    </span>
                  </span>
                  <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                    <span class="text-lg mt-1 font-semibold text-indigo-600 uppercase tracking-wide">Summary</span>
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
 
    @foreach ($images as $item)
    <div class="flex bg-black w-1">
      <img class="flex justify-between flex-col mt-12 w-40" src="{{$item->getFullUrl()}}" alt="">
    </div>
    @endforeach
 
  <form class="space-y-8" method="POST" action="/application/third">
      @csrf

      {{$clearance->full_name}}
      {{$clearance->personal_address}}
      {{$clearance->business_name}}
      {{$clearance->birthdate}}
      {{$clearance->birthplace}}
      {{$clearance->mobile_number}}
      {{$clearance->telephone_number}}

        <div class="pt-5">
            <div class="flex justify-end">
                <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </button>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Next
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
