<?php
/*
   @package azsrugbytheme
   MAIN MENU
    */

?>
<section class="container manin-menu-page">

    <div class="manin-menu-page-logo">
        <a href="<?php echo home_url();?>" title="Strona Główna"><img class="logo-img" src="<?php header_image();?>"/></a>
    </div><!--.logo-->
    <nav class="navbar navbar-deafult main-menu-page-nav">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'header_menu',
                    'container' => false,
                    'menu_class' => 'nav navbar-nav '
                ));
            ?>
    </nav>
</section>
