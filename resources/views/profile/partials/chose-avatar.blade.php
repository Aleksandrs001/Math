<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('avatar.information') }}
        </h2>
    </header>

    <form id="avatarForm" method="post" action="{{ route('avatar.save') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("avatar.choose_avatar") }}
        </p>

        <div>
            @foreach ($avatars as $url => $avatar)
                <button
                    type="button"
                    onclick="selectAvatar('{{ $url }}', '{{ $avatar }}')"
                    class="inline-block p-1 -m-1"
                >
                    <img
                        src="{{ asset($url) }}"
                        alt="{{ $avatar }}"
                        class="w-12 h-12 rounded-full"
                        style="width: 75px; height: auto;"
                    >
                </button>
            @endforeach
        </div>

        <div id="selectedAvatarContainer" class="mt-4">
            <img id="selectedAvatar" src=""  class="w-12 h-12 rounded-full" style="width: 200px; height: auto;">
        </div>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">

         {{ __('avatar.completed') }}
        </h2>

         <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
             {{__('messages.minus')}} , @if($statistic['minus']['completed']) {{__('avatar.ready')}} ready @else {{__('avatar.lesson_left')}} {{$statistic['minus']['userLeft']}}  @endif
         </div>
         <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
             {{__('messages.plus')}} , @if($statistic['plus']['completed']) {{__('avatar.ready')}}  @else {{__('avatar.lesson_left')}} {{ $statistic['plus']['userLeft'] }} @endif
         </div>
         <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
             {{__('messages.divide')}} , @if($statistic['divide']['completed']){{__('avatar.ready')}}  @else {{__('avatar.lesson_left')}} {{ $statistic['divide']['userLeft'] }} @endif
         </div>
        <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{__('messages.multiply')}} , @if($statistic['multiply']['completed']){{__('avatar.ready')}}  @else {{__('avatar.lesson_left')}} {{ $statistic['multiply']['userLeft'] }} @endif
        </div>
        <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{__('messages.plus_find_x')}} , @if($statistic['plusXFind']['completed']){{__('avatar.ready')}}  @else {{__('avatar.lesson_left')}} {{ $statistic['plusXFind']['userLeft'] }} @endif
        </div>
        <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{__('messages.minus_find_x')}} , @if($statistic['minusXFind']['completed']){{__('avatar.ready')}}  @else {{__('avatar.lesson_left')}} {{ $statistic['minusXFind']['userLeft'] }} @endif
        </div>



        <input type="hidden" name="avatar" id="avatarInput">
        @if (!empty($statistic['save_button']))
            <div class="flex items-center gap-4">
                <x-primary-button onclick="submitForm()">{{ __('messages.save') }}</x-primary-button>
            </div>
        @endif
    </form>
</section>

<script>
    function selectAvatar(url, avatar) {
        let selectedAvatarImg = document.getElementById('selectedAvatar');
        selectedAvatarImg.src = "{{ asset('') }}" + url;

        document.getElementById('avatarInput').value = avatar;

        document.getElementById('selectedAvatarContainer').style.display = 'block';
    }

    function submitForm() {
        document.getElementById('avatarForm').submit();
    }
</script>
