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
		//$('#search-button-active').hide();
       	$('#search-button-active').css('color','#006738');
       	$('#search-button-active').css('cursor','auto');
       	e.stopPropagation();
	});
$(document).on('click', function(e){
		if( e.target.id != 'searchtext') {

       	$('.search-container').fadeOut();
       	$('#search-button-active').fadeIn();
		//$('#search-button-active').show();
		$('#search-button-active').css('color','#fff');
       	$('#search-button-active').css('cursor','pointer');
       	}


	});

});
