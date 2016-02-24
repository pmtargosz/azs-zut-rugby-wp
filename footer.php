<?php
    /*
        This id the template for the footer

        @package azsrugbytheme
    */
?>
<?php
    $options = get_option('support_triger_var');
    if(@$options == 1){
        get_template_part('template-parts/supports');
    }
    ?>

<footer class="container footer-container">

    <div id="map-container"></div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"> </script>
    <div class="footer-logo"><img src="<?php echo esc_attr(get_option('footer_img')); ?>" /></div>
    <div class="footer-adress">
        <p>Azs Zut Rugby ul. Tenisowa 33 71-073 Szczecin</p> <a href="mailto:azszutrugby@gmail.com"><p id="footer-mail">azszutrugby@gmail.com</p></a>
    </div>

    <div class="podpis">
        <p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>
        <p>Wykonanie: Paweł Targosz</p>
    </div>

</footer>

<?php wp_footer(); ?>
<div class="cookie">
  <span class="cookie-img"></span>
  <p class="cookie-p"> Witamy! Nasz serwis używa cookies - bez obaw ;)</p><span class="cookie-button" id="cookie-ok">Akceptuje</span>
</div>
</body>
</html>
