<?php

/*
@package azsrugbytheme
--Standart Post Format--
*/
?>
<article id="post-<?php the_ID();?>" <?php post_class('standart-post');?> >
    <header class="entry-header">
        <?php if(has_post_thumbnail()){?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
       <?php }else{ ?>
           <a href="<?php the_permalink(); ?>"><img src="http://localhost/wordpress/wp-content/themes/azs-rugby/img/post_img_ex.jpg"/></a>
        <?php } ?>
    </header>
    <div class="entry-content">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <div class="entry-excerpt">
        <?php the_excerpt(); ?>
        </div>
    </div>  
    <footer class="entry-footer">
        <?php echo azsrugby_posted_footer(); ?>
    </footer>
</article>
        
       