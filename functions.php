<?php
/**
 * Wannabe init
 *
 * @package Yamaha
 */


// Utilities.

include( 'configure/utilities.php' );

// CONFIG.

include( 'configure/configure.php' );

// WIDGETS.

include( 'configure/widgets.php' );

// JAVASCRIPT & CSS.

include( 'configure/js-css.php' );

// SHORTCODES.

include( 'configure/shortcodes.php' );

// SEARCH OPTION

if(file_exists(get_template_directory().'/configure/EmigmaSearch.php')){
	require get_template_directory().'/configure/EmigmaSearch.php';
}