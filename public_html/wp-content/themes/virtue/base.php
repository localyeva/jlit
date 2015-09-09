<?php if(is_404()){
    header('Location: /');
  } ?>
<?php include_once 'languages/vn.php'; ?>
<?php session_start(); ?>
<?php $_SESSION['lang'] = $lang; ?>
<?php $domain = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST']; ?>
<?php get_template_part('templates/head'); ?>
  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>  
  <div class="wrap content" role="document">    
    <?php get_template_part('templates/slider'); ?>
     <?php get_template_part('templates/register'); ?>
     <?php get_template_part('templates/what-jlit');?>
    <?php get_template_part('templates/box-exam'); ?>
    <?php 
      if(is_page() == true){
        $page_object = get_queried_object();
        $page_id = get_queried_object_id();        
        switch($page_id){
          case J_PAGE_REGISTER:
            if(j_is_register() == false){              
              $back = 'Location: ' . $domain;              
              header($back);
              exit();
            }
            get_template_part('templates/register');
          break;
        }
      }
    ?>
    <?php 
      if(is_home() == true){        
         //get_template_part('templates/news');
         //get_template_part('templates/what-jlit');
         //get_template_part('templates/scope-exam');
         //get_template_part('templates/award');
		 get_template_part('templates/voice');   
         get_template_part('templates/box-exam');    
      }
    ?>
        <?php //include kadence_template_path(); ?>            
      <?php if (kadence_display_sidebar()) : ?>
      <aside class="<?php echo kadence_sidebar_class(); ?> kad-sidebar" role="complementary">
        <div class="sidebar">
          <?php //include kadence_sidebar_path(); ?>
        </div>
      </aside><
      <?php endif; ?>
    </div>
  </div>
  <?php get_template_part('templates/footer'); ?>
</div>



