<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<div class="quotes">
				<?php
					$args = array(
						'post_type'		 => 'post',
						'orderby' 		 => 'rand',
						'order'          => 'ASC',
						'posts_per_page' => 1
					);
					$posts = get_posts( $args );
					echo "<h1>". $posts[0]->post_content . "</h1>";
				?>
				<div class="quote_rights">
					<p>- <?php echo $posts[0]->post_title; ?></p>
					<?php $link = get_post_meta( $posts[0]->ID, 'quote_source_url'); ?>
					<a href=" <?php echo $link ?>"> <?php get_post_meta( $posts[0]->ID, 'quote_source') ?> </a>
				</div>
				<div class="refresh">
					<button class="new-quote">Show Me Another!</button>
				</div>
			</div>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
