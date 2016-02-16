<?php
    /*
        This id the template for the header

        @package azsrugbytheme
    */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>
    <head>
        <meta name="description" content="<?php bloginfo
    ('description');?>">
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="profile" href="http://gmpg.org/xfn/11 ">
        <?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>

        <link rel="icon" href="img/favicon.ico">

        <title><?php bloginfo('name'); wp_title(); ?></title>

        <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header>
        <div class="container-fluid top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-3 header-content">
                        <div class="header-social-container table">
                            <div class="table-cell">
                                <?php if(!esc_attr(get_option('instagram_handler')) && !esc_attr(get_option('youtube_handler'))){?>
                                <div class="header-social-content azsrugby-icon"><h2 class="hide">Instagram</h2>
                                    <a href="https://www.instagram.com/" title="Instagram">
                                        <span class="azsrugby-instagram"></span></a></div>
                                <div class="header-social-content azsrugby-icon"><h2 class="hide">Youtube</h2>
                                    <a href="https://www.youtube.com/" title="Youtube">
                                        <span class="azsrugby-youtube2"></span></a></div>
                                <?php }else{?>
                                <div class="header-social-content azsrugby-icon"><h2 class="hide">Instagram</h2>
                                    <a href="https://www.instagram.com/<?php print esc_attr(get_option('instagram_handler')); ?>" title="Instagram">
                                        <span class="azsrugby-instagram"></span></a></div>
                                <div class="header-social-content azsrugby-icon"><h2 class="hide">Youtube</h2>
                                    <a href="https://www.youtube.com/<?php print esc_attr(get_option('youtube_handler')); ?>" title="Youtube">
                                        <span class="azsrugby-youtube2"></span></a></div>
                                <?php } ?>
                            </div><!--.table-cell-->
                        </div><!--.table-->
                        <div class="header-nav-container table">
                            <div class="table-cell ">
                                <a href="#" class="mobile-nav-button"><span class="mobile-nav-button-icon"></span></a>
                            </div>
                        </div><!--.header-nav-container-->
                    </div><!--instagram youtube mobile menu-->
                    <div class="col-xs-6 header-content text-center">
                        <div class="table">
                            <div class="table-cell">
                                    <?php if(!esc_attr(get_option('page_name_1')) && !esc_attr(get_option('page_name_2')) && !esc_attr(get_option('logo_picture'))){?>
                                    <h1 class="site-title azsrugby-icon">
                                    <?php $completeName = get_bloginfo('name');
                                    $nameParts = explode(" ", $completeName);
                                    echo '<a href="'.home_url().'" title="Strona Główna"><span class="site-title-sample">'.$nameParts[0].' '.$nameParts[1].'</span>'.'<span class="azsrugby-logo-m"></span>'.'<span class="site-title-sample">'.$nameParts[2].'</span></a>';
                                    ?>
                                    </h1>
                                    <?php }else{?>
                                    <h1 class="site-title"><a href="<?php echo home_url();?>" title="Strona Główna">
                                    <span class="hide"><?php bloginfo('name'); ?></span>
                                    <span><?php print esc_attr(get_option('page_name_1'));?></span>
                                    <img class="header-logo" src="<?php print esc_attr(get_option('logo_picture')); ?> "/>
                                    <span><?php print esc_attr(get_option('page_name_2'));?></span>
                                    </a></h1>
                                    <?php } ?>
                            </div><!--.table-cell-->
                        </div>
                    </div><!--logo baner napis-->
                    <div class="col-xs-3 header-content">
                        <div class="header-social-container table pull-right">
                            <div class="table-cell">
                                <?php if(!esc_attr(get_option('facebook_handler')) && !esc_attr(get_option('twitter_handler'))){?>
                                <div class="header-social-content azsrugby-icon"><h2 class="hide">Facebook</h2>
                                    <a href="https://www.facebook.com/" title="Facebook">
                                        <span class="azsrugby-facebook"></span></a>
                                </div>
                                <div class="header-social-content azsrugby-icon"><h2 class="hide">Twitter</h2>
                                    <a href="https://www.twitter.com/" title="Youtube">
                                        <span class="azsrugby-twitter"></span></a>
                                </div>
                                <?php }else{?>
                                <div class="header-social-content azsrugby-icon"><h2 class="hide">Facebook</h2>
                                    <a href="https://www.facebook.com/<?php print esc_attr(get_option('facebook_handler')); ?>" title="Facebook">
                                        <span class="azsrugby-facebook"></span></a></div>
                                <div class="header-social-content azsrugby-icon"><h2 class="hide">Twitter</h2>
                                    <a href="https://www.twitter.com/<?php print esc_attr(get_option('twitter_handler')); ?>" title="Twitter">
                                        <span class="azsrugby-twitter"></span></a></div>
                                <?php } ?>
                            </div><!--.table-cell-->
                        </div><!--.table-->
                         <div class="table header-search-container pull-right">
                            <div class="table-cell">
                                <div class="azsrugby-icon">
                                    <span id="search-button-active" class="azsrugby-search"></span>
                                    <span class="header-nav-title">Login</span>
                                </div>
                            </div>
                        </div><!--search login-->
                    </div><!--search login fb twitter -->
                </div><!--row-->
                <div class="row">
                    <div class="col-xs-12 search-container">
                        <form method="get"  action="#">
                           <fieldset>
                                <input type="search" id="searchtext"  name="s" placeholder="Szukaj">
                                <button type="submit" class="search-button azsrugby-icon"><span class="azsrugby-search"></span></button>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <nav class="nav-mobile-menu">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'mobile_menu',
                                    'container' => false,
                                    'menu_class' => 'mobile-menu'
                                 ));
                            ?>
                        <!-- <?php wp_login_form(); ?> -->
                    </nav>
                </div>
            </div><!--.container-->
        </div><!--.container-fluid-->
        <div class="container main-nav-container">

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
        </div><!--.main-nav-container-->
    </header>
