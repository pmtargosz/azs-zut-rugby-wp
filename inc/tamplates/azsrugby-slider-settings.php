<!-- obsługa błędów -->
<?php settings_errors(); ?>
<?php
   // $picture = esc_attr(get_option('logo_picture'));
?>


<form method="post" action="options.php" class="azsrugby-general-form">
    <!-- wyswietlenie wszystkich zdefiniowanych ustawień(sekcji i pól) dla danego id sekcji w tym przypadku azsrugby-settings-group -->
    <?php //settings_fields('azsrugby-settings-group'); ?>
    <!-- ustawienie zapisanych danych wprowadzonych przez uzytkownika w polach danej sekcji -->
    <?php //do_settings_sections('pmtargosz_azsrugby'); ?>
    <?php //submit_button(); ?>
    
</form>