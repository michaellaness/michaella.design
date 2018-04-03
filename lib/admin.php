<?php

// Control Visible Admin Menus
function remove_menus(){
  remove_menu_page( 'index.php' );                      //  Dashboard
  remove_menu_page( 'edit.php' );                       //  Posts
  remove_menu_page( 'upload.php' );                    //  Media
  remove_menu_page( 'edit.php?post_type=page' );    //  Pages
  remove_menu_page( 'edit-comments.php' );           //  Comments
  remove_menu_page( 'themes.php' );                   //  Appearance
  remove_menu_page( 'plugins.php' );                   //  Plugins
  remove_menu_page( 'users.php' );                     //  Users
  remove_menu_page( 'tools.php' );                     //  Tools
  remove_menu_page( 'options-general.php' );         //  Settings
}
// add_action( 'admin_menu', 'remove_menus' );


// Change Menu Names
function edit_admin_menus() {
    global $menu;

    $menu[5][0] = 'Blog'; // Change Posts to Blog
}
add_action( 'admin_menu', 'edit_admin_menus' );


// Custom admin styles
function custom_login_css() {
echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_uri().'">';
}
add_action('login_head', 'custom_login_css');


// Custom Menu Order
function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;

    return array(
        'index.php', // Dashboard
        'acf-options', // Theme Options
        'separator1', // Separator
        'edit.php?post_type=page', // Pages
        'edit.php?post_type=projects', // Projects
        'edit.php', // Posts
        // 'edit.php?post_type=post-type', // Custom Post Type
        'upload.php', // Media
        'link-manager.php', // Links
        'edit-comments.php', // Comments
        'ninja-forms', // Forms
        'separator2', // Separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');