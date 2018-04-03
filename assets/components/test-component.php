
<?php
	// Component Structure
	$componentType = 'test';
	$componentID = get_sub_field('test_id');
	$componentClass = 'component ' . $componentType . ' ' . get_sub_field('test_class');
	$componentStyle = '';

	// Background
	$componentBkgdType = get_sub_field('test_background_type');
	if($componentBkgdType == 'bkgd-color') { // Background Color
		$componentBkgdColor = get_sub_field('test_background_color');
		$componentClass .= ' ' . $componentBkgdType;
		$componentStyle .= ' background-color:' . $componentBkgdColor . '; ';
	}
	if($componentBkgdType == 'bkgd-image') { // Background Image
		$componentBkgdImg = get_sub_field('test_background_image');
		$componentClass .= ' ' . $componentBkgdType;
		$componentStyle .= ' background-image: url(' . $componentBkgdImg . '); ';
	}

	// Component Content
	$componentHeadline = get_sub_field('test_headline');
	$componentSubeadline = get_sub_field('test_subheadline');
	$componentContent = get_sub_field('test_content');
	$componentButtons = 'test_buttons';

	// Content Settings
	$componentTextAlignment = get_sub_field('test_text_alignment');
	$componentClass .= ' ' . $componentTextAlignment . ' ';

	$componentContentWidth = get_sub_field('test_content_width');
	$componentTopPadding = get_sub_field('test_top_padding');
	$componentBottomPadding = get_sub_field('test_bottom_padding');
	$componentStyle .= ' padding-top:' . $componentTopPadding . '; padding-bottom:' . $componentBottomPadding . '; ';
?>

<section id="<?php echo $componentID; ?>" class="<?php echo $componentClass; ?>" style="<?php echo $componentStyle; ?>">
	<div class="row" style="width: <?php echo $componentContentWidth; ?>;">
		<?php if(!empty($componentHeadline)) { echo '<h2 class="headline">' . $componentHeadline . '</h2>'; } ?>
		<?php if(!empty($componentSubheadline)) { echo '<h4 class="subheadline">' . $componentSubheadline . '</h4>'; } ?>
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