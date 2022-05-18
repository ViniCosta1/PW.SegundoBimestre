// * Quando apertar o botão:
$('#form1').submit(function(e){
    // * Impedindo que a página atualize depois de clicar no botão
    e.preventDefault();

    // * Pegando valor de variável
    var u_login = $('#login').val();
    var u_password = $('#password').val();

    // * Enviando dados para o php
    $.ajax({
        url: './model/login.php',
        method: 'POST',
        data: {login: u_login, password: u_password},
        dataType: 'json'
    }).done(function(result){
        console.log(result);
        if ($('#error').is(':empty')){
            $('#error').prepend(result);
        }
        if (result == true) {
            $.ajax({
                url: './model/login.php',
                method: 'POST',
                data: {login: u_login, password: u_password},
                success: function(data) { window.location.href = './view/dashboard.html' },
                dataType: 'json'
            })
        }
    });
})