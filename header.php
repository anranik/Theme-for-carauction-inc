<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <title><?php wp_title(); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>

	</head>

  <body <?php body_class(isset($class) ? $class : ''); ?>>

     <!-- Navigation -->
<div class="afternav"><a href="<?php home_url(); ?>"><img src=" <?php echo get_template_directory_uri (); ?>/img/logo.png" alt="logo"></a></div>
    <nav class="navbar navbar-default">

        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->

            <div class="navbar-header page-scroll">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#car-nav">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

            </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="car-nav">
       <?php wp_nav_menu( array('theme_location' => 'top-menu', 'menu_class' => 'nav navbar-nav ', 'depth'=> 3, 'container'=> false, 'walker'=> new Bootstrap_Walker_Nav_Menu)); ?>
       <div class="car-logo"><a href="<?php home_url(); ?>"><img src=" <?php echo get_template_directory_uri (); ?>/img/logo.png" alt="logo"></a></div>
      </div><!-- /.navbar-collapse -->
    </nav>

    <div id="main-container">