<?php

/*
@package azsrugbytheme
--promotion--
*/

?>

<section class="container promotion-container">
    <div class="promotion-movie">
        <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" width="560" height="315" src="<?php echo esc_attr(get_option('promotion_movie_link')); ?>" frameborder="0"> </iframe>
        </div>
    </div>
    <div class="promotion-content">
        <img src="<?php echo esc_attr(get_option('promotion_img')); ?>" />
        <h2><?php echo esc_attr(get_option('promotion_title')); ?></h2>
        <div class="promotion-button"><a href="<?php echo esc_attr(get_option('promotion_button_url')); ?>"><?php echo esc_attr(get_option('promotion_button_title')); ?></a></div>
    </div>
</section>
