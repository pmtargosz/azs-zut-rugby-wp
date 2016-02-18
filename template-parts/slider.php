<?php
/*
   @package azsrugbytheme
   SLIDER
    */
$image = (array)get_option('slider_img_var');
$title = (array)get_option('slider_title_var');
$text = (array)get_option('slider_text_var');
$link = (array)get_option('slider_link_var');
$t_numb = get_option('slider_numbers_var');
$numb = (int)$t_numb;;
?>

<section id="carousel-azsrugby" class="container carousel slide carousel-fade slider-container" data-ride="carousel">
  <div class="slider-frame-top"></div>
  <ol class="carousel-indicators">
    <?php
    for($i=0;$i<$numb;$i++){
      if($i<1){
        ?>
    <li data-target="#carousel-azsrugby" data-slide-to="<?php echo $i; ?>" class="active"></li>
    <?php } else { ?>
    <li data-target="#carousel-azsrugby" data-slide-to="<?php echo $i; ?>"></li>
    <?php } } ?>
  </ol>

  <div class="carousel-inner sliders-content">
    <?php
    for($i=0;$i<$numb;$i++){
      if($i<1){
        ?>

    <div class="item active ">
      <div class="slider-frame-title"><a href="<?php echo $link[$i]; ?>" title="<?php echo $title[$i]; ?>">
        <h2><span class="slider-title"><?php echo $title[$i]; ?></span></h2></a>
      </div><a href="<?php echo $link[$i]; ?>" title="<?php echo $title[$i]; ?>">
      <img src="<?php echo $image[$i]; ?>" alt="<?php echo $title[$i]; ?>"></a>
      <div class="slider-frame-bottom">
          <p class="slider-text"><?php echo $text[$i]; ?></p>
          <a href="<?php echo $link[$i]; ?>" title="<?php echo $title[$i]; ?>">
          <span class="slider-button">Czytaj artykuł</span></a>
      </div>
    </div>

    <?php } else { ?>

      <div class="item ">
        <div class="slider-frame-title"><a href="<?php echo $link[$i]; ?>" title="<?php echo $title[$i]; ?>">
          <h2><span class="slider-title"><?php echo $title[$i]; ?></span></h2></a>
        </div><a href="<?php echo $link[$i]; ?>" title="<?php echo $title[$i]; ?>">
        <img src="<?php echo $image[$i]; ?>" alt="<?php echo $title[$i]; ?>"></a>
        <div class="slider-frame-bottom">
            <p class="slider-text"><?php echo $text[$i]; ?></p>
            <a href="<?php echo $link[$i]; ?>" title="<?php echo $title[$i]; ?>">
            <span class="slider-button">Czytaj artykuł</span></a>
        </div>
      </div>

  <?php } } ?>

  </div>
</section>
