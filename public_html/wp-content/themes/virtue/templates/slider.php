<?php $lang = $_SESSION['lang']; ?>
<div class="bg " id="fixed-sequence" style="background-size: cover;">
  <div class="row bg-height">
    <div class="col-xs-6 col-md-4 text-left text-left-head">
      <div class="frame">
        <h4><?php echo $lang['m_slider_h4_label']; ?></h4>
        <p><?php echo $lang['m_slider_en_banner']; ?></p>
        <a href="#form-register"><?php echo $lang['m_slider_free_register']; ?></a><br>
      </div>
      <img class="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/arrow.png" alt="">
    </div>
    <div id="myCarousel" class="carousel slide carousel-fade head-img" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="<?php bloginfo('template_url'); ?>/assets/img/vir/slide1.jpg" alt="Chania" class="img-responsive " width="100%" />
        </div>
        <div class="item">
          <img src="<?php bloginfo('template_url'); ?>/assets/img/vir/slide2.jpg" alt="Flower" class="img-responsive " width="100%"/>
        </div>
        <div class="item">
          <img src="<?php bloginfo('template_url'); ?>/assets/img/vir/slide3.jpg" alt="Flower" class="img-responsive " width="100%"/>
        </div>
      </div>
    </div>
  </div><!-- grid-->
</div>

<!-- <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/vir/slide1.jpg" alt="Chania" class="img-responsive " width="100%" />
        </div>
        <div class="item">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/vir/slide2.jpg" alt="Flower" class="img-responsive " width="100%"/>
        </div>
        <div class="item">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/vir/slide3.jpg" alt="Flower" class="img-responsive " width="100%"/>
        </div>
    </div>
</div> -->
