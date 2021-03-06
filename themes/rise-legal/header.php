<?php
/**
 * The header for our theme.
 *
 * @package Rise_Legal_theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php gravity_form_enqueue_scripts(1, true); ?>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html( 'Skip to content' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<a href="<?php echo home_url()?>"><img src="<?php echo get_template_directory_uri() . '/assets/logos/rise-logo-white.svg' ?>" alt="home-page-icon"></a>

				<h1 class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			</div><!-- .site-branding -->
			
			<div class="menu-wrap hamburger">
				 	<img src="<?php echo get_template_directory_uri() . '/assets/icons/icon-menu.svg' ?>">
			</div>
			
			<nav id="desktop-navigation" class="desktop-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				<div class="legal-btn-wrap">
					<a class="red-btn btn legal-form" href="<?php echo get_page_link( get_page_by_title( 'Legal Contact Form' )->ID ); ?>">legal contact form</a>
				</div>
			</nav><!-- #site-navigation -->
			
		</header><!-- #masthead -->
			<nav id="site-navigation" class="main-navigation" role="navigation">
	
				<img src="<?php echo get_template_directory_uri() . '/assets/icons/icon-exit-white.svg'?>" class="close-nav">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

				<button class="legal-form">
					<a href="<?php echo get_page_link( get_page_by_title( 'Legal Contact Form' )->ID ); ?>">
						legal contact form
					</a>
				</button>
					
			</nav><!-- #site-navigation -->

		<div class="hdr-pusher"></div>
		<div id="content" class="site-content">
