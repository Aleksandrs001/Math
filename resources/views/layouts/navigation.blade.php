<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($weather = \App\Http\Controllers\NavigationController::weather())
            <div class="mx-auto my-4 p-4 flex items-center justify-center space-x-4 text-sm text-gray-700 dark:text-gray-200">
                <img src="{{ $weather['icon'] }}" alt="Weather Icon" class="w-12 h-12">
                <div class="text-xs whitespace-nowrap">
                    {{ __('weather.temp') }}: {{ $weather['temp'] }}°C&nbsp;
                    {{ __('weather.temp_min_max') }}: {{ $weather['temp_min'] }}°C / {{ $weather['temp_max'] }}°C&nbsp;
                    {{ __('weather.humidity') }}: {{ $weather['humidity'] }}%&nbsp;
                    {{ __('weather.wind') }}: {{ $weather['wind'] }} m/s&nbsp;
                    {{ __('weather.pressure') }}: {{ $weather['pressure'] }} hPa&nbsp;
                    {{ __('weather.city') }}: {{ $weather['city'] }}, {{ __('weather.country') }}: {{ $weather['country'] }}
                </div>
            </div>
        @endif

        <div class="flex justify-between h-16">

            <div class="flex">
                <!-- Navigation Links -->

                <div class="shrink-0 flex ">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('messages.home') }}
                    </x-nav-link>
                </div>
                {{--                if user have mobile phone use this if--}}
                @if(\App\Http\Controllers\NavigationController::isMobile())
                    <div
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                        onclick="toggleMenu('plus')">
                        {{__('messages.plus')}}
                    </div>
                    <ul id="plus-menu-items" style="display: none;">
                        @foreach(\App\Http\Controllers\NavigationController::getPlusMenu() as $key => $menu)
                            <x-nav-link href="{{ route($key) }}">{{ __($menu) }}</x-nav-link>
                        @endforeach
                    </ul>

                    <div
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                        onclick="toggleMenu('minus')">
                        {{__('messages.minus')}}
                    </div>
                    <ul id="minus-menu-items" style="display: none;">
                        @foreach(\App\Http\Controllers\NavigationController::getminusMenu() as $key => $menu)
                            <x-nav-link href="{{ route($key) }}">{{ __($menu) }}</x-nav-link>
                        @endforeach
                    </ul>



                    <div
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                        onclick="toggleMenu('plus')">
                        {{__('divide.divide')}}
                    </div>
                    <ul id="plus-menu-items" style="display: none;">
                        @foreach(\App\Http\Controllers\NavigationController::getDivideMenu() as $key => $menu)
                            <x-nav-link href="{{ route($key) }}">{{ __($menu) }}</x-nav-link>
                        @endforeach
                    </ul>

                    {{--                    @foreach(\App\Http\Controllers\NavigationController::getDivideMenu() as $key => $menu)--}}
                    {{--                        <div class="shrink-0 flex ">--}}
                    {{--                            <x-nav-link :href="route($key)" :active="request()->routeIs($key)">--}}
                    {{--                                {{ __($menu) }}--}}
                    {{--                            </x-nav-link>--}}
                    {{--                        </div>--}}
                    {{--                    @endforeach--}}

                    @foreach(\App\Http\Controllers\NavigationController::getMultiplyMenu() as $key => $menu)
                        <div class="shrink-0 flex ">
                            <x-nav-link :href="route($key)" :active="request()->routeIs($key)">
                                {{ __($menu) }}
                            </x-nav-link>
                        </div>
                    @endforeach
                @else
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    {{ __('messages.plus') }}

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                @foreach(\App\Http\Controllers\NavigationController::getPlusMenu() as $key => $menu)
                                    <x-nav-link :href="route($key)" :active="request()->routeIs($key)">
                                        {{ __($menu) }}
                                    </x-nav-link>
                                    <br>
                                @endforeach
                            </x-slot>
                        </x-dropdown>

                    </div>
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    {{ __('messages.minus') }}
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                @foreach(\App\Http\Controllers\NavigationController::getMinusMenu() as $key => $menu)
                                    <x-nav-link :href="route($key)" :active="request()->routeIs($key)">
                                        {{ __($menu) }}
                                    </x-nav-link>
                                    <br>
                                @endforeach
                            </x-slot>
                        </x-dropdown>
                    </div>

                    {{-- DIVIDE--}}

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    {{ __('divide.divide') }}
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                @foreach(\App\Http\Controllers\NavigationController::getDivideMenu() as $key => $menu)
                                    <x-nav-link :href="route($key)" :active="request()->routeIs($key)">
                                        {{ __($menu) }}
                                    </x-nav-link>
                                    <br>
                                @endforeach
                            </x-slot>
                        </x-dropdown>
                    </div>



                    @foreach(\App\Http\Controllers\NavigationController::getMultiplyMenu() as $key => $menu)
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route($key)" :active="request()->routeIs($key)">
                                {{ __($menu) }}
                            </x-nav-link>
                        </div>
                    @endforeach

                    @foreach(\App\Http\Controllers\NavigationController::getOtherMenu() as $key => $menu)
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route($key)" :active="request()->routeIs($key)">
                                {{ __($menu) }}
                            </x-nav-link>
                        </div>
                    @endforeach
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <div class="text-gray-400">
                        @foreach(\App\Http\Controllers\NavigationController::getAllLanguages() as $key => $menu)
                            |
                            <a href="{{ route('change.locale', ['locale' => $key]) }}"
                               style="{{ app()->getLocale() === $key ? 'color: #BDBDBD;' : 'color: #808080;' }}">
                                {{$menu}}
                            </a>
                        @endforeach
                        |
                    </div>
                </div>
                @if($avatar = \App\Http\Controllers\UserController::getUserAvatar())
                    {{--                <div class="round-image">--}}
                    {{--                    <img src="{{ asset( \App\Http\Controllers\UserController::getUserAvatar()) }}" style="width: 50px; height: auto;" alt="{{asset('user.png')}}">--}}
                    {{--                </div>--}}
                    <div class="round-image">
                        @if($avatar)
                            <img src="{{ asset($avatar) }}" style="width: 50px; height: auto;" alt="User Avatar">
                        @endif
                    </div>
                @endif
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            {{ Auth::user()->name }}
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('messages.profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('about')">
                            {{ __('messages.about') }}

                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('messages.log_out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

            </div>


            @endif

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('change.locale', ['locale' => 'en']) }}"
               style="{{ app()->getLocale() === 'en' ? 'color: #BDBDBD;' : 'color: #808080;' }}">
                {{__('messages.en_lang')}}
            </a>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('change.locale', ['locale' => 'ru']) }}"
               style="{{ app()->getLocale() === 'ru' ? 'color: #BDBDBD;' : 'color: #808080;' }}">
                {{__('messages.ru_lang')}}
            </a>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('change.locale', ['locale' => 'lv']) }}"
               style="{{ app()->getLocale() === 'lv' ? 'color: #BDBDBD;' : 'color: #808080;' }}">
                {{__('messages.lv_lang')}}
            </a>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('messages.profile') }}
                    </x-responsive-nav-link>

                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                            {{ __('messages.about') }}
                        </x-responsive-nav-link>
                    </div>
                    @if(\App\Http\Controllers\NavigationController::isMobile())
                        @foreach(\App\Http\Controllers\NavigationController::getOtherMenu() as $key => $menu)
                            <div class="pt-2 pb-3 space-y-1">
                                <x-responsive-nav-link :href="route($key)" :active="request()->routeIs($key)">
                                    {{ __($menu) }}
                                </x-responsive-nav-link>
                            </div>
                        @endforeach
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('messages.log_out') }}
                        </x-responsive-nav-link>

                    </form>
                </div>
            </div>
        </div>
</nav>
