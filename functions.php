<?php
/**
 * gr_s functions and definitions
 *
 * @package gr_s
 */


$gr_s_includes = array(
  'lib/acf.php',
  'lib/admin.php',
  'lib/config.php',
  'lib/scripts.php',
  'lib/widgets.php',
  'lib/shortcodes.php',
  'lib/template-tags.php',
  'lib/extras.php',
  'lib/jetpack.php',
);

foreach ($gr_s_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'gr_s'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);