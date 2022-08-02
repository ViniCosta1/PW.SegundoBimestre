$(document).ready(function(){
    $('#btn-1-5em').click(function(){
         $('p').removeClass('font-2-0');
         $('p').removeClass('font-2-5');
         $('p').addClass('font-1-5');
    });
    $('#btn-2-0em').click(function(){
         $('p').removeClass('font-1-5');
         $('p').removeClass('font-2-5');
         $('p').addClass('font-2-0');
    });
    $('#btn-2-5em').click(function(){
         $('p').removeClass('font-1-5');
         $('p').removeClass('font-2-0');
         $('p').addClass('font-2-5');
    });

    // Mostrar imagem
    $('#btn-hide').click(function(){
        $('.image').fadeOut('slow');
        $('.menu').fadeToggle('slow');
    })
    $('#btn-show').click(function(){
        $('.image').fadeIn('slow');
        $('.menu').fadeToggle('slow');
    })

    $('.menu').hide();
    $('.nav-bar').click(function(){
        $('.menu').fadeToggle('slow');
    })

});