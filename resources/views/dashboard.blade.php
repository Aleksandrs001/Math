<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('messages.dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('messages.dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("messages.you_are_logged_in") }}
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
                    {{ __("messages.count_played_game") }} {{ (new \App\Services\StatisticService)->getStatistic()->count ?? 'not yet' }}
                    <br>
                    {{ __("messages.count_win_game") }} {{ (new \App\Services\StatisticService)->getStatistic()->win ?? 'not yet' }}
                    <br>
                    {{ __("messages.count_loss_game") }} {{ (new \App\Services\StatisticService)->getStatistic()->loss ?? 'not yet' }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
