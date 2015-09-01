<!DOCTYPE html>
<html  <?php language_attributes(); ?>>
<head>
<title><?php wp_title(); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body>
	<div>
		<div id="header">
			<div class="container">
				<div class="row mar-bt-20 mar-t-20">
					<div class="col-sm-8"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" alt="" src="<?php bloginfo('template_url'); ?>/images/logo.png"> </a></div>
					<div class="col-sm-2 col-md-2"><a href="#"><img class="img-responsive pad-l-40" alt="" src="<?php bloginfo('template_url'); ?>/images/vnw.png"></a></div>
					<div class="col-sm-2 col-md-2"><a href="#"><img class="img-responsive pad-l-50" alt="" src="<?php bloginfo('template_url'); ?>/images/evo.png"></a></div>
				</div>
				</div>
				<div id="note" class="container-fluid">
					<nav class="navbar navbar-default navbar-static hei-menu" id="navbar-example">
				      <div class="container">
				        <div class="navbar-header">
				          <button data-target=".bs-example-js-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
				            <span class="sr-only">Toggle navigation</span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				          </button>
				          <p class="navbar-brand" data-target=".bs-example-js-navbar-collapse">Menu</p>
				        </div>
				        <div class="navbar-collapse bs-example-js-navbar-collapse dis-hide collapse" aria-expanded="false">
				        <?php
							$defaults = array(
								'theme_location'  => 'primary',
								'menu'            => '',
								'container'       => 'div',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav">%3$s</ul>',
								'depth'           => 0,
								'walker'          => ''
							);
							wp_nav_menu( $defaults );
							?>
				        </div>
				      </div>
				    </nav>	
			</div>
		</div>