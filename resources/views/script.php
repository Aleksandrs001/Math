<script>
    function submitAnswer(index) {
        var form = $('#answerForm_' + index);
        var formData = form.serialize();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: formData,
            success: function(response) {
                // Handle success, e.g., show a success message
                console.log(response);
            },
            error: function(error) {
                // Handle error, e.g., show an error message
                console.error(error);
            }
        });
    }
</script>
