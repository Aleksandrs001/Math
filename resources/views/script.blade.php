<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#answer_0').focus();
    });

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
                if (response.message) {
                    showGreenBubble();
                } else if (response.message === 'Введите целое число.') {
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
        }
    }

    $('form.answer-form').on('keydown', function (e) {
        if (e.keyCode === 13) {
            e.preventDefault();
            submitAnswer($(this).data('index'));
        }
    });

</script>
