$(document).ready(function() {

    recupMessage();
    recupTime();
    
    $('.field-input').focus(function () {
        $(this).parent().addClass('is-focused has-label');
    });
    
    // à la perte du focus
    $('.field-input').blur(function () {
        $parent = $(this).parent();
        if ($(this).val() == '') {
            $parent.removeClass('has-label');
        }
        $parent.removeClass('is-focused');
    });
    
    // si un champs est rempli on rajoute directement la class has-label
    $('.field-input').each(function () {
        if ($(this).val() != '') {
            $(this).parent().addClass('has-label');
        }
    });
    
    $('#send').click(function(){
        var message = $('#message').val();
        console.log("click btn send fonctionne");
    
        if (message != ''){
                $.post('ajax/send.php',{message:message},function(){
                 console.log("message envoyer en bdd");
             recupMessage();
                $('#message').val('');
            });
        }
    });
    
    function recupMessage() {
        $.post('ajax/recover.php', function(data) {
            $('.messages-box').html(data);
        });
    }
    
    function recupTime () {
        $.post('ajax/time.php', function(data) {
            $('.time').html(data);
        });
    }
    setInterval(recupTime,1000);
    setInterval(recupMessage,1000);
    
    });