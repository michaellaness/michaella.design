<?php

// jQuery
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-latest.min.js", false, null);
   wp_enqueue_script('jquery');
}




/**
 * Enqueue scripts and styles.
 */
function gr_s_scripts() {
	wp_enqueue_style( 'gr_s-style', get_stylesheet_uri() );

	// Scripts
	wp_enqueue_script( 'gr_s-scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array(), '20180206', true );

	// Fonts
	wp_enqueue_style( 'gr_s-playfair', '//fonts.googleapis.com/css?family=Lato%3A400%2C700%2C900%2C400italic%2C700italic%2C900italic%7CPlayfair+Display%3A400%2C700%2C400italic%2C700italic&amp;subset=latin%2Clatin-ext' );
	wp_enqueue_style( 'gr_s-genericons', get_template_directory_uri() . '/assets/fonts/genericons/genericons.css' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gr_s_scripts' );
