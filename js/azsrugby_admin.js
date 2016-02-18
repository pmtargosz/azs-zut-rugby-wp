jQuery(document).ready( function($){

    var mediaUploader;
    //header
    $('#upload-button').on('click',function(e) {
       e.preventDefault();
        if( mediaUploader ){
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Wybierz grafike twojego logotypu',
            button: {
                text: 'Wybierz logo'
            },
            multiple: false
        });

        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#logo-picture').val(attachment.url);
            /*$('#logo-picture-preview').css('background-image', 'url(' + attachment.url + ')');*/
            $('#logo-picture-preview').attr('src', attachment.url);

        });

        mediaUploader.open();

    });

    $('#remove-picture').on('click', function(e){
       e.preventDefault();
        var answer = confirm("Jesteś pewny, że chcesz usunąć logo");
        if(answer == true){
            $('#logo-picture').val('');
            $('.azsrugby-general-form').submit();

        }else{
        }
        return;

    });
///
///
///SLIDER
///
///
var mediaUploader = [];

    $("input").on('click',function(e) {

        var id = this.id;
        var str_id = id.slice(0,24);
        var numer_id = id.slice(24,26);
        var n = Number(numer_id);

        if(str_id == 'upload-button-slider-img' ){
            e.preventDefault();
                if( mediaUploader[n] ){
                    mediaUploader[n].open();
                    return;
                }

            mediaUploader[n] = wp.media.frames.file_frame = wp.media({
                title: 'Wybierz grafike promocyjną',
                button: {
                    text: 'Wybierz grafikę'
                },
                multiple: false
            });

            mediaUploader[n].on('select', function(){
                attachment = mediaUploader[n].state().get('selection').first().toJSON();
                $('#slider-img'+numer_id).val(attachment.url);
                /*$('#logo-picture-preview').css('background-image', 'url(' + attachment.url + ')');*/
                $('#slider-img-preview'+numer_id).attr('src', attachment.url);
            });

        mediaUploader[n].open();

    }

    });

    $("input").on('click', function(e){

        var id = this.id;
        var str_id = id.slice(0,17);
        var numer_id = id.slice(17,19);

        if(str_id == 'remove-slider-img' ){
            e.preventDefault();
            var answer = confirm("Jesteś pewny, że chcesz usunąć grafikę");
                if(answer == true){
                    $('#slider-img'+numer_id).val('');
                    $('.azsrugby-general-form').submit();
                }else{
                        }
        return;
        }
    });


    //promotion
    //

$('#upload-button-img').on('click',function(e) {
       e.preventDefault();
        if( mediaUploader ){
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Wybierz grafike promocyjną',
            button: {
                text: 'Wybierz grafikę'
            },
            multiple: false
        });

        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#promotion-img').val(attachment.url);
            /*$('#logo-picture-preview').css('background-image', 'url(' + attachment.url + ')');*/
            $('#promotion-img-preview').attr('src', attachment.url);

        });

        mediaUploader.open();

    });

    $('#remove-img').on('click', function(e){
       e.preventDefault();
        var answer = confirm("Jesteś pewny, że chcesz usunąć grafikę");
        if(answer == true){
            $('#promotion-img').val('');
            $('.azsrugby-general-form').submit();

        }else{
        }
        return;

    });

    //osiagniecia
    var mediaUploader1;
    $('#upload-button-achievements-logo').on('click',function(e) {
       e.preventDefault();
        if( mediaUploader1 ){
            mediaUploader1.open();
            return;
        }

        mediaUploader1 = wp.media.frames.file_frame = wp.media({
            title: 'Wybierz grafike ',
            button: {
                text: 'Wybierz grafikę'
            },
            multiple: false
        });

        mediaUploader1.on('select', function(){
            attachment = mediaUploader1.state().get('selection').first().toJSON();
            $('#achievements-logo').val(attachment.url);
            /*$('#logo-picture-preview').css('background-image', 'url(' + attachment.url + ')');*/
            $('#achievements-logo-preview').attr('src', attachment.url);

        });

       mediaUploader1.open();

    });

    $('#remove-achievements-logo').on('click', function(e){
       e.preventDefault();
        var answer = confirm("Jesteś pewny, że chcesz usunąć grafikę");
        if(answer == true){
            $('#achievements-logo').val('');
            $('.azsrugby-general-form').submit();

        }else{
        }
        return;

    });

