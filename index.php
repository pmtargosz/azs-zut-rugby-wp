<?php
/*
   @package azsrugbytheme
    */
get_header();

?>

<section class="container slider">
    <div class="slider-frame-top">
        <div class="slider-frame-title table"><div class="table-cell"><h2 class="slider-title">Wygrana w Gnieźnie</h2></div></div>
    </div>
        <div class="slider-image" style="background: url(http://localhost/wordpress/wp-content/themes/azs-rugby/img/1.jpg) no-repeat center center; background-size:cover"></div>
    <p>“Dnia 16 lutekgo 2013 roku w Gnieźnie odbył...”</p>
    <div class="slider-frame-bottom">
        <div class="slider-dots">
            <ul>
                <li>&bull;</li>
                <li>&bull;</li>
                <li>&bull;</li>
                <li>&bull;</li>
            </ul>
    </div>
        <span class="slider-button">Czytaj artykuł</span>
    </div>
</section>
<section class="container quote-container">
    <div class="quote-content">
        <div class="table">
            <div class="table-cell">
                <h2>“<?php echo esc_attr(get_option('quote_title')); ?>”</h2>
                <p><?php echo esc_attr(get_option('quote_author')); ?></p>
            </div>
        </div>
    </div>
    <div class="quote-container-shadow"></div>
</section>
<section class="container main-container">
    <div class="categorie-container">
                <?php
                $args = array(
                'orderby' => 'name',
                'parent' => 0,
                'hide_empty' => 1
                );
                $categories = get_categories( $args );
                foreach ( $categories as $category ) {
                    echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';}?>
            </div>
    <div class="posts-container">
            <?php
                if(have_posts()):
                    while(have_posts()): the_post(); ?>
                        <?php get_template_part('template-parts/content', get_post_format());?>

                    <?php endwhile;
                endif;
            ?>
        </div>
    <div class="navigation"><p><?php posts_nav_link(' ','Nowsze artykuły','Starsze artykuły'); ?></p></div>
</section>

<?php
    $promo = get_option('promotion_on_off');
    if(@$promo == 1){
        get_template_part('template-parts/promotion');
    }
    ?>
<?php
    $options = get_option('achievements_triger');
    if(@$options == 1){
        get_template_part('template-parts/achievements');
    }
    ?>

<?php
get_footer();

?>
