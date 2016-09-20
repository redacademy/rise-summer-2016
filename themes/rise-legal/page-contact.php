<?php
/**
 * The template for displaying contact page.
 * Template Name: Contact Page
 * @package Rise_Legal_theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" class="flex-center contact-container" <?php post_class(); ?>>
				<header class="entry-header">
					<img src="<?php echo get_template_directory_uri() ."/assets/icons/icon-contactus.svg"?>">

					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<section class="contact-content">
					<div class="container">
						<?php the_content(); ?>
					</div>
					
					<div class="responsive-map">
						<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2603.7115811928634!2d-123.11630378412012!3d49.26291238009192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x548673dd81bd8ebf%3A0x2c3f66039d0db41c!2sRise+Women's+Legal+Centre!5e0!3m2!1sen!2sca!4v1473549430486" width="400" height="300" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
					</div>

					<a class="btn" href="https://goo.gl/maps/f1KZEjw458C2">get directions</a>

					<ul>
						<li class="transit-information contact-notes">
							<img src="<?php echo get_template_directory_uri() ."/assets/icons/icon-transit.svg"?>">
							<?php 
								$transit_information = CFS()->get('transit_information');
								if( !empty($transit_information) ){
									echo $transit_information; };
							?>
						</li>
						<li class="parking-information contact-notes">
							<img src="<?php echo get_template_directory_uri() ."/assets/icons/icon-noparking.svg"?>">
							<?php 
								$parking_information = CFS()->get('parking_information');
								if( !empty($parking_information) ){
									echo $parking_information; };
							?>
						</li>
						<li class="wait-list-information contact-notes">
							<img src="<?php echo get_template_directory_uri() ."/assets/icons/icon-hourglass.svg"?>">
							<?php 
								$wait_list_information = CFS()->get('wait_list_information');
								if( !empty($wait_list_information) ){
									echo $wait_list_information; };
							?>
						</li>
					</ul>
					
				</section><!-- .entry-content -->
			</article><!-- #post-## -->


		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
