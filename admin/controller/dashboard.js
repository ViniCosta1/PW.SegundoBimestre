$(window).on( "load", function(e) {
    $.ajax({
        url: '../model/user_name.php',
        method: 'POST',
        data: {},
        dataType: 'json'
    }).done(function(result){
        console.log(result);
        $('#user_name').prepend(result);
    })
})