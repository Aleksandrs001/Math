<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#answer_0').focus();
    });

    function submitAnswer(index) {
        var form = $('#answerForm_' + index);

        // Disable the form to prevent multiple submissions
        form.find('button').prop('disabled', true);

        var formData = form.serialize();
        $.ajax({
            type: 'POST',
            url: '{{ route('answer') }}',
            data: formData + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
            success: function (response) {
                if (response.message === 'Ты молодец!') {
                    showGreenBubble();
                } else if (response.message === 'Введите целое число.') {
                    showYellowBubble();
                } else {
                    showRedBubble();
                }
            },
            error: function (error) {
                console.error(error);
            },
            complete: function() {
                // Enable the form after the request is complete
                form.find('button').prop('disabled', false);
            }
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
