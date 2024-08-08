{{-- <nav class="navbar bg-base-100">
    <div class="container mx-auto flex justify-between">
        <div class="flex-none">
            <a class="btn btn-ghost normal-case text-xl" href="#">{{ config('app.name') }}</a>
        </div>
        <div class="flex-1">
            <ul class="menu menu-horizontal p-0">
                <li><x-nav-link :active="request()->routeIs('dashboard.index')" href="{{ route('dashboard.index') }}">Home</x-nav-link></li>
            </ul>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal p-0">
                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-ghost" type="submit">Log Out</button>
                        </form>
                    </li>
                @else
                    <li><x-nav-link :href="route('login')">Login</x-nav-link></li>
                @endauth
            </ul>
        </div>
    </div>
</nav> --}}




<nav class=" border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SKPTS</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
