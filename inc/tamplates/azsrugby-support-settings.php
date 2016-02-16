<!-- obsługa błędów -->
<?php settings_errors(); ?>
<?php
   /* $img = esc_attr(get_option('support_img_var'));*/
    $image = (array)get_option('support_img_var');
    $str_number = get_option('support_number_img_var' );
    $number = (int)$str_number;
?>

<form method="post" action="options.php" class="azsrugby-general-form">
    <?php settings_fields('azsrugby-theme-support'); ?>
    <?php do_settings_sections('pmtargosz_azsrugby_support'); ?>
    <?php submit_button('','primary','btnSubmit'); ?>

</form>

<div class="azsrugby-support-preview">

<?php
    for($i=0;$i<$number;$i++){
      ?>
    <img id="support-img-preview<?php echo $i ?>" class="support-img" src="<?php echo $image[$i] ?>" />

 <?php  } ?>
</div>
