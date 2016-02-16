<!-- obsługa błędów -->
<?php settings_errors(); ?>
<?php
   //$img = esc_attr(get_option('promotion_img'));
?>


<form method="post" action="options.php" class="azsrugby-general-form">
    <?php settings_fields('azsrugby-theme-quote'); ?>
    <?php do_settings_sections('pmtargosz_azsrugby_quot'); ?>
    <?php submit_button('','primary','btnSubmit'); ?>
    
</form>
