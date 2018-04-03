<?php
/**
 * @package gr_s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php
			if('projects' == get_post_type()) {
				$projectType = get_field('project_type');
				$projectWebsite = get_field('project_url');
				$projectCollabs = 'project_collaborators';
				$projectCollabCount = 0;

				if(have_rows($projectCollabs)) {
					$projectCollabString = ' // Collaborators: ';

					while(have_rows($projectCollabs)) : the_row();
						$collabName = get_sub_field('collaborator_name');
						$collabURL = get_sub_field('collaborator_url');

						if($projectCollabCount == 0) {
							$projectCollabString .= '<a href="' . $collabURL . '" target="_blank">' . $collabName . '</a>';
						} else {
							$projectCollabString .= ', <a href="' . $collabURL . '" target="_blank">' . $collabName . '</a>';
						}

						$projectCollabCount++;
					endwhile;
				}

				echo '<p>' . $projectType . ' // <a href="' . $projectURL . '" target="_blank">Website</a>' . $projectCollabString;
			}
		?>

		<div class="entry-meta">
			<?php gr_s_posted_on(); ?>
		</div><!-- .entry-meta -->
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
		<?php gr_s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
