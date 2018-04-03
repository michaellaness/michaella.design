<?php
/*
Template Name: Home Page
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="hero">
					<div class="row"></div>
				</div>

				<?php get_template_part( 'content', 'flex-page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
