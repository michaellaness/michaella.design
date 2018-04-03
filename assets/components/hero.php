
<?php
	if(is_home() && $paged < 2) { $pageID = 66; }
	if(is_post_type_archive( 'projects' )) { $pageID = 77; }

	// Component Structure
	$componentType = 'hero';
	$componentID = get_field('hero_id', $pageID);
	$componentClass = 'component ' . $componentType . ' ' . get_sub_field('hero_class', $pageID);

	// Background
	$componentBkgdType = get_field('hero_background_type', $pageID);
	if($componentBkgdType == 'bkgd-color') { // Background Color
		$componentBkgdColor = get_field('hero_background_color', $pageID);
		$componentClass .= ' ' . $componentBkgdType;
		$componentStyle .= ' background-color:' . $componentBkgdColor . '; ';
	}
	if($componentBkgdType == 'bkgd-image') { // Background Image
		$componentBkgdImg = get_field('hero_background_image', $pageID);
		$componentClass .= ' ' . $componentBkgdType;
		$componentStyle .= ' background-image: url(' . photon( $componentBkgdImg ) . '); ';
	}

	// Content
	$componentHeadline = get_field('hero_headline', $pageID);
	$componentSubheadline = get_field('hero_subheadline', $pageID);
	$componentContent = get_field('hero_content', $pageID);
	$componentButtons = 'hero_buttons';

	// Content Settings
	$componentTextAlignment = get_field('hero_text_alignment', $pageID);
	$componentClass .= ' ' . $componentTextAlignment . ' ';

	$componentContentWidth = get_field('hero_content_width', $pageID);
	$componentTopPadding = get_field('hero_top_padding', $pageID);
	$componentBottomPadding = get_field('hero_bottom_padding', $pageID);
	$componentStyle .= ' padding-top:' . $componentTopPadding . '; padding-bottom:' . $componentBottomPadding . '; ';
?>

<section id="<?php echo $componentID; ?>" class="<?php echo $componentClass; ?>" style="<?php echo $componentStyle; ?>">
	<div class="row" style="width: <?php echo $componentContentWidth; ?>;">
		<?php if(!empty($componentHeadline)) { echo '<h1 class="headline">' . $componentHeadline . '</h1>'; } ?>
		<?php if(!empty($componentSubheadline)) { echo '<h3 class="subheadline">' . $componentSubheadline . '</h3>'; } ?>
		<?php if(!empty($componentHeadline)) { echo '<p class="content">' . $componentContent . '</p>'; } ?>

		<?php
			if(have_rows($componentButtons)) {
				echo '<div class="button-wrap">';

				while(have_rows($componentButtons)): the_row();
					$buttonLabel = get_sub_field('button_label');
					$buttonURL = get_sub_field('button_url');
					echo '<a class="button" href="' . $buttonURL . '">' . $buttonLabel . '</a>';
				endwhile;

				echo '</div>';
			}
		?>
	</div>
</section>