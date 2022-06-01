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

    $.ajax({
        url: '../model/counters/news_counter.php',
        method: 'POST',
        data: {},
        dataType: 'json'
    }).done(function(result){
        $('#news_counter').prepend(result);
    })

    $.ajax({
        url: '../model/counters/adms_counter.php',
        method: 'POST',
        data: {},
        dataType: 'json'
    }).done(function(result){
        $('#adms_counter').prepend(result);
    })
})