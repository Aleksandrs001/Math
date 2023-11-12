@foreach($res as $index => $r)
    <div id="yellowBubble" style="display: none; background-color: yellow; padding: 10px; color: black;">
        Введите целое число.
    </div>
    <div id="redBubble" style="display: none; background-color: red; padding: 10px; color: white;">
        Попробуй еще! Правильный ответ: {{$r['result']}}
    </div>

    <div id="greenBubble" style="display: none; background-color: green; padding: 10px; color: white;">
        Ты молодец!
    </div>
    <div>
        <h1>{{$r['first']}} {{$r['operation']}} {{$r['second']}} {{$r['equal']}}</h1>

        <form id="answerForm_{{$index}}" data-index="{{$index}}" class="answer-form">
            @csrf
            @method('POST')
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <label for="answer_{{$index}}"> {{$r['userName']}}, твой ответ:</label>
            <input type="number" id="answer_{{$index}}" name="answer" pattern="[0-9]*" value=""/>
            <input type="hidden" id="result_{{$index}}" name="result" value="{{$r['result']}}"/>
            <input type="hidden" id="correct_{{$index}}" name="correct" value="1"/>
            <button type="button" onclick="submitAnswer({{$index}})">Сохранить</button>
            <button type="submit" style="display: none;"></button> <!-- Hidden submit button -->
        </form>
    </div>
@endforeach
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function submitAnswer(index) {
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
