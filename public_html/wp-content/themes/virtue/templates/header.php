<?php  $lang = $_SESSION['lang'];?>
<?php
  $hide = '';
  $reg_menu = '';
  $domain = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST'];    
  if(is_page() == true){
    $p = get_queried_object();
    $pid = get_queried_object_id();
    if($pid == J_PAGE_REGISTER){
      $hide = ' hide';
      $reg_menu = '<div class="nav-menu col-md-12 " id="nav-menu">       
                      <div class="row">
                        <div class="nav-menu-item f menu-l" link="sec-h" ><a class="reg_link_menu_item" href="'.$domain.'#sec-h">'. $lang['m_home_page'] .'</a></div>
                        <div class="nav-menu-item menu-l"  link="sec-n" ><a class="reg_link_menu_item" href="'.$domain.'#sec-n">'. $lang['m_jlit_news'] .'</a></div>
                        <div class="nav-menu-item menu-l" link="sec-w" ><a class="reg_link_menu_item" href="'.$domain.'#sec-w">'. $lang['m_what_is_jlit'] .'</a></div>                        
                        <div class="nav-menu-item menu-l"  link="sec-s" ><a class="reg_link_menu_item" href="'.$domain.'#sec-s">'. $lang['m_policy_scope'] .'</a></div>
                        <div class="nav-menu-item menu-l"  link="sec-a" ><a class="reg_link_menu_item" href="'.$domain.'#sec-a">'. $lang['m_awards'] .'</a></div>
                        <div class="nav-menu-item menu-l"  link="sec-v" ><a class="reg_link_menu_item" href="'.$domain.'#sec-v">'. $lang['m_voice'] .'</a></div>
                      </div>
                    </div>';

      $reg_menu_mb = '<div class="kad-nav-collapse">                                   
                  <div class="mo-item menu-l"  link="sec-h" ><a class="reg_link_menu_item" href="'.$domain.'#sec-h">'. $lang['m_home_page'] .'</a></div>
                  <div class="mo-item menu-l"  link="sec-n" ><a class="reg_link_menu_item" href="'.$domain.'#sec-n">'. $lang['m_jlit_news'] .'</a></div>
                  <div class="mo-item menu-l" link="sec-w" ><a class="reg_link_menu_item" href="'.$domain.'#sec-w">'. $lang['m_what_is_jlit'] .'</a></div>                  
                  <div class="mo-item menu-l"  link="sec-s" ><a class="reg_link_menu_item" href="'.$domain.'#sec-s">'. $lang['m_policy_scope'] .'</a></div>         
                  <div class="mo-item menu-l"  link="sec-a" ><a class="reg_link_menu_item" href="'.$domain.'#sec-a">'. $lang['m_awards'] .'</a></div>
                  <div class="mo-item menu-l"  link="sec-v" ><a class="reg_link_menu_item" href="'.$domain.'#sec-v">'. $lang['m_voice'] .'</a></div>                           
               </div>';
    }
  }
?>

<header class="banner headerclass" role="banner">
<?php if (kadence_display_topbar()) : ?>
  <section id="topbar" class="topclass">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6 kad-topbar-left">
          <div class="topbarmenu clearfix">
          <?php if (has_nav_menu('topbar_navigation')) :
              wp_nav_menu(array('theme_location' => 'topbar_navigation', 'menu_class' => 'sf-menu'));
            endif;?>
            <?php if(kadence_display_topbar_icons()) : ?>
            <div class="topbar_social">
              <ul>
                <?php global $virtue; $top_icons = $virtue['topbar_icon_menu'];
                foreach ($top_icons as $top_icon) {
                  if(!empty($top_icon['target']) && $top_icon['target'] == 1) {$target = '_blank';} else {$target = '_self';}
                  echo '<li><a href="'.$top_icon['link'].'" target="'.$target.'" title="'.esc_attr($top_icon['title']).'" data-toggle="tooltip" data-placement="bottom" data-original-title="'.esc_attr($top_icon['title']).'">';
                  if($top_icon['url'] != '') echo '<img src="'.$top_icon['url'].'"/>' ; else echo '<i class="'.$top_icon['icon_o'].'"></i>';
                  echo '</a></li>';
                } ?>
              </ul>
            </div>
          <?php endif; ?>
            <?php global $virtue; if(isset($virtue['show_cartcount'])) {
               if($virtue['show_cartcount'] == '1') { 
                if (class_exists('woocommerce')) {
                  global $woocommerce; ?>
                    <ul class="kad-cart-total">
                      <li>
                      <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_attr_e('View your shopping cart', 'woocommerce'); ?>">
                          <i class="icon-shopping-cart" style="padding-right:5px;"></i> <?php _e('Your Cart', 'virtue');?> <span class="kad-cart-dash">-</span> <?php echo $woocommerce->cart->get_cart_total(); ?>
                      </a>
                    </li>
                  </ul>
                <?php } } }?>
          </div>
        </div><!-- close col-md-6 --> 
        <div class="col-md-6 col-sm-6 kad-topbar-right jhide">
          <div id="topbar-search" class="topbar-widget">
            <?php if(kadence_display_topbar_widget()) { if(is_active_sidebar('topbarright')) { dynamic_sidebar('topbarright'); } 
              } else { if(kadence_display_top_search()) {get_search_form();} 
          } ?>
        </div>
        </div> <!-- close col-md-6-->
      </div> <!-- Close Row -->
    </div> <!-- Close Container -->
  </section>
