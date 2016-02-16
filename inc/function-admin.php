<?php

/*
@package azsrugbytheme
    ===================
        ADMIN PAGE
    ===================
*/
//Wywołanie funkcji, która tworzy menu ustawień w panelu administracyjnym wordpressa
add_action('admin_menu', 'azsrugby_add_admin_page');

function azsrugby_add_admin_page(){

    //Tworzenie Panelu Administracyjnego themu "AZS Rugby" w kokpicie wordpressa
    add_menu_page( 'AZS Rugby Theme Options', 'AZS Rugby', 'manage_options', 'pmtargosz_azsrugby', 'azsrugby_theme_settings_header', get_template_directory_uri() . '/img/azsrugby-icon.png', 110);

    //Tworzenie sub menu themu "AZS Rugby" w kokpicie wordpressa
    add_submenu_page('pmtargosz_azsrugby', 'Header Options', 'Hedear', 'manage_options', 'pmtargosz_azsrugby', 'azsrugby_theme_settings_header' );
    add_submenu_page('pmtargosz_azsrugby', 'Theme Options', 'Theme Options', 'manage_options', 'pmtargosz_azsrugby_theme', 'azsrugby_theme_settings_theme' );
    add_submenu_page('pmtargosz_azsrugby', 'Slider Options', 'Slider', 'manage_options', 'pmtargosz_azsrugby_slider', 'azsrugby_theme_settings_slider' );
    add_submenu_page('pmtargosz_azsrugby', 'Quot Options', 'Cytat', 'manage_options', 'pmtargosz_azsrugby_quot', 'azsrugby_theme_settings_quot' );
    add_submenu_page('pmtargosz_azsrugby', 'Promotion Options', 'Promotion', 'manage_options', 'pmtargosz_azsrugby_promotion', 'azsrugby_theme_settings_promotion' );
    add_submenu_page('pmtargosz_azsrugby', 'Achievements', 'Osiągnięcia', 'manage_options', 'pmtargosz_azsrugby_achievements', 'azsrugby_theme_settings_achievements' );
    add_submenu_page('pmtargosz_azsrugby', 'Support', 'Sponsorzy', 'manage_options', 'pmtargosz_azsrugby_support', 'azsrugby_theme_settings_support' );
    add_submenu_page('pmtargosz_azsrugby', 'Contact Form Options', 'Contact Form', 'manage_options', 'pmtargosz_azsrugby_contact', 'azsrugby_theme_settings_contact' );

    //Aktywacja ustawień użytkownika
    add_action('admin_init', 'azsrugby_custom_settings');
}

