<!-- obsługa błędów -->
<?php settings_errors(); ?>
<?php
    $pageName1 = esc_attr(get_option('page_name_1'));
    $pageName2 = esc_attr(get_option('page_name_2'));
    $picture = esc_attr(get_option('logo_picture'));
?>

<form method="post" action="options.php" class="azsrugby-general-form">
    <!-- wyswietlenie wszystkich zdefiniowanych ustawień(sekcji i pól) dla danego id sekcji w tym przypadku azsrugby-settings-group -->
    <?php settings_fields('azsrugby-settings-group'); ?>
    <!-- ustawienie zapisanych danych wprowadzonych przez uzytkownika w polach danej sekcji -->
    <?php do_settings_sections('pmtargosz_azsrugby'); ?>
    <?php submit_button('','primary','btnSubmit'); ?>
    
</form>
<div class="azsrugby-preview">
    <div class="azsrugby-header">
        <div class="header-name"><h1><?php print $pageName1; ?></h1></div>
        <img id="logo-picture-preview" class="header-logo" src="<?php print $picture;  ?> "/>
        <div class="header-name"><h1><?php print $pageName2; ?></h1></div>
    </div>
</div>