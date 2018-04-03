<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package gr_s
 */


// Hero Toggle
if(is_home() && $paged < 2) { $pageID = 66; }
if(is_post_type_archive( 'projects' )) { $pageID = 77; }
$heroToggle = get_field('hero_toggle', $pageID);



?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class($heroToggle); ?>>

<nav id="site-navigation" class="main-navigation" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
</nav>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'gr_s' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="row">
			<div class="site-branding">
				<h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
				<h5 class="site-description"><?php bloginfo( 'description' ); ?></h5>
			</div>

			<a id="menu-toggle" href="#"><span class="nav-open">&#9776;</span><span class="nav-close">&#10006;</span></a>

		</div>
	</header>

	<?php if($heroToggle == 'show-hero') { include('assets/components/hero.php'); } ?>

	<div id="content" class="site-content row">
