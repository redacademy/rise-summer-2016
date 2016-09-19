<?php
/**
 * The template for displaying legal contact form page.
 * Template Name: Legal Contact Form
 * @package Rise_Legal_theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				
				<div class="show">
					<p>testing if this will disappear</p>
				</div>


				<section id="page-one-content" class ="container">
					
					<div>
					<?php echo CFS()->get( 'page_one_content' ); ?>	
					</div>

					<div class ="page-one-button-spacing">
						<a class="btn" href="<?php echo get_page_link( get_page_by_title( 'Services' )->ID ); ?>">who can we help</a>

					</div>

					<?php get_template_part( 'template-parts/content', 'contact-process' ); ?>

				</section>

				<div class="legal-form-content">
					<?php the_content(); ?>
					<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
						'after'  => '</div>',
						) );
						?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_footer(); ?>
