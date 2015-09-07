<!DOCTYPE html>
<html  <?php language_attributes(); ?>>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <link type="image/x-icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.png" rel="shortcut icon">

        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" id="business-erveddy-css" href="<?php echo get_template_directory_uri() ?>/css/style.css" media="all">

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <title><?php wp_title(); ?></title>

        <?php wp_head(); ?>
    </head>
    <body>