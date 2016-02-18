$(document).ready(function() {

$('.mobile-nav-button').on('click', function(e){

       if($('.mobile-menu').hasClass( 'is-visible' )){
       	$('.mobile-menu').removeClass( 'is-visible' );
       	$('.mobile-nav-button-icon').removeClass( 'is-clicked' );
       }else{
		$('.mobile-menu').addClass( 'is-visible' );
		$('.mobile-nav-button-icon').addClass('is-clicked');
	}
	e.stopPropagation();
   });

$('#search-button-active').on('click', function(e){
	e.preventDefault();
       	$('.search-container').fadeIn();
       	$('#search-button-active').css('color','transparent');
       	$('#search-button-active').css('cursor','auto');
        $('.search-input').addClass('animate-search-input');
       	e.stopPropagation();
	});
  $('#login-button').on('click', function(e){
  	e.preventDefault();
         	$('.login-container').fadeIn();
         	e.stopPropagation();
  	});
    $('#login-exit-button').on('click', function(e){

          $('.login-container').fadeOut();

});
$(document).on('click', function(e){
		if( e.target.id != 'searchtext') {

       	$('.search-container').fadeOut();
       	$('#search-button-active').fadeIn();
		    $('#search-button-active').css('color','#fff');
       	$('#search-button-active').css('cursor','pointer');
        $('.search-input').removeClass('animate-search-input');
       	}


	});


});
