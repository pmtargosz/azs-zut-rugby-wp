<?php

get_header();
?>

<?php   get_template_part('template-parts/main-menu'); ?>

<section class="container page-container">

 <article class="post page">
   <header class="page-title">
     <h2><?php the_title(); ?></h2>
   </header>
   <?php if (have_posts()) : while (have_posts()) : the_post();?>
     <div class="page-img">
       <?php the_post_thumbnail(); ?>
     </div>
     <div class="page-content">
       <?php the_content(); ?>
     </div>
<?php endwhile; endif; ?>
  </article>

</section>




<?php
get_footer();

?>
