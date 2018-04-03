<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package gr_s
 */
?>

<?php

	// Home Page
	if(is_front_page()) {

		// Project Headline
		$projectsFeatHeadline = get_field('home_projects_headline');
		if(!empty($projectsFeatHeadline)) {
			echo '<div id="latest-project-trigger" class="divider"><h3><a class="featured-project-scroll" href="#latest-project-trigger">' . $projectsFeatHeadline . ' <span class="genericon genericon-expand"></span></a></h3></div>';
		}


		// Featured Project
		$projectsFeatured = get_field('home_featured_project');
		$post = $projectsFeatured;
		setup_postdata($post);

			$featProjTitle = get_the_title();
			$featProjType = get_field('project_type');
			$featProjImg = get_field('project_featured_image');
?>

			<div id="home-featured-post" class="row featured-post">
				<div class="column one_third">
					<h2><a href="<?php echo get_the_permalink(); ?>"><?php echo $featProjTitle; ?></a></h2>
					<h5><?php echo $featProjType; ?></h5>
					<?php the_content( sprintf(__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gr_s' ),the_title( '<span class="screen-reader-text">"', '"</span>', false )) ); ?>
				</div>
				<div class="column two_thirds">
					<img src="<?php echo photon( $featProjImg) ; ?>">
				</div>
			</div>

<?php

		wp_reset_postdata();

		// Project Archive Headline
		$projectsArchiveHeadline = get_field('home_cta_headline');
		if(!empty($projectsArchiveHeadline)) {
			echo '<div class="divider view-all-work"><h3><a class="" href="/projects">' . $projectsArchiveHeadline . ' <span class="genericon genericon-next"></span></a></h3></div>';
		}



		// Featured Blog Post
		$blogsFeatured = get_field('home_featured_blog');
		$blogHeadline = get_field('home_blog_headline');
		$post = $blogsFeatured;
		setup_postdata($post);

			$featBlogTitle = get_the_title();
			$featBlogImg = get_field('blog_feature_image');
?>

			<div id="home-blog-post" class="row blog-post">
				<div class="column one_half">
					<img src="<?php echo photon( $featBlogImg) ; ?>">
				</div>
				<div class="column one_half">
					<h5><?php echo $blogHeadline; ?></h5>
					<h2><a href="<?php echo get_the_permalink(); ?>"><?php echo $featBlogTitle; ?></a></h2>
					<?php the_content( sprintf(__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gr_s' ),the_title( '<span class="screen-reader-text">"', '"</span>', false )) ); ?>
				</div>
			</div>

<?php

		wp_reset_postdata();

		$newsletterHeadline = get_field('home_newsletter_headline');
		$newsletterForm = get_field('home_newsletter_form');
?>

		<div class="newsletter-module">
			<div class="row">
				<div class="column one_half"><h2><?php echo $newsletterHeadline; ?></h2></div>
				<div class="column one_half"><?php echo do_shortcode($newsletterForm); ?></div>
			</div>
		</div>

<?php
	// All Other Pages
	} else {
?>


	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'gr_s' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php edit_post_link( __( 'Edit', 'gr_s' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->


<?php } ?>