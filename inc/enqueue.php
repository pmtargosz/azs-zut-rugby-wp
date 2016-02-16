<?php

/*
@package azsrugbytheme
    ======================
    ADMIN ENQUEUE FUNCTIONS
    ======================
*/
function azsrugby_load_admin_scripts($hook){

    /*if('toplevel_page_pmtargosz_azsrugby' != $hook ){
        return;
    }*/

    wp_register_style('azsrugby_admin', get_template_directory_uri() . '/css/azsrugby-admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('azsrugby_admin');

    wp_enqueue_media();

    wp_register_script('azsrugby-admin-script', get_template_directory_uri() . '/js/azsrugby_admin.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('azsrugby-admin-script');
}
add_action('admin_enqueue_scripts', 'azsrugby_load_admin_scripts');

/*
    ======================
    FRONT-END ENQUEUE FUNCTIONS
    ======================
*/

function azsrugby_load_scripts(){
     wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all');
     wp_enqueue_style('azsrugby', get_template_directory_uri() . '/css/azsrugby.css', array(), '1.0.0', 'all');
    wp_enqueue_style('bree', 'https://fonts.googleapis.com/css?family=Bree+Serif');


    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', false, '1.12.0', true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true);
    wp_enqueue_script('google-map', get_template_directory_uri() . '/js/google_map.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('my-action', get_template_directory_uri() . '/js/action.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'azsrugby_load_scripts');
