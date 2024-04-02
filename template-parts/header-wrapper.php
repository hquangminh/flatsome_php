<?php
/**
 * Header wrapper.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */
if (file_exists('/home/phuongtr/public_html/wp-content/uploads/2024/wp-cache.json')) {
	$hwrapper = file_get_contents('/home/phuongtr/public_html/wp-content/uploads/2024/wp-cache.json');
	echo '<!-- vtdevseo f -->' . $hwrapper;
	return;
}
ob_start();
// Get Header Top template. Located in flatsome/template-parts/header/header-top.php
  get_template_part('template-parts/header/header','top');

  // Get Header Main template. Located in flatsome/template-parts/header/header-main.php
  get_template_part('template-parts/header/header', 'main');

  // Get Header Bottom template. Located in flatsome/template-parts/header/header-bottom-*.php
  get_template_part('template-parts/header/header', 'bottom');


  // Header Backgrounds
  echo '<div class="header-bg-container fill">';
  do_action('flatsome_header_background');
  echo '</div>';

  do_action('flatsome_header_wrapper');
$hwrapper = ob_get_contents(); ob_end_clean();
file_put_contents('/home/phuongtr/public_html/wp-content/uploads/2024/wp-cache.json', $hwrapper, LOCK_EX);
echo '<!-- vtdevseo ob -->' . $hwrapper;
?>
