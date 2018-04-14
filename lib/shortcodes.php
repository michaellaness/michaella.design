<?php

// ---- Shortcodes ---- //




// Rows
function row_shortcode($atts, $content = null ) {

   $output= '<div class="row-shortcode">'.do_shortcode($content).'</div>';

   return $output;
}

// Columns
function column_shortcode($atts, $content = null) {
   extract(shortcode_atts(array(
      'size' => '',
      'headline' => '',
      'alignment' => 'left',
   ), $atts));

   $output = '<div class="column '.$size.' txt-'.$alignment.'"><h3>'.do_shortcode($headline).'</h3><p>'.do_shortcode($content).'</p></div>';

   return $output;
}








// ----- Register Shortcodes ----- //
function register_shortcodes(){
   add_shortcode('row', 'row_shortcode');
   add_shortcode('column', 'column_shortcode');
}
add_action( 'init', 'register_shortcodes');
