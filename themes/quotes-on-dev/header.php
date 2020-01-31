<?php
/**
 * The header for our theme.
 *
 * @package QOD_Starter_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/4a78412303.js" crossorigin="anonymous"></script>

	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( 'Skip to content' ); ?></a>

			<header id="masthead" class="site-header" role="banner">
				<div class="site-branding">
					<a href="/QUOTES-ON-DEV/">
						<img class="logo" src="<?php echo get_template_directory_uri() ?>/project-05/assets/qod-logo.svg" alt="homepage logo">
					</a>
				</div><!-- .site-branding -->
			</header><!-- #masthead -->

			<div id="content" class="site-content">
