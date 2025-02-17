<x-skeleton-layout>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">   
                        <a 
                            href="{{ route('admin.dashboard') }}" 
                            class="@if (Request::url() === route('admin.dashboard')) border-indigo-500 @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                        >
                            Dashboard
                        </a>
     
                        <a 
                            href="{{ route('admin.admins.index') }}" 
                            class="@if (Request::url() === route('admin.admins.index')) border-indigo-500 @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                        >
                            Admins
                        </a>
                        
                        <a 
                            href="{{ route('admin.clearances.index') }}" 
                            class="@if (Request::url() === route('admin.clearances.index')) border-indigo-500 @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                        >
                            Clearances
                        </a>
                        
                        
                         <a 
                            href="{{ Route('admin.setting')}}" 
                            class="@if (Request::url() === route('admin.setting')) border-indigo-500 @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                        >
                            Setting
                        </a>

                        <a 
                            href="{{ Route('admin.messages')}}" 
                            class="@if (Request::url() === route('admin.messages')) border-indigo-500 @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                        >
                            Messages
                        </a>

                        <a 
                            href="{{ Route('admin.reports')}}" 
                            class="@if (Request::url() === route('admin.reports')) border-indigo-500 @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                        >
                            Reports
                        </a>
                        <a 
                            href="{{ Route('admin.audit')}}" 
                            class="@if (Request::url() === route('admin.audit')) border-indigo-500 @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                        >
                            Audit Log
                        </a>
                        
                    </div>
                </div>

            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <!-- Profile dropdown -->
                <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
                <div>
                    <button @click="open = !open" class="bg-white flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        
                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-gray-500">
                            <span class="text-xs font-medium leading-none text-white">
                                {{ Auth::guard('admin')->user()->initials }}
                            </span>
                        </span>
                    </button>
                </div>
                <!--
                    Profile dropdown panel, show/hide based on dropdown state.

                    Entering: "transition ease-out duration-200"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                <div x-show="open" x-description="Profile dropdown panel, show/hide based on dropdown state." x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                    <form class="w-full" action="/admin/logout" method="POST">
                        @csrf
                        <button type="submit" href="#" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out
                    </form>
                </div>
                </div>
            </div>
            <div class="-mr-2 flex items-center sm:hidden ">
                <!-- Mobile menu button -->
                <button class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">Open main menu</span>
                <!--
                    Heroicon name: menu

                                Menu open: "hidden", Menu closed: "block"
                            -->
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <!--
                                Heroicon name: x

                                Menu open: "block", Menu closed: "hidden"
                            -->
                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!--
                Mobile menu, toggle classes based on menu state.

            Open: "block", closed: "hidden"
        -->
        <div class="sm:hidden hidden">
            
            <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </div>
                <div class="ml-3">
                <div class="text-base font-medium text-gray-800">Tom Cook</div>
                <div class="text-sm font-medium text-gray-500">tom@example.com</div>
                </div>
                <button class="ml-auto bg-white flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">View notifications</span>
                <!-- Heroicon name: bell -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                </button>
            </div>
                <div class="mt-3 space-y-1">
                    <form class="w-full" action="/admin/logout" method="POST">
                        @csrf
                        <button type="submit" href="#" class=" px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Sign out
                    </form>
                </div>
            </div>
        </nav>

        <div class="py-10">
            {{ $slot }}
        </div>
    </div>
</x-skeleton-layout>