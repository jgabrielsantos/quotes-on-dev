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
            <div class="categories-page">
                <?php if ( have_posts() ) : ?>

                    <header class="page-header">
                        <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                        ?>
                    </header><!-- .page-header -->

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                            echo '<article class="category-post">';
                            the_content(); 
                            
                            echo '<div class="quote_rights"> 
                                    <p class="author">- '; the_title(); echo '</p>
                                </div></article>';
                        ?>

                    <?php endwhile; ?>

                <?php else : ?>

                    <?php get_template_part( 'template-parts/content', 'none' ); ?>

                <?php endif; ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->
    <i class="fas fa-quote-right"></i>
<?php get_footer(); ?>
