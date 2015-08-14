<?php if(is_404()){
    header('Location: /');
  } ?>
<?php include_once 'languages/vn.php'; ?>
<?php session_start(); ?>
<?php $_SESSION['lang'] = $lang; ?>
<?php $domain = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST']; ?>
<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
<div id="sec-h"></div>  
<div id="wrapper" class="container">  
  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>  
  <div class="wrap content" role="document">    
    <?php get_template_part('templates/slider'); ?>
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
        get_template_part('templates/what-jlit');
        //get_template_part('templates/scope-exam');
        //get_template_part('templates/award');
		echo '<br>';
        get_template_part('templates/box-exam');    
        get_template_part('templates/voice');     
      }
    ?>
        <?php //include kadence_template_path(); ?>            
      <?php if (kadence_display_sidebar()) : ?>
      <aside class="<?php echo kadence_sidebar_class(); ?> kad-sidebar" role="complementary">
        <div class="sidebar">
          <?php //include kadence_sidebar_path(); ?>
        </div><!-- /.sidebar -->
      </aside><!-- /aside -->
      <?php endif; ?>


    </div><!-- /.row-->
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>
</div><!--Wrapper-->
<script src="<?php bloginfo('template_url'); ?>/assets/js/flexslider.js" type="text/javascript"></script>  
<script src="<?php bloginfo('template_url'); ?>/assets/js/ascroll.js" type="text/javascript"></script>
<script type="text/javascript">
  function cscroll(id){
    if(id == 'sec-h'){      
      $('#nav-fmenu').css('display','none');
    }else{      
      $('#nav-fmenu').css('display','fixed');
    }

    $('#' + id).animatescroll();
  }
  $(document).ready(function(){
    //hihi
    $('#map-icon').click(function(){        
      $('#map').bPopup({
            easing: 'easeOutBack',
            speed: 450,
            transition: 'slideDown'
          });       
    });
   $('#map-icon-hanoi').click(function(){        
      $('#map-hanoi').bPopup({
            easing: 'easeOutBack',
            speed: 450,
            transition: 'slideDown'
          });       
    }); 
    $(window).resize(function(){
      var obj = $(window).width();
    });
    
    var top = 930;
    $(window).scroll(function (event) {            
      var y = $(this).scrollTop();      
      if (y >= top) {        
        $('#nav-fmenu').removeClass('hide');
        $('#nav-fmenu').attr('style','');        
        
        $('#mb-gototop').removeClass('hide');
      } else {        
        $('#nav-fmenu').addClass('nav-fmenu hide');

        $('#mb-gototop').addClass('show-mb hide');
        $('#mb-gototop').addClass('show-mb');
      }
    });
    $('#nav-fmenu').addClass('nav-fmenu hide');
  });
</script>

<script type="text/javascript">
  var domain = "<?php echo bloginfo('siteurl'); ?>"  
  function get_data(pid){
    var urlGet = domain + '?json=get_post_by_id';
    $.ajax({
      type:"POST",
      url:urlGet,
      data:{"pid":pid},
      dataType:"json"

    }).done(function(r){      
      $('#post-detail-pop-title').html(r['post_title']);
      $('#post-detail-pop-content').html(r['post_content']);
      /*$('#post-detail-pop').bPopup({
        easing: 'easeOutBack',
        fadeSpeed: 'slow',                    
      });*/
      $('#post-detail-pop').bPopup({
                easing: 'easeOutBack',
                speed: 1000,
                position: ["auto", "auto"],
                positionStyle: "absolute",
                follow: [false, false],
                onClose: function(){
                    $('#post-detail-pop').fadeOut(1);
                }
              });      
    });
  }

  $(document).ready(function(){   
    function get_data_voice(pid){
    var urlGet = domain + '?json=get_post_by_id';
    $.ajax({
      type:"POST",
      url:urlGet,
      data:{"pid":pid},
      dataType:"json"

    }).done(function(r){
      $('#post-detail-pop-title').html(r['post_title']);
      $('#post-detail-pop-content').html(r['post_content']);
     $('#post-detail-pop').bPopup({
                easing: 'easeOutBack',
                speed: 1000,
                position: ["auto", "auto"],
                positionStyle: "absolute",
                follow: [false, false],
                onClose: function(){
                    $('#post-detail-pop').fadeOut(1);
                }
              });
    });
  }
  $('.post-detail-voice').click(function(){
       var pid = $(this).attr('alt');
       get_data_voice(pid);
      });
 
    <?php if(j_is_register() == true){ ?>
    $('#reg-exam-button img').click(function(){      
      location.href = "<?php bloginfo('siteurl'); ?>/dang-ky-thi#bm";
    });
    <?php } ?>    
    $('.post-detail-link').click(function(){       
       var pid = $(this).attr('alt');       
       get_data(pid);               
      }); 

    $('.post-detail-pop-close').click(function(){       
       var p = $(this).parent();       
       $(p).bPopup().close();

      });

    $("#register").validate({
      rules: {
        id_number: "required",
        fullname: "required",
        dob: "date",
        address: {
          required: true,
          minlength: 10
        },        
        email: {
          required: true,
          email: true
        },
        cellphone: "number",        
      },
      messages: {
        id_number: "Nhập số CMND",
        fullname: "Nhập họ và tên",                
        dob: {
          required: "Nhập ngày tháng năm sinh",
          date: "Theo định dạng yyyy/mm/dd"
        },        
        address: {
          required: "Nhập địa chỉ",
          minlength: "Địa chỉ có ít nhất là 10 ký tự"
        },        
        email: "Nhập địa chỉ email hợp lệ",
        cellphone: {
         required: "Nhập số điện thoại",
         number: "Số điện thoại chưa đúng" 
        }
      }
    });
  });
</script>
<script type="text/javascript">
jQuery(window).load(function () {
    jQuery('.flexslider').flexslider({
        animation: "fade",
        animationSpeed: 400,
        slideshow: true,
        slideshowSpeed: 7000,
        before: function(slider) {
          slider.removeClass('loading');
        }  
      });
    });
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=795903230445450&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Google Analytics -->
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55361633-1', 'auto');
  ga('send', 'pageview');
</script>
<script type="text/javascript">
  $('#register').on('click', function() {
    ga('send', 'event', 'button', 'click', 'nav-buttons');
  });
</script>
</body>
</html>