<?php endif; ?>
<?php global $virtue; if(isset($virtue['logo_layout'])) {
  if($virtue['logo_layout'] == 'logocenter') {$logocclass = 'col-md-12'; $menulclass = 'col-md-6';}
  else if($virtue['logo_layout'] == 'logohalf') {$logocclass = 'col-md-6'; $menulclass = 'col-md-6';}
  else {$logocclass = 'col-md-6'; $menulclass = 'col-md-10'; $logo_company='col-md-6';} 
} else {$logocclass = 'col-md-6'; $menulclass = 'col-md-10'; $logo_company='col-md-6';}?>
  <div class="container">
    <div class="row jheader-group">
          <div class="<?php echo $logocclass; ?>  clearfix kad-header-left pad-lr0">
            <div id="logo" class="logocase b-r" style="padding-top:10px;">
              <a class="brand logofont" href="<?php echo home_url(); ?>/">
                      <?php global $virtue; if (!empty($virtue['x1_virtue_logo_upload']['url'])) { ?> <div id="thelogo"><img src="<?php echo esc_url($virtue['x1_virtue_logo_upload']['url']); ?>" alt="<?php  bloginfo('name');?>" class="kad-standard-logo flogo-m jlit-logo" />
                         <?php if(!empty($virtue['x2_virtue_logo_upload']['url'])) {?> <img src="<?php echo esc_url($virtue['x2_virtue_logo_upload']['url']);?>" class="kad-retina-logo jlit-logo" style="max-height:<?php echo $virtue['x1_virtue_logo_upload']['height'];?>px" /> <?php } ?>
                        </div> <?php } else { bloginfo('name'); } ?>
                        </a>
              <?php if (isset($virtue['logo_below_text'])) { ?> <p class="kad_tagline belowlogo-text"><?php echo $virtue['logo_below_text']; ?></p> <?php }?>
           </div> <!-- Close #logo -->
       </div><!-- close logo span -->

       <!--<div class="<?php echo $logo_company; ?> kad-header-right">
          <div class="logo-company-wrap">
            <img usemap="#logomap" src="<?php echo bloginfo('template_url'); ?>/assets/img/com-logo.png" alt="company logo" class="logo-company">
            <map name="logomap" class="" id="logomap">              
              <area shape="rect" coords="0,0,210,91" href="http://www.vietnamworks.com/" alt="Vietnamworks" class="">
              <area shape="rect" coords="210,0,400,91" href="http://jobs.evolable.asia/" alt="Evolable Asia's jobs" class="">
            </map>
          </div>
        </div>--> <!-- Close span7 -->

        <div class="col-md-6"></div>
        <!-- main menu -->
        <div class="<?php echo $menulclass; ?> kad-header-right jpadd-l0">            
         <nav id="nav-main" class="clearfix" role="navigation">
          <?php
            //if (has_nav_menu('primary_navigation')) : wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu'));  endif;            
           ?>
           
           <div class="nav-menu col-md-12 <?php echo $hide; ?>" id="nav-menu">       
            <div class="row">
              <div class="nav-menu-item f menu-l" link="sec-h" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_home_page']; ?></div>
              <div class="nav-menu-item menu-l"  link="sec-n" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_jlit_news']; ?></div>
              <div class="nav-menu-item menu-l" link="sec-w" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_what_is_jlit']; ?></div>                        
              <div class="nav-menu-item menu-l"  link="sec-s" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_policy_scope']; ?></div>          
              <div class="nav-menu-item menu-l"  link="sec-a" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_awards']; ?></div>
              <div class="nav-menu-item menu-l"  link="sec-v" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_voice']; ?></div>
            </div>
          </div>
          <?php echo $reg_menu; ?>
          <!-- end #nav-menu -->

           <!-- navigate float menu -->
           <?php if (has_nav_menu('mobile_navigation')){$mb = false;}?>
           <?php if(is_home() == true){ ?>
           <div class="nav-fmenu <?php echo (is_user_logged_in()==true?'nav-fmenu-ad':'') ?> hide-mb" id="nav-fmenu">
            <div class="nav-fmenu-w">
              <div class="item <?php echo ($mb==true?'':' f-l') ?> fm-i menu-l"  link="sec-h" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_home_page']; ?></div>
              <div class="item <?php echo ($mb==true?'':' f-l') ?> fm-i menu-l"  link="sec-n" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_jlit_news']; ?></div>
              <div class="item <?php echo ($mb==true?'':' f-l') ?> fm-i menu-l" link="sec-w" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_what_is_jlit']; ?></div>              
              <div class="item <?php echo ($mb==true?'':' f-l') ?> fm-i menu-l"  link="sec-s" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_policy_scope']; ?></div>         
              <div class="item <?php echo ($mb==true?'':' f-l') ?> fm-i menu-l"  link="sec-a" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_awards']; ?></div>
              <div class="item <?php echo ($mb==true?'':' f-l') ?> fm-i menu-l"  link="sec-v" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_voice']; ?></div>         
            </div>
          </div>
          <?php } ?>
          <!-- end navigate float menu -->

         </nav> 
        </div> <!-- close main menu -->

        <!-- language -->
        <div class="col-md-2 lang-w">
          <div class="lang hide">
            <div class="vn"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/vir/vn-icon.png"></div>
            <div class="jp"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/vir/jp-icon.png"></div>            
          </div>          
        </div>        
        <!-- end language -->
        
    </div> <!-- Close Row -->


    <?php if (has_nav_menu('mobile_navigation')) : ?>
           <div id="mobile-nav-trigger" class="nav-trigger">
              <a class="nav-trigger-case mobileclass collapsed" rel="nofollow" data-toggle="collapse" data-target=".kad-nav-collapse">
                <div class="kad-navbtn"><i class="icon-reorder"></i></div>
                <div class="kad-menu-name"><?php echo __('Menu', 'virtue'); ?></div>
              </a>
            </div>

            <div id="kad-mobile-nav" class="kad-mobile-nav">
              <div class="kad-nav-inner mobileclass">
                <div class="kad-nav-collapse <?php echo $hide; ?>">
                 <?php //wp_nav_menu( array('theme_location' => 'mobile_navigation','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-mnav')); ?>
                  <!-- mobile -->
                  <div class="mo-item menu-l"  link="sec-h" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_home_page']; ?></div>
                  <div class="mo-item menu-l"  link="sec-n" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_jlit_news']; ?></div>
                  <div class="mo-item menu-l" link="sec-w" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_what_is_jlit']; ?></div>                  
                  <div class="mo-item menu-l"  link="sec-s" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_policy_scope']; ?></div>         
                  <div class="mo-item menu-l"  link="sec-a" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_awards']; ?></div>
                  <div class="mo-item menu-l"  link="sec-v" onclick="cscroll($(this).attr('link'));"><?php echo $lang['m_voice']; ?></div>         
                  <!-- end mobile -->
               </div>
               <?php echo $reg_menu_mb; ?>
            </div>
          </div>   
          <?php  endif; ?> 
  </div> <!-- Close Container -->
  <?php
            if (has_nav_menu('secondary_navigation')) : ?>
  <section id="cat_nav" class="navclass">
    <div class="container">
     <nav id="nav-second" class="clearfix" role="navigation">
     <?php wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'sf-menu')); ?>
   </nav>
    </div><!--close container-->
    </section>
    <?php endif; ?> 
     <?php global $virtue; if (!empty($virtue['virtue_banner_upload']['url'])) { ?> <div class="container"><div class="virtue_banner"><img src="<?php echo esc_url($virtue['virtue_banner_upload']['url']); ?>" /></div></div> <?php } ?>
</header>