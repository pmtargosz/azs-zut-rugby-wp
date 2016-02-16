<!-- obsługa błędów -->
<?php settings_errors(); ?>
<?php
    $img = esc_attr(get_option('achievements_logo'));
    $image = (array)get_option('achievements_img');
    $str_number = get_option('achievements_numb' );
    $number = (int)$str_number;
?>


<form method="post" action="options.php" class="azsrugby-general-form">
    <?php settings_fields('azsrugby-theme-achievements'); ?>
    <?php do_settings_sections('pmtargosz_azsrugby_achievements'); ?>
    <?php submit_button('','primary','btnSubmit'); ?>

</form>

<div class="azsrugby-achiev-preview">
    <img id="achievements-logo-preview" class="achievements-logo" src="<?php print $img;  ?> "/>

    <?php
    for($i=0;$i<$number;$i++){
   echo "<div class='achievements-img'><img id='achievements-img-preview$i'src='$image[$i]'/></div>";

   } ?>
</div>
