<?php
/**
 * The template for displaying archive pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>
	<i class="fas fa-quote-left"></i>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="archives">
				<header class="entry-header">
					<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
				</header><!-- .entry-header -->

				<section class="authors">
					<h2>Quote Authors</h2>
					
					<div class="items">
						<?php $posts = get_posts('posts_per_page=-1');
							foreach ($posts as $post) : setup_postdata($post); ?>
							
								<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
						<?php endforeach;
						wp_reset_postdata(); ?>
					</div>
				</section>

				<section class="categories">
					<h2>Categories</h2>
					<div class="items">
						<?php wp_list_categories('title_li=', array(
							
						)); ?>
					</div>
				</section>

				<section class="tags">
					<h2>Tags</h2>

					<div class="items">
						<?php wp_tag_cloud(array(
							'smallest' => 1.25,
							'largest'  => 1.25,
							'unit'	   => 'rem'
						)); ?>
					</div>
				</section>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<i class="fas fa-quote-right"></i>
<?php get_footer(); ?>
