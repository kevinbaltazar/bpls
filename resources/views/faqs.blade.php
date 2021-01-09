<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>FAQs</title>
    {{-- <style>
        .panel {
        padding: 0 18px;
        /* display: none; */
        background-color: white;
        overflow: hidden;
        }
        </style> --}}
</head>
<body>

  <div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
      <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
        <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
          <polygon points="50,0 100,0 50,100 0,100" />
        </svg>
  {{-- large nav var --}}
        <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
          <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
              <div class="flex items-center justify-between w-full md:w-auto">
                <a href="#">
                  <span class="sr-only"></span>
                  <img class="h-10 w-auto sm:h-10" src="{{url('/png/pulo-logo.png')}}">
                </a>
                <div class="-mr-2 flex items-center md:hidden">
                  <button onclick="showNav()" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" id="main-menu" aria-haspopup="true">
                    <span class="sr-only">Open main menu</span>
                    <!-- Heroicon name: menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">
              <a href="{{url('/')}}" class="font-medium text-gray-500 hover:text-gray-900">Home</a>
  
              <a href="{{url('/AboutUs')}}" class="font-medium text-gray-500 hover:text-gray-900">About Us</a>
  
              <a href="{{url('/ContactUs')}}" class="font-medium text-gray-500 hover:text-gray-900">Contact Us</a>
  
              <a href="{{url('/FAQs')}}" class="font-medium text-gray-500 hover:text-gray-900">FAQs</a>
            </div>
          </nav>
        </div>
  {{-- end large nav var --}}
            <!--
              Mobile menu, show/hide based on menu open state.
      
              Entering: "duration-150 ease-out"
                From: "opacity-0 scale-95"
                To: "opacity-100 scale-100"
              Leaving: "duration-100 ease-in"
                From: "opacity-100 scale-100"
                To: "opacity-0 scale-95"
            -->
  {{-- small nav var --}}
        <div id="menu" class="fixed top-0  inset-x-0 p-2 transition transform origin-top-right md:hidden hidden">
          <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
            <div class="px-5 pt-4 flex items-center justify-between">
              <div>
                <img class="h-10 w-auto" src="{{url('/png/pulo-logo.png')}}" alt="">
              </div>
              <div class="-mr-2">
                <button onclick="hideNav()" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                  <span class="sr-only">Close main menu</span>
                  <!-- Heroicon name: x -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>
            <div role="menu" aria-orientation="vertical" aria-labelledby="main-menu">
              <div class="px-2 pt-2 pb-3 space-y-1" role="none">
                <a href="{{url('/')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Home</a>
  
                <a href="{{url('/AboutUs')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">About Us</a>
  
                <a href="{{url('/ContactUs')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Contact Us</a>
  
                <a href="{{url('/FAQs')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">FAQs</a>
              </div>
            </div>
          </div>
        </div>
  {{-- end small nav var --}}
      </div>
    </div>
  </div>

  <div class="w-10/12 mx-auto lg:w-9/12 mb-20">
    <h1 class="pb-6 border-b-2 font-bold text-base text-center lg:text-2xl">Frequently Asked Questions</h1>

    <div x-data="{ show: false }" class="py-6 border-b-2">
      <button @click="show = !show" class="accordion font-bold flex w-full text-left focus:outline-none text-sm lg:text-xl">
        <span class="w-10/12">What does “BPLS” mean?</span>
        <svg 
          class="w-6 h-6 ml-auto mr-3"
          :class="{ 'transform rotate-180': show }"
          fill="none" 
          stroke="currentColor" 
          viewBox="0 0 24 24" 
          xmlns="http://www.w3.org/2000/svg"
        >
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
			</button>
      <p x-show="show" class="panel overflow-hidden mt-2 text-sm w-11/12 lg:text-base">BPLS of barangay Pulong buhangin means to reconstruct the current business permits and licensing systems of barangay for the purpose of simplifying and making them more efficient.  The BPLS Program of the of the barangay follow service standards in processing business registration applications, both for new and renewals, i.e.: 1) adopting a digital forms, and reducing the 2) number of steps, 3) processing time, and 4) the number of signatories in securing business permits/renewals. </p>
		</div>

    <div x-data="{ show: false }" class="py-6 border-b-2">
      <button @click="show = !show" class="accordion font-bold flex w-full text-left focus:outline-none text-sm lg:text-xl">
        <span class="w-10/12">Who can apply business permits and licenses?</span>
        <svg 
          class="w-6 h-6 ml-auto mr-3"
          :class="{ 'transform rotate-180': show }"
          fill="none" 
          stroke="currentColor" 
          viewBox="0 0 24 24" 
          xmlns="http://www.w3.org/2000/svg"
        >
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
      <p x-show="show" class="panel overflow-hidden mt-2 text-sm w-11/12 lg:text-base">Only the residents and business establishment of Pulong Buhangin, Santa Maria Bulacan can apply their business permits and licenses to operate their business legally. </p>
    </div>

    <div x-data="{ show: false }" class="py-6 border-b-2">
      <button @click="show = !show" class="accordion font-bold flex w-full text-left focus:outline-none text-sm lg:text-xl">
        <span class="w-10/12">Why do we need to apply business permit and licenses?</span>
        <svg 
          class="w-6 h-6 ml-auto mr-3"
          :class="{ 'transform rotate-180': show }"
          fill="none" 
          stroke="currentColor" 
          viewBox="0 0 24 24" 
          xmlns="http://www.w3.org/2000/svg"
        >
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
      <p x-show="show" class="panel overflow-hidden mt-2 text-sm w-11/12 lg:text-base">Business permits and licenses regulate safety, structure and appearance of the business community. They act as a validation that your business follows certain laws and ordinances. Requirements vary by authority, and failure to follow often results in fines or even having your business shut down. </p>
    </div>

    <div x-data="{ show: false }" class="py-6 border-b-2 ">
      <button @click="show = !show" class="accordion font-bold flex w-full text-left focus:outline-none text-sm lg:text-xl"><span class="w-10/12">Why was the application form I submitted for applying New/Renewal of business permits rejected?</span>
        <svg 
          class="w-6 h-6 ml-auto mr-3"
          :class="{ 'transform rotate-180': show }"
          fill="none" 
          stroke="currentColor" 
          viewBox="0 0 24 24" 
          xmlns="http://www.w3.org/2000/svg"
        >
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
      <div x-show="show" class="panel overflow-hidden mt-2 text-sm w-11/12 lg:text-base">
              <p>Your application form submitted will not be accepted under the following instances:</p>
              <li>The information fields needed in application form are incomplete.</li>
              <li>The upload requirement documents are incomplete.</li>
              <li>Did not passed in the business inspection area.</li>
      </div>
    </div>
				
    <div x-data="{ show: false }" class="py-6 border-b-2 ">
      <button @click="show = !show" class="accordion font-bold flex w-full text-left focus:outline-none text-sm lg:text-xl"><span class="w-10/12">What is the validity of my business permits?</span>
        <svg 
          class="w-6 h-6 ml-auto mr-3"
          :class="{ 'transform rotate-180': show }"
          fill="none" 
          stroke="currentColor" 
          viewBox="0 0 24 24" 
          xmlns="http://www.w3.org/2000/svg"
        >
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
      <p x-show="show" class="panel overflow-hidden mt-2 text-sm w-11/12 lg:text-base">The business permit and licenses is valid only at the end of the year.</p>
    </div>
				
    <div x-data="{ show: false }" class="py-6 border-b-2 ">
      <button @click="show = !show" class="accordion font-bold flex w-full text-left focus:outline-none text-sm lg:text-xl"><span class="w-10/12">What are the documentary requirements for registering a new business permit?</span>
        <svg 
          class="w-6 h-6 ml-auto mr-3"
          :class="{ 'transform rotate-180': show }"
          fill="none" 
          stroke="currentColor" 
          viewBox="0 0 24 24" 
          xmlns="http://www.w3.org/2000/svg"
        >
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
      <div x-show="show" class="panel overflow-hidden mt-2 text-sm w-11/12 lg:text-base">
          <p>For new business registration, the following documents should be attached:</p>
          <li>Latest Cedula</li>
          <li>Real Property Tax/Amilyar</li>
          <li>Land Title</li>
          <li>DTI/SEC Registration</li>
          <li>Contract of Lease</li>
      </div>
    </div>

    <div x-data="{ show: false }" class="py-6 border-b-2 ">
      <button @click="show = !show" class="accordion font-bold flex w-full text-left focus:outline-none text-sm lg:text-xl"><span class="w-10/12">What are the documentary requirements for renewing a business permit?</span>
        <svg 
          class="w-6 h-6 ml-auto mr-3"
          :class="{ 'transform rotate-180': show }"
          fill="none" 
          stroke="currentColor" 
          viewBox="0 0 24 24" 
          xmlns="http://www.w3.org/2000/svg"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
      <div x-show="show" class="panel overflow-hidden mt-2 text-sm w-11/12 lg:text-base">
          <p>For new business registration, the following documents should be attached:</p> 
          <li>Latest Cedula</li>
          <li>Real Property Tax/Amilyar</li>
          <li>Land Title</li>
          <li>DTI/SEC Registration</li>
          <li>Contract of Lease</li>
          <li>Old Permit</li>
          <li>Picture of Business</li>
      </div>
    </div>

    <div x-data="{ show: false }" class="py-6 border-b-2 ">
      <button @click="show = !show" class="accordion font-bold flex w-full text-left focus:outline-none text-sm lg:text-xl"><span class="w-10/12">If the documentary requirements attached to the unified form are incomplete, should the application still be accepted?</span>
        <svg 
          class="w-6 h-6 ml-auto mr-3"
          :class="{ 'transform rotate-180': show }"
          fill="none" 
          stroke="currentColor" 
          viewBox="0 0 24 24" 
          xmlns="http://www.w3.org/2000/svg"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
          <p x-show="show" class="panel overflow-hidden mt-2 text-sm w-11/12 lg:text-base">Yes.  Even if the application lacks the documentary requirements, the Anti-Red Tape Act requires the barangay to accept the form. However, the processing of the form may be delayed until all the requirements are complete. </p>
    </div>

  <div>
         

				
  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    let menu = document.getElementById("menu");
    // let acc = document.getElementsByClassName("accordion");
    // let i;

    // for (i = 0; i < acc.length; i++) {
    //     acc[i].addEventListener("click", function() {
    //     this.classList.toggle("active");
    //     let panel = this.nextElementSibling;
    //     if (panel.style.display === "block") {
    //     panel.style.display = "none";
// 	} 
// 	else {
    //     panel.style.display = "block";
    //     }
    // });
    // }

    function hideNav(){
      menu.style.display = "none";
    }
    function showNav(){
      menu.style.display = "block";
    }
    
  </script>
</body>
</html>