var mediaUploader = [];

    $("input").on('click',function(e) {

        var id = this.id;
        var str_id = id.slice(0,30);
        var numer_id = id.slice(30,32);
        var n = Number(numer_id);

        if(str_id == 'upload-button-achievements-img' ){
            e.preventDefault();
                if( mediaUploader[n] ){
                    mediaUploader[n].open();
                    return;
                }

            mediaUploader[n] = wp.media.frames.file_frame = wp.media({
                title: 'Wybierz grafike promocyjną',
                button: {
                    text: 'Wybierz grafikę'
                },
                multiple: false
            });

            mediaUploader[n].on('select', function(){
                attachment = mediaUploader[n].state().get('selection').first().toJSON();
                $('#achievements-img'+numer_id).val(attachment.url);
                /*$('#logo-picture-preview').css('background-image', 'url(' + attachment.url + ')');*/
                $('#achievements-img-preview'+numer_id).attr('src', attachment.url);
            });

        mediaUploader[n].open();

    }

    });

    $("input").on('click', function(e){

        var id = this.id;
        var str_id = id.slice(0,23);
        var numer_id = id.slice(23,25);

        if(str_id == 'remove-achievements-img' ){
            e.preventDefault();
            var answer = confirm("Jesteś pewny, że chcesz usunąć grafikę");
                if(answer == true){
                    $('#achievements-img'+numer_id).val('');
                    $('.azsrugby-general-form').submit();
                }else{
                        }
        return;
        }
    });


    ///
    ///
    ///FOOTER
    ///
    ///
    ///

    $('#upload-button-footer-img').on('click',function(e) {
       e.preventDefault();
        if( mediaUploader ){
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Wybierz grafike ',
            button: {
                text: 'Wybierz grafikę'
            },
            multiple: false
        });

        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#footer-img').val(attachment.url);
            /*$('#logo-picture-preview').css('background-image', 'url(' + attachment.url + ')');*/
            $('#footer-img-preview').attr('src', attachment.url);

        });

        mediaUploader.open();

    });

    $('#remove-footer-img').on('click', function(e){
       e.preventDefault();
        var answer = confirm("Jesteś pewny, że chcesz usunąć grafikę");
        if(answer == true){
            $('#footer-img').val('');
            $('.azsrugby-general-form').submit();

        }else{
        }
        return;

    });



    ///DODAWANIE ZDJĘĆ DO SPONSORÓW
   /* var str_number = document.getElementsByName("support_number_img_var")[0].value;
*/
    var mediaUploader = [];

    $("input").on('click',function(e) {

        var id = this.id;
        var str_id = id.slice(0,25);
        var numer_id = id.slice(25,27);
        var n = Number(numer_id);

        if(str_id == 'upload-button-support-img' ){
            e.preventDefault();
                if( mediaUploader[n] ){
                    mediaUploader[n].open();
                    return;
                }

            mediaUploader[n] = wp.media.frames.file_frame = wp.media({
                title: 'Wybierz grafike promocyjną',
                button: {
                    text: 'Wybierz grafikę'
                },
                multiple: false
            });

            mediaUploader[n].on('select', function(){
                attachment = mediaUploader[n].state().get('selection').first().toJSON();
                $('#support-img'+numer_id).val(attachment.url);
                /*$('#logo-picture-preview').css('background-image', 'url(' + attachment.url + ')');*/
                $('#support-img-preview'+numer_id).attr('src', attachment.url);
            });

        mediaUploader[n].open();

    }

    });

    $("input").on('click', function(e){

        var id = this.id;
        var str_id = id.slice(0,18);
        var numer_id = id.slice(18,20);

        if(str_id == 'remove-support-img' ){
            e.preventDefault();
            var answer = confirm("Jesteś pewny, że chcesz usunąć grafikę");
                if(answer == true){
                    $('#support-img'+numer_id).val('');
                    $('.azsrugby-general-form').submit();
                }else{
                        }
        return;
        }
    });



});
