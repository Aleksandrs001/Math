
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function submitAnswer(index) {
        console.log('here')
        var form = $('#answerForm_' + index);
        var formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: '{{ route('answer') }}',
            data: formData + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
            success: function(response) {
                if (response.message === 'Ты молодец!') {
                    showGreenBubble();
                } else if (response.message === 'Введите целое число.') {
                    showYellowBubble();
                } else {
                    showRedBubble();
                }
            },
            error: function(error) {
                console.error(error);
            }
        });

        function showGreenBubble() {
            $('#greenBubble').show();

            setTimeout(function() {
                $('#greenBubble').hide();
                location.reload();
            }, 3000);
        }

        function showRedBubble() {
            $('#redBubble').show();

            setTimeout(function() {
                $('#redBubble').hide();
                location.reload();
            }, 5000);
        }
    }

    function showYellowBubble() {
        $('#yellowBubble').show();

        setTimeout(function() {
            $('#yellowBubble').hide();

        }, 5000);
    }

    $('form.answer-form').on('keydown', function(e) {
        if (e.keyCode === 13) {
            e.preventDefault();
            submitAnswer($(this).data('index'));
        }
    });
</script>
