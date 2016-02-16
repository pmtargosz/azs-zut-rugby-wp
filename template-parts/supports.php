<?php

/*
@package azsrugbytheme
--Support area--
*/
 $imgs = (array) get_option('support_img_var' );
 $links = (array)get_option('support_img_link_var' );
?>


<section class="container support-container">
	<div class="support-title"><h2><?php echo get_option('support_title_var'); ?></h2></div>
	<div class="support-content">


<?php
$i = 0;
foreach ($imgs as $img) {

?>

<div class="support-item"><a href="<?php echo $links[$i]?>" alt="<?php echo $links[$i]?>"><img src="<?php echo $img ?>"></a></div>
<?php
$i ++;
}
 ?>

	</div>
</section>
