<?php

/*
@package azsrugbytheme
    ===================
    CUSTOM POST TYPE
    ===================
*/

$contact = get_option('activate_contact');
if(@$contact == 1){
    add_action('init', 'azsrugby_contact_custom_post_typ');
    
    add_filter('manage_azsrugby-contact_posts_columns', 'azsrugby_set_contact_columns');
    
    add_action('manage_azsrugby-contact_posts_custom_column', 'azsrugby_contact_custom_column', 10, 2);
    
    add_action('add_meta_boxes', 'azsrugby_contact_add_meta_box');
    
    add_action('save_post', 'azsrugby_save_contact_email_data');
    add_action('save_post', 'azsrugby_save_contact_title_data');
}

/*CONTACT */
function azsrugby_contact_custom_post_typ(){
    $labels = array(
        'name'              => 'Wiadomość',
        'singular_name'     => 'Message',
        'menu_name'         => 'Wiadomość',
        'name_admin_bar'    => 'Message'
    );
    $args = array(
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'menu_position'     => 26,
        'menu_icon'         => 'dashicons-email',
        'supports'          => array('title', 'editor', 'author')
    );
    register_post_type('azsrugby-contact', $args);
}

function azsrugby_set_contact_columns($columns){
    
    $newColumns = array();
    $newColumns['title'] = 'Imię i nazwisko';
    $newColumns['subject'] = 'Temat';
    $newColumns['message'] = 'Wiadomość';
    $newColumns['email'] = 'Email';
    $newColumns['date'] = 'Data';
    return $newColumns;
    
}

function azsrugby_contact_custom_column($column, $post_id){
    
    switch($column){
            
        case 'subject' :
            $title = get_post_meta($post_id, '_contact_title_value_key', true);
            echo $title;
            break;
        case 'message' :
            echo get_the_excerpt();
            break;
        case 'email' :
            $email = get_post_meta($post_id, '_contact_email_value_key', true);
            echo '<a href="mailto:'.$email.'">'.$email.'</a>';
            break;
    }
    
}



/*CONTAT META BOXES*/

function azsrugby_contact_add_meta_box(){
    
    add_meta_box('contact_email', 'Email', 'azsrugby_contact_email_callback', 'azsrugby-contact', 'side');
    add_meta_box('contact_title', 'Tytuł', 'azsrugby_contact_title_callback', 'azsrugby-contact', 'side', 'high');
    
}


/*Title META BOXES*/

function azsrugby_contact_title_callback($post){
    
    wp_nonce_field('azsrugby_save_contact_title_data', 'azsrugby_contact_title_meta_box_nonce');
    $value = get_post_meta($post->ID, '_contact_title_value_key', true);
    
     echo '<label for="azsrugby_contact_title_field"></label>';
    echo '<input type="text" id="azsrugby_contact_title_field" name="azsrugby_contact_title_field" value="' . esc_attr($value) . '" size="25" />';
}

function azsrugby_save_contact_title_data($post_id){
    
     if(!isset($_POST['azsrugby_contact_title_meta_box_nonce'])){
        return;
    }
     if(!wp_verify_nonce($_POST['azsrugby_contact_title_meta_box_nonce'], 'azsrugby_save_contact_title_data')){
        return;
    }
     if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return;
    }
    
    if(!current_user_can('edit_post', $post_id)){
        return;
    }
    if(!isset($_POST['azsrugby_contact_title_field'])){
        return;
    }
    
    $my_date = sanitize_text_field($_POST['azsrugby_contact_title_field']);
    
    update_post_meta($post_id, '_contact_title_value_key',  $my_date);
    
}


/*Mail META BOXES*/
function azsrugby_contact_email_callback($post){
    
    wp_nonce_field('azsrugby_save_contact_email_data', 'azsrugby_contact_email_meta_box_nonce');
    $value = get_post_meta($post->ID, '_contact_email_value_key', true);
    
    echo '<label for="azsrugby_contact_email_field"></label>';
    echo '<input type="email" id="azsrugby_contact_email_field" name="azsrugby_contact_email_field" value="' . esc_attr($value) . '" size="25" />';
    
}

function azsrugby_save_contact_email_data($post_id){
    
    if(!isset($_POST['azsrugby_contact_email_meta_box_nonce'])){
        return;
    }
    
    if(!wp_verify_nonce($_POST['azsrugby_contact_email_meta_box_nonce'], 'azsrugby_save_contact_email_data')){
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return;
    }
    
    if(!current_user_can('edit_post', $post_id)){
        return;
    }
    
    if(!isset($_POST['azsrugby_contact_email_field'])){
        return;
    }
    
    $my_date = sanitize_text_field($_POST['azsrugby_contact_email_field']);
    
    update_post_meta($post_id, '_contact_email_value_key',  $my_date);
}

