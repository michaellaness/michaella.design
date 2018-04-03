<?php

// Register Widget Areas

function gr_s_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'gr_s' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'gr_s_widgets_init' );