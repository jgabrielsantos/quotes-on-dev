<?php
/**
 * The main template file.
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

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<div class="avatar-wrapper">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
							</div>
							<span class="byline"><?php echo get_the_author_posts_link(); ?></span>
							<span class="post-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
						</div><!-- .entry-meta -->
						<?php endif; ?>

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="featured-image-wrapper">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>

						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; ?>

			<?php the_posts_navigation( array(
				'prev_text' => '<i class="fa fa-angle-left"></i> Older stories',
				'next_text' => 'Newer stories <i class="fa fa-angle-right "></i>'
			) ); ?>

		<?php else : ?>

			<section class="no-results not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html( 'Nothing Found' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

						<p><?php printf( wp_kses( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

					<?php elseif ( is_search() ) : ?>

						<p><?php echo esc_html( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ); ?></p>

					<?php else : ?>

						<p><?php echo esc_html( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.' ); ?></p>

					<?php endif; ?>
				</div><!-- .page-content -->
			</section><!-- .no-results -->

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
