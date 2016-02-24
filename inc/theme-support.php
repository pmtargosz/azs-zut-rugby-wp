<?php

/*
@package azsrugbytheme
    ===================
        THEME SUPPORT
    ===================
*/

$options = get_option('post_formats');
    $formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
    $output = array();
    foreach($formats as $format){
        $output[] = ( @$options[$format] == 1 ? $format : '');
    }
if(!empty($options)){
    add_theme_support('post-formats', $output);
}

$header = get_option('custom_header');
if(@$header == 1){
    add_theme_support('custom-header');
}
$background = get_option('custom_background');
if(@$background == 1){
    add_theme_support('custom-background');
}

add_theme_support('post-thumbnails');


/*EXPERT CHANE*/

function new_excerpt_length($length) {
	return 4;
}
add_filter('excerpt_length', 'new_excerpt_length');

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sekcja Wspierają Nas',
		'id'            => 's_wspieraja',
		'before_widget' => '<div class="wspieraja">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );
/* Activate Nav Menu Options*/

function azsrugby_register_nav_menu(){
    register_nav_menu('mobile_menu', 'Menu mobilne');
    register_nav_menu('header_menu', 'Główne menu w części nagłówka');
}
add_action('after_setup_theme', 'azsrugby_register_nav_menu');
/*
  Dodanie login logout do mobile menu
  */
  //Add login/logout link to naviagation menu
function add_login_out_item_to_menu( $items, $args ){

	//change theme location with your them location name
	if( is_admin() ||  $args->theme_location != 'mobile_menu' )
		return $items;

	$redirect = ( is_home() ) ? false : get_permalink();
	if( is_user_logged_in( ) )

		$link = '<a href="' . wp_logout_url( $redirect ) . '" title="' .  __( 'Logout' ) .'">' . __( 'Wyloguj' ) . '</a>';
	else  $link = '<a href="' . wp_login_url( $redirect  ) . '" title="' .  __( 'Login' ) .'">' . __( 'Zaloguj' ) . '</a>';

	return $items.= '<li id="log-in-out-link" class="menu-item menu-type-link">'. $link . '</li>';
}add_filter( 'wp_nav_menu_items', 'add_login_out_item_to_menu', 10, 2 );



/*
    BLOG LOOP FUNCTION CUSTOM
*/
function azsrugby_posted_footer(){
    $categories = get_the_category();
    $separator = ', ';
    $output = '';
    $i =1;

    if(!empty($categories)):
        foreach($categories as $category):
            if($i>1):$output .= $separator; endif;
        $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>';
        $i++;
        endforeach;
    endif;

    $comments_num = get_comments_number();

    return '<span class="posted-on">'. get_the_time('j.m.Y G:i', $post->ID) . '</span> <span class="posted-cat">' . $output . '</span><span class="posted-coment"> '.$comments_num.' </span> <span class="azsrugby-icon azsrugby-bubble"></span>';

}
