<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<html>
<head>
<meta charset="UTF-8">
 <?php global $virtue; ?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Roboto&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
 <?php if (!empty($virtue['virtue_custom_favicon']['url'])) {?>
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url($virtue['virtue_custom_favicon']['url']); ?>" />
      <?php } ?>
      <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap.min.css" />
    <?php wp_head(); ?>
    <script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
          <script src="<?php bloginfo('template_url'); ?>/assets/datetimepicker/jquery.datetimepicker.js" type="text/javascript"></script>
          <script src="<?php bloginfo('template_url'); ?>/assets/fancybox/jquery.fancybox.js" type="text/javascript"></script>
          <script src="<?php bloginfo('template_url'); ?>/assets/nanoscroller/jquery.nanoscroller.min.js" type="text/javascript"></script>
          <script src="<?php bloginfo('template_url'); ?>/assets/nanoscroller/jquery.overthrow.min.js" type="text/javascript"></script>
          <script src="<?php bloginfo('template_url'); ?>/assets/js/common.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/show.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.validate.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/font-awesome/css/font-awesome.css" />

          <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/back-to-top-style.css" />
          <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/datetimepicker/jquery.datetimepicker.css" />
          <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/fancybox/jquery.fancybox.css" />
          <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/nanoscroller/nanoscroller.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/virtue.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.9.1/styles/default.min.css">
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.heightLine.js"></script>
      <script>
        $(function(){
          $(".body-red>div").heightLine();
        });
  </script>
</head>
