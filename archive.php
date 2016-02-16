<?php

get_header();

if (have_posts()):
?>

<h2><?php
    
    if (is_category()){
        echo 'Archiwalne wpisy z kategorii - '; single_cat_title();    
    }elseif( is_tag()){
        single_tag_title();
    }elseif (is_author()){
        the_post();
        echo 'Archiwalne wpisy autora - ' . get_the_author();
        rewind_posts();
    }else{
        echo 'Archiwum:';
    }
    
    ?></h2>

<?php
    while (have_posts()): the_post(); ?>

    <article class="post">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        
        <p class="post-info"><?php the_time('j.m.Y G:i'); ?> autor: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
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
        <p><?php the_excerpt(); ?></p>
    </article>

    <?php endwhile;

    else:
        echo '<p>Nie znaleziono wpisów</p>';
    endif;

get_footer();

?>