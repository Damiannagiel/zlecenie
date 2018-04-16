function cookies_ok(dotted){
    $.ajax
    ({
        url: dotted+'regulamin/cookies_ok.php',
        type: 'post',
        data: {},
            success: function()
            {
                $(".cookies").slideUp();
            }
    });
}