<?php
/*
   @package azsrugbytheme
    */
get_header();
?>
<section class="container main-nav-container">

    <div class="logo">
        <a href="<?php echo home_url();?>" title="Strona Główna"><img class="logo-img" src="<?php header_image();?>"/></a>
    </div><!--.logo-->
    <nav class="navbar navbar-deafult navbar-azsrugby">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'header_menu',
                    'container' => false,
                    'menu_class' => 'nav navbar-nav'
                ));
            ?>
    </nav>
</section>

<?php   get_template_part('template-parts/slider'); ?>

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
