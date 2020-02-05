<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if (is_user_logged_in()) {
					get_template_part( 'template-parts/content', 'page' );
				} else {
					echo '<h2>Sorry, you must be loggedin to submit a quote!</h2>
					<a href="http://localhost:8888/QUOTES-ON-DEV/wp-login.php?loggedout=true&wp_lang=en_CA">Click here to login.';
				}
				 ?>
			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