//Zdefiniowanie ustawień, które użytkownik może zmieniać w theme
function azsrugby_custom_settings(){
    //Deklaracja zmiennych, które przechowują zmiany(ustawienia) użytkownika Header Options
    register_setting('azsrugby-settings-group', 'page_name_1');
    register_setting('azsrugby-settings-group', 'page_name_2');
    register_setting('azsrugby-settings-group', 'logo_picture');
    register_setting('azsrugby-settings-group', 'twitter_handler', 'azsrugby_sanitize_twitter_handler');
    register_setting('azsrugby-settings-group', 'facebook_handler');
    register_setting('azsrugby-settings-group', 'instagram_handler');
    register_setting('azsrugby-settings-group', 'youtube_handler');

    //Dodanie sekcji ustawień ('unikalny id', 'nazwa sekcji wyswietlana w panelu', 'nazwa funkcji', 'link do strony na której ma się wyświetlić sekcja')
    add_settings_section('azsrugby-header-options', 'Ustawienia nagłówka(header) strony(motywu)', 'azsrugby_header_options', 'pmtargosz_azsrugby');
    //Dodanie pól w sekcji ('unikalne id', 'nazwa pola', 'nazwa funkcji', 'linka/adress', 'nazwa id sekcji dla ktorej sa do pola do ustawien')
    add_settings_field('header-name', 'Nazwa strony ', 'azsrugby_header_name', 'pmtargosz_azsrugby', 'azsrugby-header-options');
    add_settings_field('header-logo-picture', 'Logo', 'azsrugby_header_logo', 'pmtargosz_azsrugby', 'azsrugby-header-options');
    add_settings_field('header-twitter', 'Twitter', 'azsrugby_header_twitter', 'pmtargosz_azsrugby', 'azsrugby-header-options');
    add_settings_field('header-facebook', 'Facebook', 'azsrugby_header_facebook', 'pmtargosz_azsrugby', 'azsrugby-header-options');
    add_settings_field('header-instagram', 'Instagram', 'azsrugby_header_instagram', 'pmtargosz_azsrugby', 'azsrugby-header-options');
    add_settings_field('header-youtube', 'Youtube', 'azsrugby_header_youtube', 'pmtargosz_azsrugby', 'azsrugby-header-options');

    //Theme Options
    register_setting('azsrugby-theme-settings', 'post_formats');
    register_setting('azsrugby-theme-settings', 'custom_header');
    register_setting('azsrugby-theme-settings', 'custom_background');
    register_setting('azsrugby-theme-settings', 'footer_img');

    add_settings_section('azsrugby-theme-options', 'Ustawienia Motywu', 'azsrugby_theme_options', 'pmtargosz_azsrugby_theme');

    add_settings_field('post-formats', 'Aktywuj wybrane formaty postów', 'azsrugby_post_formats', 'pmtargosz_azsrugby_theme', 'azsrugby-theme-options');
    add_settings_field('custom-header', 'Ustawienia header', 'azsrugby_custom_header', 'pmtargosz_azsrugby_theme', 'azsrugby-theme-options');
    add_settings_field('custom-background', 'Ustawienia background', 'azsrugby_custom_background', 'pmtargosz_azsrugby_theme', 'azsrugby-theme-options');
    add_settings_field('custom-footer-img', 'Ustaw grafike footera', 'azsrugby_custom_footer_img', 'pmtargosz_azsrugby_theme', 'azsrugby-theme-options');

    //Quote options
    register_setting('azsrugby-theme-quote', 'quote_title');
    register_setting('azsrugby-theme-quote', 'quote_author');

    add_settings_section('azsrugby-quot', 'Ustawienie cytatu', 'azsrugby_quot_section', 'pmtargosz_azsrugby_quot');

    add_settings_field('quot-title', 'Cytat: ', 'q_title', 'pmtargosz_azsrugby_quot', 'azsrugby-quot');
    add_settings_field('quote-author', 'Autor ', 'q_author', 'pmtargosz_azsrugby_quot', 'azsrugby-quot');

    //Promotion Options
    register_setting('azsrugby-theme-promotion', 'promotion_on_off');
    register_setting('azsrugby-theme-promotion', 'promotion_movie_link');
    register_setting('azsrugby-theme-promotion', 'promotion_img');
    register_setting('azsrugby-theme-promotion', 'promotion_title');
    register_setting('azsrugby-theme-promotion', 'promotion_button_url');
    register_setting('azsrugby-theme-promotion', 'promotion_button_title');

    add_settings_section('azsrugby-promotion-section', 'Ustawienia sekcji Promocji', 'azsrugby_promotion_section', 'pmtargosz_azsrugby_promotion');

    add_settings_field('promotion-on-off', 'Włącz/Wyłącz sekcję ', 'azsrugby_promotion_on_off', 'pmtargosz_azsrugby_promotion', 'azsrugby-promotion-section');
    add_settings_field('promotion-movie', 'Link URL do filmiku z sefwisu YT ', 'azsrugby_promotion_movie', 'pmtargosz_azsrugby_promotion', 'azsrugby-promotion-section');
    add_settings_field('promotion-img', 'Grafika promocyjna do wyświetlenia ', 'azsrugby_promotion_img', 'pmtargosz_azsrugby_promotion', 'azsrugby-promotion-section');
    add_settings_field('promotion-title', 'Slogan promocyjny ', 'azsrugby_promotion_title', 'pmtargosz_azsrugby_promotion', 'azsrugby-promotion-section');
    add_settings_field('promotion-button-title', 'Napis na przycisku ', 'azsrugby_promotion_button_title', 'pmtargosz_azsrugby_promotion', 'azsrugby-promotion-section');
    add_settings_field('promotion-button', 'Link do przekierowania na stronę z dodatkowymi informacjami ', 'azsrugby_promotion_button', 'pmtargosz_azsrugby_promotion', 'azsrugby-promotion-section');

     //ACIVMENTS
    register_setting('azsrugby-theme-achievements', 'achievements_triger');
    register_setting('azsrugby-theme-achievements', 'achievements_logo');
    register_setting('azsrugby-theme-achievements', 'achievements_title');
    register_setting('azsrugby-theme-achievements', 'achievements_numb');
    register_setting('azsrugby-theme-achievements', 'achievements_img');
    register_setting('azsrugby-theme-achievements', 'achievements_img_title');
    register_setting('azsrugby-theme-achievements', 'achievements_img_numb');
    register_setting( $option_group, $option_name, $sanitize_callback );

    add_settings_section('azsrugby-achievements-section', 'Ustawienia sekcji "Osiągnięcia"', 'azsrugby_achievements_section', 'pmtargosz_azsrugby_achievements');

    add_settings_field('achievements-triger', 'Włącz/Wyłącz sekcję ', 'azsrugby_achievements_triger', 'pmtargosz_azsrugby_achievements', 'azsrugby-achievements-section');
    add_settings_field('achievements-logo', 'Grafika do sekcji osiągnięcia ', 'azsrugby_achievements_logo', 'pmtargosz_azsrugby_achievements', 'azsrugby-achievements-section');
    add_settings_field('achievements-title', 'Tytuł sekcji ', 'azsrugby_achievements_title', 'pmtargosz_azsrugby_achievements', 'azsrugby-achievements-section');
    add_settings_field('achievements-numb', 'Liczba osiągnięć', 'azsrugby_achievements_numb', 'pmtargosz_azsrugby_achievements', 'azsrugby-achievements-section');
    add_settings_field('achievements-img', 'Grafika osiągnięcia', 'azsrugby_achievements_img', 'pmtargosz_azsrugby_achievements', 'azsrugby-achievements-section');
    add_settings_field('achievements-img-title', 'Podpis pod grafiką', 'azsrugby_achievements_img_title', 'pmtargosz_azsrugby_achievements', 'azsrugby-achievements-section');
    add_settings_field('achievements-img-numb', 'Ilość', 'azsrugby_achievements_img_numb', 'pmtargosz_azsrugby_achievements', 'azsrugby-achievements-section');

    //
    //Support
    //
    register_setting( 'azsrugby-theme-support', 'support_triger_var' );
    register_setting( 'azsrugby-theme-support', 'support_number_img_var' );
    register_setting( 'azsrugby-theme-support', 'support_img_var' );
    register_setting( 'azsrugby-theme-support', 'support_title_var' );
    register_setting( 'azsrugby-theme-support', 'support_img_link_var' );

    add_settings_section( 'azsrugby-support-section', 'Ustawienia sekcji "Support"', 'azsrugby_support_section', 'pmtargosz_azsrugby_support' );

    add_settings_field( 'support-triger', 'Aktywuj sekcję "Support"', 'support_triger', 'pmtargosz_azsrugby_support', 'azsrugby-support-section');
    add_settings_field( 'support-title', 'Nazwa sekcji: ', 'support_title', 'pmtargosz_azsrugby_support', 'azsrugby-support-section');
    add_settings_field( 'support-number-img', 'Liczba logotypów', 'support_number_img', 'pmtargosz_azsrugby_support', 'azsrugby-support-section');
    add_settings_field( 'support-img', 'Wybierz logotyp: ', 'support_img', 'pmtargosz_azsrugby_support', 'azsrugby-support-section');
    add_settings_field( 'support-img-link', 'Podaj adres strony sponsorów: ', 'support_img_link', 'pmtargosz_azsrugby_support', 'azsrugby-support-section');

    //Contact Form Options
    register_setting('azsrugby-contact-options', 'activate_contact');

    add_settings_section('azsrugby-contact-section', 'Ustawienia Formularza Kontaktowego', 'azsrugby_contact_section', 'pmtargosz_azsrugby_contact');
    add_settings_field('activate-form', 'Aktywuj Formularz Kontaktowy', 'azsrugby_activate_contact', 'pmtargosz_azsrugby_contact', 'azsrugby-contact-section');

}

