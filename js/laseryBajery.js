$(document).ready(function() {
    
    $('input[type=search]').focus(function(){
        $('#panel-top-menu').animate({ 'margin-right': '+=300px'}, 400);
        $('#searchtext').toggleClass("opacity-p");
        $('#search-button').show();
                                    });
    
    $('input[type=search]').focusout(function(){
        $('#panel-top-menu').animate({ 'margin-right': '-=300px'}, 600);
        $('#searchtext').removeClass("opacity-p");
                                    });
     $('body').click(function() {
                $('#search-button').hide();
        });
    $('#mobile-nav-button').click(function() {
                $('.mobile-menu').slideToggle("fast");
        });
    
    
    });

});