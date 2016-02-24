<?php

get_header();
 ?>
 <?php   get_template_part('template-parts/main-menu'); ?>
<section class="container page-container">


    <article class="post-blog">
      <div class="post-info">


        <h2><?php the_title(); ?></a></h2>

        <p><?php the_time('j.m.Y G:i'); ?>:
        <?php
            $categories = get_the_category();
            $separator = ", ";
            $output = '';

            if($categories){

                foreach($categories as $category){

                    $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;

                }

                echo trim($output, $separator);
            }
            ?>

        </p>
          </div>
          <?php if (have_posts()) : while (have_posts()) : the_post();?>
            <div class="single-post-img">
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
