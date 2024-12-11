<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#answer_0').focus();
    });

    function toggleMenu(item) {
        if (item === 'plus') {
            let menu = document.getElementById("plus-menu-items");
            menu.style.display = (menu.style.display === "none") ? "block" : "none";
        } else {
            let menu = document.getElementById("minus-menu-items");
            menu.style.display = (menu.style.display === "none") ? "block" : "none";
        }

    }

    function withoutRegistration(index) {
        let form = $('#answerForm_' + index);
        form.find('button').prop('disabled', true);
        let formData = form.serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo e(route('withoutRegistration')); ?>',
            data: formData + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
            dataType: 'json',
            success: function (response) {
                if (response.message === 'ok') {
                    showGreenBubble();
                } else if (response.message === 'nan') {
                    showYellowBubble();
                } else if (response.message === 'count') {
                    alert('Вы не зарегистрированы.');
                    location.reload();
                } else {
                    showRedBubble();
                }
            },
        });

        function showGreenBubble() {
            $('#greenBubble').show();

            setTimeout(function () {
                $('#greenBubble').hide();
                location.reload();
            }, 3000);
        }

        function showRedBubble() {
            $('#redBubble').show();

            setTimeout(function () {
                $('#redBubble').hide();
                location.reload();
            }, 5000);
        }

        function showYellowBubble() {
            $('#yellowBubble').show();

            setTimeout(function () {
                $('#yellowBubble').hide();
            }, 5000);
        }
    }

    function submitAnswer(index) {
        let form = $('#answerForm_' + index);

        form.find('button').prop('disabled', true);

        let formData = form.serialize();
        $.ajax({
            type: 'POST',
            url: '{{ route('answer') }}',
            data: formData + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
            dataType: 'json',
            success: function (response) {
                console.log(response)
                if (response.message === 'ok') {
                    showGreenBubble();
                } else if (response.message === 'float') {
                    showYellowBubble();
                } else {
                    showRedBubble();
                }
            },
        });

        function showGreenBubble() {
            $('#greenBubble').show();

            setTimeout(function () {
                $('#greenBubble').hide();
                location.reload();
            }, 3000);
        }

        function showRedBubble() {
            $('#redBubble').show();

            setTimeout(function () {
                $('#redBubble').hide();
                location.reload();
            }, 5000);
        }

        function showYellowBubble() {
            $('#yellowBubble').show();

            setTimeout(function () {
                $('#yellowBubble').hide();
            }, 5000);
            form.find('button').prop('disabled', false);
        }
    }

    $('form.answer-form').on('keydown', function (e) {
        if (e.keyCode === 13) {
            e.preventDefault();
                submitAnswer($(this).data('index'));
            }
    });

    function copyTextToClipboard(elementId) {
        let textToCopy = document.getElementById(elementId);

        let range = document.createRange();
        range.selectNode(textToCopy);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);

        document.execCommand('copy');

        window.getSelection().removeAllRanges();

        alert(textToCopy.textContent + ' copied to clipboard!');
    }

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
