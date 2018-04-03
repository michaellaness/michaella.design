<?php
	if( have_rows('flex_components') ):
		while ( have_rows('flex_components') ) : the_row();

			switch (get_row_layout()) {
				case 'test_component':
					include('assets/components/test-component.php');
				break;
			}

		endwhile;
	endif;
?>