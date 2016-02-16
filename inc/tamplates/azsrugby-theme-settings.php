<!-- obsługa błędów -->
<?php settings_errors(); ?>
<?php
  $img = esc_attr(get_option('footer_img'));
?>


<form method="post" action="options.php" class="azsrugby-general-form">
    <?php settings_fields('azsrugby-theme-settings'); ?>
    <?php do_settings_sections('pmtargosz_azsrugby_theme'); ?>
    <?php submit_button('','primary','btnSubmit'); ?>
    
</form>
<div class="azsrugby-promotion-preview">
    <img id="footer-img-preview" class="promotion-img" src="<?php print $img;  ?> "/>
</div>