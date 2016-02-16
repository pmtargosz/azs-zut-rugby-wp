<!-- obsługa błędów -->
<?php settings_errors(); ?>
<?php
   /*$img = esc_attr(get_option('footer_img'));*/
?>


<form method="post" action="options.php" class="azsrugby-general-form">
    <?php settings_fields('azsrugby-contact-options'); ?>
    <?php do_settings_sections('pmtargosz_azsrugby_contact'); ?>
    <?php submit_button(); ?>
    
</form>


