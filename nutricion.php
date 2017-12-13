<?php
/*
Plugin Name: Nutricion Mundo Magenta
Plugin URI: http://
Description: Una herramienta para la gestión personalizada de Nutricion APP.
Version: 1.0
Author: Juan Marulanda @ Mundo Magenta Team
Author URI: http://github.com/ju4nr3v0l
License: GPL2
*/




/*
 * Plugin absolute path
 */
define( 'MM_PLUGIN_PATH', plugin_dir_url( __FILE__ ) );
define( 'MM_PLUGIN_ABS_PATH', plugin_dir_path( __FILE__ ) );

/*
 * Enqueue scripts & media
 */
function mm_nt_scripts() {
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_media();
}


function mm_nt_styles() {
	wp_enqueue_style( 'thickbox' );
	wp_register_style( 'datepicker', '//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css' );
	wp_enqueue_style( 'datepicker' );
	wp_register_style( 'timepicker',  MM_PLUGIN_PATH . '/js/timepicki.css' );
	wp_enqueue_style( 'timepicker' );
	wp_register_style( 'datetimepicker',  MM_PLUGIN_PATH . 'js/jquery.datetimepicker.css' );
	wp_enqueue_style( 'datetimepicker' );
	wp_register_style( 'colorPicker',  MM_PLUGIN_PATH . 'js/spectrum.css' );
	wp_enqueue_style( 'colorPicker' );	
}

add_action( 'admin_print_scripts', 'mm_nt_scripts' );
add_action( 'admin_print_styles', 'mm_nt_styles' );



/*
 * Includes
 */

include( 'inc/post-types/productos.php' );
include( 'inc/metaboxes/productos.php' );


