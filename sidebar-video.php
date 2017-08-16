<?php

/**

 * The Sidebar containing the main widget area.

 *

 * @package WordPress

 * @subpackage Twenty_Eleven

 * @since Beacon 1.0

 */


$options = beacon_get_theme_options();

$current_layout = $options['theme_layout'];

if ( 'content' != $current_layout ) :

?>


			<?php if ( ! dynamic_sidebar( 'sidebar-111' ) ) : ?>				

			<?php endif; // end sidebar widget area ?>

        

<?php endif; ?>