function azsrugby_support_section(){
    echo 'Opcje do personalizacji:';
}
function azsrugby_quot_section(){
    echo 'Ustaw cytat: ';
}
function azsrugby_achievements_section(){
    echo 'Opcje do personalizacji: ';
}
function azsrugby_promotion_section(){
    echo 'Opcje do personalizacji: ';
}
function azsrugby_contact_section(){
    echo 'Opcje:';
}
function azsrugby_theme_options(){
    echo 'Dostępne opcje:';
}
function azsrugby_header_options(){
    echo 'Dostępne ustawienia:';
}
//
//
//SUPPORT FUNCTIONS
//
//
function support_triger(){
    $triger = get_option( 'support_triger_var' );
    $checked = (@$triger == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="support-triger-var" name="support_triger_var" value="1" '.$checked.' /></label>';
}

function support_title(){
    $title = esc_attr(get_option('support_title_var'));
    echo '<input type="text" name="support_title_var" value="'.$title.'" placeholder="Wspieraj a nas" /><p class="description">Nazwa, która ma się wyświetlać na stronie</p>';
}

function support_number_img(){
    $number = get_option('support_number_img_var' );
    echo '<label><input type="text" style="width: 40px;text-align:center;" name="support_number_img_var" value="'.$number.'" placeholder="2" /><p class="description">Wpisz ilość sponsorów</p></label>';
}
function support_img_link(){
    $links = (array)get_option('support_img_link_var' );
    $str_number = get_option('support_number_img_var' );
    $number = (int)$str_number;

    for($i=0;$i<$number;$i++){
        $link = esc_attr( $links[$i] );
        $v = $i + 1;

        echo "<input type='text'name='support_img_link_var[$i]' value='$link' placeholder='http://www.azsrugby.zut.edu.pl' /><p class='description'>Wpisz adres streony sponsora</p>";
    }

}
function support_img(){
    $imgs = (array) get_option('support_img_var' );
    $str_number = get_option('support_number_img_var' );
    $number = (int)$str_number;

    for($i=0;$i<$number;$i++){
        $img = esc_attr( $imgs[$i] );
        $v = $i + 1;
        if(empty ($img)){
        echo "<input  'type='button' class='button button-secondary' value='Upload img' id='upload-button-support-img$i' /><input type='hidden' id='support-img$i' name='support_img_var[$i]' value=''  /><p style='margin-bottom:80px;' class='description'/>Dodaj grafike - $v</p>";

    }else{
        echo "<input type='button' class='button button-secondary' value='Zmień grafikę' id='upload-button-support-img$i' /><input type='hidden' id='support-img$i' name='support_img_var[$i]' value='$img'  /> <input type='button' class='button button-secondary' value='Usuń grafikę'' id='remove-support-img$i' /> <p style='margin-bottom:80px;' class='description'>Zmień lub usuń swoją grafikę - $v</p>";
        }

    }

}
//
//
//ACHIVMENTS functions
//
//
function azsrugby_achievements_triger(){

    $options = get_option('achievements_triger');
    $checked = ( @$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="achievements-triger" name="achievements_triger" value="1" '.$checked.' /></label>';
}
function azsrugby_achievements_logo(){
    $img = esc_attr(get_option('achievements_logo'));
    if(empty ($img)){
        echo '<input type="button" class="button button-secondary" value="Upload img" id="upload-button-achievements-logo" /><input type="hidden" id="achievements-logo" name="achievements_logo" value=""  /><p class="description"/>Dodaj grafikę promocyjną</p>';
    }else{
        echo '<input type="button" class="button button-secondary" value="Zmień grafikę" id="upload-button-achievements-logo" /><input type="hidden" id="achievements-logo" name="achievements_logo" value="'.$img.'"  /> <input type="button" class="button button-secondary" value="Usuń grafikę" id="remove-achievements-logo" /> <p class="description">Zmień lub usuń swoją grafikę</p>';
    }
}
function azsrugby_achievements_title(){
    $title = esc_attr(get_option('achievements_title'));
    echo '<input type="text" style="width: 320px;" name="achievements_title" value="'.$title.'" placeholder="Osiągnięcia" /><p class="description">Wpisz nazwę dla sekcji</p>';
}
function azsrugby_achievements_numb(){
    $numb = esc_attr(get_option('achievements_numb'));
    echo '<input type="text" style="width: 35px;text-align: center;" name="achievements_numb" value="'.$numb.'" placeholder="3" /><p class="description">Liczba o siągnięć</p>';
}

function azsrugby_achievements_img(){

    $imgs = (array) get_option('achievements_img' );
    $str_number = get_option('achievements_numb' );
    $number = (int)$str_number;

    for($i=0;$i<$number;$i++){
        $img = esc_attr( $imgs[$i] );
        $v = $i + 1;
        if(empty ($img)){
        echo "<input type='button' class='button button-secondary' value='Upload img' id='upload-button-achievements-img$i' /><input type='hidden' id='achievements-img$i' name='achievements_img[$i]' value=''  /><p style='margin-bottom:85px;' class='description'/>Dodaj grafikę - $v</p>";

    }else{
        echo "<input type='button' class='button button-secondary' value='Zmień grafikę' id='upload-button-achievements-img$i' /><input type='hidden' id='achievements-img$i' name='achievements_img[$i]' value='$img'  /> <input type='button' class='button button-secondary' value='Usuń grafikę'' id='remove-achievements-img$i' /> <p style='margin-bottom:85px;' class='description'>Zmień lub usuń grafikę - $v</p>";
        }

    }
}

function azsrugby_achievements_img_title(){

    $titles = (array) get_option('achievements_img_title');
    $str_number = get_option('achievements_numb' );
    $number = (int)$str_number;

    for($i=0;$i<$number;$i++){
        $title = esc_attr( $titles[$i] );
        $v = $i + 1;
        echo "<input type='text' style='width: 320px;'' name='achievements_img_title[$i]' value='$title' placeholder='Podpis' /><p class='description'>Tytuł osiągnięcia - $v</p>";
    }
}

function azsrugby_achievements_img_numb(){

    $imgs_numb = (array) get_option('achievements_img_numb');
    $str_number = get_option('achievements_numb' );
    $number = (int)$str_number;

    for($i=0;$i<$number;$i++){
        $img_numb = esc_attr( $imgs_numb[$i] );
        $v = $i + 1;
        echo "<input type='text' style='width: 40px; text-align:center;' name='achievements_img_numb[$i]' value='$img_numb' placeholder='2' /><p class='description'>Ilość zdobytych danych osiągnięć - $v</p>";
    }
}
//
//
//Quots functions
//
//
function q_title(){
    $quot_t = esc_attr(get_option('quote_title'));
    echo '<input type="text" style="width: 320px;" name="quote_title" value="'.$quot_t.'" placeholder="Rugby jest jak życie..." /><p class="description">Wpisz ulubiony cytat</p>';
}

function q_author(){
    $quot_a = esc_attr(get_option('quote_author'));
    echo '<input type="text" name="quote_author" value="'.$quot_a.'" placeholder="Paweł Targosz" /><p class="description">Wpisz autora cytatu</p>';
}

//
//
//Promotions functions
//
//
function azsrugby_promotion_on_off(){

    $options = get_option('promotion_on_off');
    $checked = ( @$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="promotion-on-off" name="promotion_on_off" value="1" '.$checked.' /></label>';
}

function azsrugby_promotion_movie(){
     $movie_url = esc_attr(get_option('promotion_movie_link'));
    echo '<input type="text" style="width: 320px;" name="promotion_movie_link" value="'.$movie_url.'" placeholder="https://www.youtube.com" /><p class="description">Wpisz/wklej cały link do filmiku z serwisu youtube</p>';

}
function azsrugby_promotion_img(){
    $img = esc_attr(get_option('promotion_img'));
    if(empty ($img)){
        echo '<input type="button" class="button button-secondary" value="Upload img" id="upload-button-img" /><input type="hidden" id="promotion-img" name="promotion_img" value=""  /><p class="description"/>Dodaj grafikę promocyjną</p>';
    }else{
        echo '<input type="button" class="button button-secondary" value="Zmień grafikę" id="upload-button-img" /><input type="hidden" id="promotion-img" name="promotion_img" value="'.$img.'"  /> <input type="button" class="button button-secondary" value="Usuń grafikę" id="remove-img" /> <p class="description">Zmień lub usuń swoją grafikę</p>';
    }
}
function azsrugby_promotion_title(){
     $promo_title = esc_attr(get_option('promotion_title'));
    echo '<input type="text" style="width: 320px;" name="promotion_title" value="'.$promo_title.'" placeholder="RUGBY jest wspaniałe" /><p class="description">Wpisz swój slogan promocyjny</p>';
}
function azsrugby_promotion_button_title(){
     $promo_button = esc_attr(get_option('promotion_button_title'));
    echo '<input type="text"" name="promotion_button_title" value="'.$promo_button.'" placeholder="Pierwsze korki" /><p class="description">Wpisz tekst, ktory ma się wyświetlić</p>';
}
function azsrugby_promotion_button(){
     $promo_button = esc_attr(get_option('promotion_button_url'));
    echo '<input type="text" style="width: 320px;" name="promotion_button_url" value="'.$promo_button.'" placeholder="https://www.link_do_strony.pl" /><p class="description">Wpisz/wklej pełen link do strony, gdzie można znaleźć więcej informacji</p>';
}
//
//
//Contact form function
//
//
function azsrugby_activate_contact(){
    $options = get_option('activate_contact');
    $checked = ( @$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
}
//
//
//Theme option function
//
//
function azsrugby_post_formats(){

    $options = get_option('post_formats');
    $formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
    $output = '';
    foreach($formats as $format){
        $checked = ( @$options[$format] == 1 ? 'checked' : '');
        $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format. '</label><br>';
    }
    echo $output;
}
function azsrugby_custom_header(){

    $options = get_option('custom_header');
    $checked = ( @$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Uaktywni dostosowanie nagłówka do swoich potrzeb</label>';
}
function azsrugby_custom_background(){
    $options = get_option('custom_background');
    $checked = ( @$options == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Uaktywni dostosowanie tła do swoich potrzeb</label>';
}
  function azsrugby_custom_footer_img(){
    $picture = esc_attr(get_option('footer_img'));
    if(empty ($picture)){
        echo '<input type="button" class="button button-secondary" value="Upload Logo" id="upload-button-footer-img" /><input type="hidden" id="footer-img" name="footer_img" value=""  /><p class="description"/>Dodaj swoje logo</p>';
    }else{
        echo '<input type="button" class="button button-secondary" value="Zmień Logo" id="upload-button-footer-img" /><input type="hidden" id="footer-img" name="footer_img" value="'.$picture.'"  /> <input type="button" class="button button-secondary" value="Usuń Logo" id="remove-footer-img" /> <p class="description">Zmień lub usuń swoje logo</p>';
    }
}
//
//
//Header Options functions
//
//
function azsrugby_header_name(){
    $pageName1 = esc_attr(get_option('page_name_1'));
    $pageName2 = esc_attr(get_option('page_name_2'));
    echo '<input type="text" name="page_name_1" value="'.$pageName1.'" placeholder="np. AZS" /> <input type="text" name="page_name_2" value="'.$pageName2.'" placeholder="np. ZUT" /><p class="description">Proszę podać nazwę strony jaka ma się pojawić w headerze strony. Można nazwę podać w jednej rubryce';
}
function azsrugby_header_logo(){
    $picture = esc_attr(get_option('logo_picture'));
    if(empty ($picture)){
        echo '<input type="button" class="button button-secondary" value="Upload Logo" id="upload-button" /><input type="hidden" id="logo-picture" name="logo_picture" value=""  /><p class="description"/>Dodaj swoje logo</p>';
    }else{
        echo '<input type="button" class="button button-secondary" value="Zmień Logo" id="upload-button" /><input type="hidden" id="logo-picture" name="logo_picture" value="'.$picture.'"  /> <input type="button" class="button button-secondary" value="Usuń Logo" id="remove-picture" /> <p class="description">Zmień lub usuń swoje logo</p>';
    }
}
function azsrugby_header_twitter(){
    $twitter = esc_attr(get_option('twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter" /><p class="description">Wpisz swoją nazwę użytkownika do konta na Twitterze bez @</p>';
}
function azsrugby_header_facebook(){
    $facebook = esc_attr(get_option('facebook_handler'));
    echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook" /><p class="description">Wpisz swój link do fanpage np. https://www.facebook.com/(nazwa_nazwa)</p>';
}
function azsrugby_header_instagram(){
    $instagram = esc_attr(get_option('instagram_handler'));
    echo '<input type="text" name="instagram_handler" value="'.$instagram.'" placeholder="Instagram" /><p class="description">Wpisz swoją nazwę użytkownika do konta na Instagramie</p>';
}
function azsrugby_header_youtube(){
    $youtube = esc_attr(get_option('youtube_handler'));
    echo '<input type="text" name="youtube_handler" value="'.$youtube.'" placeholder="Youtube" /><p class="description">Wpisz swoją nazwę użytkownika do konta na Youtube</p>';
}

//Sanitization setting
function azsrugby_sanitize_twitter_handler($input){
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output);
    return $output;
}
//
//Template submenu functions
//Funkcja, która tworzy warstwe prezentacji ustawień motywu (AZS Rugby Ustawienia)
//
//
function azsrugby_theme_settings_header(){
    require_once( get_template_directory() . '/inc/tamplates/azsrugby-admin.php');
}
function azsrugby_theme_settings_slider(){
    require_once( get_template_directory() . '/inc/tamplates/azsrugby-slider-settings.php');
}
function azsrugby_theme_settings_quot(){
    require_once( get_template_directory() . '/inc/tamplates/azsrugby-quot-settings.php');
}
function azsrugby_theme_settings_promotion(){
    require_once( get_template_directory() . '/inc/tamplates/azsrugby-promotion-settings.php');
}
function azsrugby_theme_settings_achievements(){
    require_once( get_template_directory() . '/inc/tamplates/azsrugby-achievements-settings.php');
}
function azsrugby_theme_settings_support(){
    require_once( get_template_directory() . '/inc/tamplates/azsrugby-support-settings.php');
}
function azsrugby_theme_settings_theme(){
    require_once( get_template_directory() . '/inc/tamplates/azsrugby-theme-settings.php');
}
function azsrugby_theme_settings_contact(){
    require_once( get_template_directory() . '/inc/tamplates/azsrugby-theme-contact.php');
}

