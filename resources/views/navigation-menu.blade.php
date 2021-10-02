<nav class="w-full py-4 bg-gray-700 shadow">
    <div class="container flex flex-wrap items-center justify-between w-full mx-auto">

        <nav>
            <ul class="flex items-center justify-between text-sm font-bold text-white no-underline uppercase">
                <li><a class="px-4 hover:text-gray-200 hover:underline" href="/">وحدة الموهوبين بمكتب وسط جازان</a></li>
            </ul>
        </nav>

        <div class="flex items-center pr-6 text-sm text-white no-underline">
            <a class="pl-6" href="https://www.instagram.com/yaser95/" target="blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a class="pl-6" href="https://twitter.com/yaser95" target="blank">
                <i class="fab fa-twitter"></i>
            </a>

            @auth
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-100 transition duration-150 ease-in-out hover:text-gray-100 hover:border-gray-300 focus:outline-none focus:text-gray-100 focus:border-gray-300">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('index')">
                                <i class="fas fa-home"></i> الرئيسية
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('dashboard')">
                                <i class="fas fa-home"></i> {{ __("لوحة التحكم") }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> خروج
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <a class="pl-6" href="{{ route("login") }}">
                    <i class="fas fa-sign-in-alt"></i>
                </a>
            @endauth

        </div>
    </div>

</nav>
