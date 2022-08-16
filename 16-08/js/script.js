$(document).ready(function () {
    $('#send').click(function (e) {
        e.preventDefault();

        var nome = $('#name').val();
        var idade = $('#age').val();

        var frase = 'Olá ' + nome + ', sua idade é ' + idade;

        $('#name').val('');
        $('#age').val('');

        $('#mensagem').append(frase);

        $('#name').focusin(function () {
            $('#mensagem').empty();
        });
    });
});
