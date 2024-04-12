<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('messages.dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="header">
        <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400 sm:text-left ">
            <div class="flex items-center gap-4">
                <a href="/about" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:outline-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                    </svg>
                    Support us
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("messages.welcome") }}
                    {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("messages.statistic") }}:
                    <br>
                    {{ __("messages.count_played_game") }} {{ (new \App\Services\StatisticService)->getStatistic()->count ?? __('messages.not_yet') }}
                    <br>
                    {{ __("messages.count_win_game") }} {{ (new \App\Services\StatisticService)->getStatistic()->win ?? __('messages.not_yet') }}
                    <br>
                    {{ __("messages.count_loss_game") }} {{ (new \App\Services\StatisticService)->getStatistic()->loss ?? __('messages.not_yet') }}
                </div>

            </div>
            <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400 sm:text-left min-h-screen">
                <div class="flex items-center gap-4">
                    <a href="/about" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:outline-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                        </svg>
                        Support us
                    </a>
                </div>

                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-center sm:ml-0">
                    <label>© 2024 Copyright Children-math </label>
                </div>

                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>

        </div>
    </div>

    {{--    <div class="flex flex-col justify-center mt-16 px-0 sm:flex-row sm:items-center sm:justify-between">--}}

    {{--    </div>--}}

</x-app-layout>
