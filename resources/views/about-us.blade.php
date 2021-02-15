<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>About Us</title>


    
    </head>
    <body>
        <div class="relative bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto">
              <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                  <polygon points="50,0 100,0 50,100 0,100" />
                </svg>
          
                <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                  <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
                    <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                      <div class="flex items-center justify-between w-full md:w-auto">
                        <a href="{{url('/')}}">
                          <span class="sr-only">Workflow</span>
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
          
                <!--
                  Mobile menu, show/hide based on menu open state.
          
                  Entering: "duration-150 ease-out"
                    From: "opacity-0 scale-95"
                    To: "opacity-100 scale-100"
                  Leaving: "duration-100 ease-in"
                    From: "opacity-100 scale-100"
                    To: "opacity-0 scale-95"
                -->
                <div id="menu" class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden hidden">
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
                        <a href="{{('/')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Home</a>
          
                        <a href="{{url('/AboutUs')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">About Us</a>
          
                        <a href="{{url('/ContactUs')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Contact Us</a>
          
                        <a href="{{url('/FAQs')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">FAQs</a>
                      </div>
                    </div>
                  </div>
                </div>
          
                <main class="mt-6 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                  <p class="text-xl font-semibold w-10/12">
                    Pulong Buhangin is one of the twenty-four barangays comprising the municipality of Santa Maria, Bulacan. It is bordered by Barangays Caypombo on the south, Balasing on the east, Partida, Norzagaray on the north and Pulong Yantok, Angat on the northwest. With a land area of 1,438 hectares or 14.38 km, Pulong Buhangin is the largest barangay in Santa Maria, larger than the combined land area of the Municipality of Pateros and City of Navotas in Metro Manila. The barangay is located seven kilometers northeast of Santa Maria town proper and thirty-nine kilometers from Manila.
                  </p>
                </main>
              </div>
            </div>
            <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
              <img class="h-56 object-cover w-full sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{url('/png/pulo-front.png')}}" alt="">
            </div>
          </div>


          <script>
            var menu = document.getElementById("menu");

            function hideNav(){
              menu.style.display = "none";
            }
            function showNav(){
              menu.style.display = "block";
            }
            
          </script>
    </body>
</html>
