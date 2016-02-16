<?php

/*
@package azsrugbytheme
--achivments--
*/
$image = (array)get_option('achievements_img');
$title = (array)get_option('achievements_img_title');
$imgNum = (array)get_option('achievements_img_numb');

?>

<section class="container achivments-container">
   <div class="achivments-logo"><img src="<?php echo esc_attr(get_option('achievements_logo')); ?>" /></div>
    <div class="achivments-title"> <h2><?php echo esc_attr(get_option('achievements_title')); ?></h2></div>
    <div class="achivments-contents">
        <?php
        $t_numb = get_option('achievements_numb');
        $numb = (int)$t_numb;;
        for($i=0;$i<$numb;$i++){
            ?>
        <div class="achivments-content">
        <?php
            echo "<img src='$image[$i]' />";
            echo "<p>$title[$i]</p>";
            echo "<div class='achivments-numb'>$imgNum[$i]</div>";
            ?>
        </div>

<?php } ?>



    </div>
</section>
