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

  var hours = 24; // Reset when storage is more than 24hours
  var now = new Date().getTime();
  var setupTime = localStorage.getItem('setupTime');
  if (setupTime == null) {
      localStorage.setItem('setupTime', now);
  } else {
      if(now-setupTime > hours*60*60*1000) {
          localStorage.clear();
          localStorage.setItem('setupTime', now);
      }
  }
  if(localStorage.getItem('setcokie') != 'shown'){
			jQuery('.cookie').css({
				'display':'block'
			});
			localStorage.setItem('setcokie','shown');
		}

    $('#cookie-ok').on('click', function(){
             $('.cookie').fadeOut();
     });






    $('.mm-szukaj a').on('click', function(e){
    	e.preventDefault();
           	$('.search-container').fadeIn();
            $('.search-input').addClass('animate-search-input');
           	e.stopPropagation();
    	});

    if ($('#wpadminbar').is(':visible')) {
        $('.top').css('top', '32px');
}else{
  $('.top').css('top', '0');
}

});
