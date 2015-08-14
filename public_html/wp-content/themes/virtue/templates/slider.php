<style rel="stylesheet" type="text/css">

.slider {
	
}
.logo-company-wrap {
	padding:15px 0;
	text-align:center;
}

</style>

<div class="container slider pad-lr0">

	<!-- <div class="col-md-12 pad-lr0">
		<div id="main-slide" class="flexslider">
		    <ul class="slides" >
		        <li><img class="img-item" src="<?php //bloginfo('template_url'); ?>/assets/img/vir/slide1.jpg" alt="" /></li>
		        <li><img class="img-item" src="<?php //bloginfo('template_url'); ?>/assets/img/vir/slide2.jpg" alt="" /></li>
		        <li><img class="img-item" src="<?php //bloginfo('template_url'); ?>/assets/img/vir/slide3.jpg" alt="" /></li>
		    </ul>		    
		</div>		
	</div>	 -->
	<?php 
      echo do_shortcode("[metaslider id=18]"); 
    ?>	<!--
    <div class="<?php //echo $logo_company; ?> kad-header-right">
      <div class="logo-company-wrap">
        <img usemap="#logomap" src="<?php //echo bloginfo('template_url'); ?>/assets/img/com-logo.png" alt="company logo" class="logo-company">
        <map name="logomap" class="" id="logomap">              
          <area shape="rect" coords="0,0,210,91" href="http://www.vietnamworks.com/" alt="Vietnamworks" class="">
          <area shape="rect" coords="210,0,400,91" href="http://jobs.evolable.asia/" alt="Evolable Asia's jobs" class="">
        </map>
      </div>
    </div> <!-- Close span7 -->
</div>