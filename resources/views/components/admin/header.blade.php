<div class="relative max-h-24 z-40 flex w-full shadow-xl justify-between lg:justify-start">
    <button class="ml-4 lg:hidden" @click="showSidebar = true">
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16M4 18h16" /></svg>
    </button>
    <a class="logo flex justify-center items-center bg:white lg:bg-gray-200 h-12 w-auto lg:w-64 overflow-hidden py-2" href="{{ route('admin.home') }}">
        <img src="{{ asset('public/img/logo.png') }}" width="auto" height="auto" class="h-9 hidden lg:block">
        <img src="{{ asset('public/img/logo-mini.png') }}" width="auto" height="auto" class="h-9 lg:hidden">
    </a>
    <div class="hidden lg:flex lg:flex-grow"></div>
    <nav class="mb-0 lg:ml-64 h-12 z-50 relative items-center flex-nowrap hidden lg:flex">
        <div class="">
            <button id="header-dropdown-btn" data-dropdown-toggle="header-dropdown" class="font-semibold h-12 text-sm px-4 py-2.5 text-center inline-flex items-center  bg:white hover:bg-gray-300 text-gray-600">
                {{Auth::user()->name}}
                <svg class="w-4 h-4 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
        </div>
    </nav>
    <button class="lg:hidden" id="header-dropdown-btn" data-dropdown-toggle="header-dropdown">
        <svg class="w-6 h-6 text-gray-600 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    </button>
    <div id="header-dropdown" class="z-10 hidden bg-white border divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="header-dropdown-btn">
            <li class="lg:hidden block px-4 py-2 bg-gray-400 text-center text-white">{{Auth::user()->name}}</li>
            <li>
                <a href="{{route('admin.profile')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profle</a>
            </li>
            <li>
                <form method="POST" action="{{ route('admin.auth.logout' )}}">
                    @csrf
                    <button href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" type="submit">Sign out</button>
                </form>
            </li>
        </ul>
    </div>
    </div>
