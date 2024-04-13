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
            <img id="selectedAvatar" src="" alt="Selected Avatar" class="w-12 h-12 rounded-full" style="width: 200px; height: auto;">
        </div>

        <input type="hidden" name="avatar" id="avatarInput">

        <div class="flex items-center gap-4">
            <x-primary-button onclick="submitForm()">{{ __('messages.save') }}</x-primary-button>
        </div>
    </form>
</section>

<script>
    // JavaScript function to display the selected avatar
    function selectAvatar(url, avatar) {
        // Get the selected avatar image element
        var selectedAvatarImg = document.getElementById('selectedAvatar');
        // Set the src attribute of the selected avatar image
        selectedAvatarImg.src = "{{ asset('') }}" + url;

        // Set the value of the hidden input field to the selected avatar
        document.getElementById('avatarInput').value = avatar;

        // Show the selected avatar container
        document.getElementById('selectedAvatarContainer').style.display = 'block';
    }

    // JavaScript function to submit the form
    function submitForm() {
        document.getElementById('avatarForm').submit();
    }
</script>
