$(document).ready(function(){
    $('.center input').keyup(function(){
        var words = $('input').val();

        if(words != ''){
            $.ajax({
                'url':'php/search.php',
                'method':'GET',
                'dataType': 'json',
                'data':{s:words}
            })
            .done(function(response){
                $('.result').html('');

                $.each(response, function (key, val) {
                    $('.result').append('<div class="item">' + val + '</div>');
                });
            })
            .fail(function(){
                $('.result').html('');
            });
        }else{
            $('.result').html('');
        }
    })
})