<?php

/**
 * Custom post-type Producto
 * Creates the custom post-type for products management
 * @author @ju4nr3v0l at The Mundo Magenta Team
 * @package App Nutricion
 * @version 1.0
 * */

/*
 * Create the custom post-type
 */

if ( !function_exists( 'mm_producto_func' ) ) :

	function mm_producto_func() {

		$labels = array(
			'name' => _x( 'Productos', 'Post Type General Name', 'mm-nt' ),
			'singular_name' => _x( 'Evento', 'Post Type Singular Name', 'mm-nt' ),
			'menu_name' => __( 'Productos', 'mm-nt' ),
			'parent_item_colon' => __( 'Producto padre', 'mm-nt' ),
			'all_items' => __( 'Todos los productos', 'mm-nt' ),
			'view_item' => __( 'Ver producto', 'mm-nt' ),
			'add_new_item' => __( 'Publicar nuevo producto', 'mm-nt' ),
			'add_new' => __( 'Publicar producto', 'mm-nt' ),
			'edit_item' => __( 'Editar producto', 'mm-nt' ),
			'update_item' => __( 'Actualizar', 'mm-nt' ),
			'search_items' => __( 'Buscar productos', 'mm-nt' ),
			'not_found' => __( 'Productos no encontrados', 'mm-nt' ),
			'not_found_in_trash' => __( 'Productos no encontrados en la papelera', 'mm-nt' )
		);

		$rewrite = array(
			'slug' => 'productos',
			'with_front' => true,
			'pages' => true,
			'feeds' => true
		);

		$args = array(
			'label' => __( 'Producto', 'mm-nt' ),
			'description' => __( 'Información de productos', 'mm-nt' ),
			'labels' => $labels,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
			'taxonomies' => array( 'post_tag' ),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 3 ,
			'menu_icon' => 'dashicons-smiley',
			'can_export' => true,
			'has_archive' => 'productos',
			'exclude_from_search' => false,
			'query_var' => 'productos',
			'rewrite' => $rewrite,
			'capability_type' => 'post',
			'register_meta_box_cb' => 'mm_producto_metaboxes'
		);

		register_post_type( 'mm_producto', $args );
		flush_rewrite_rules();
	}

	add_action( 'init', 'mm_producto_func', 0 );

endif;

/*
 * End custom post-type creation
 */

/*
 * Custom messages for custom post-type on update
 */

if ( !function_exists( 'mm_producto_updated_messages' ) ) :

	function mm_Producto_updated_messages( $messages_producto ) {
		$post = get_post();
		$post_type = get_post_type( $post );
		$post_type_object = get_post_type_object( 'mm_producto' );

		$messages_Producto['mm_producto'] = array(
			0 => '', // Unused. Messages start at index 1.
			1 => __( 'Producto actualizado.', 'mm-nt' ),
			2 => __( 'Campo actualizado.', 'mm-nt' ),
			3 => __( 'Campo eliminado.', 'mm-nt' ),
			4 => __( 'Producto actualizado.', 'mm-nt' ),
			/* translators: %s: date and time of the revision */
			5 => isset( $_GET['revision'] ) ? sprintf( __( 'Producto restaurado a la revisión de %s', 'mm-nt' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => __( 'Producto publicado.', 'mm-nt' ),
			7 => __( 'Producto guardado.', 'mm-nt' ),
			8 => __( 'Producto presentado.', 'mm-nt' ),
			9 => sprintf(
					__( 'Producto programado para: <strong>%1$s</strong>.', 'mm-nt' ),
					// translators: Publish box date format, see http://php.net/date
					date_i18n( __( 'M j, Y @ G:i', 'mm-nt' ), strtotime( $post->post_date ) )
			),
			10 => __( 'Borrador de Producto actualizado.', 'mm-nt' )
		);

		if ( $post_type_object->publicly_queryable ) {
			$permalink = get_permalink( $post->ID );

			$view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'Ver Producto', 'mm-nt' ) );
			$messages_Producto['mm_producto'][1] .= $view_link;
			$messages_Producto['mm_producto'][6] .= $view_link;
			$messages_Producto['mm_producto'][9] .= $view_link;

			$preview_permalink = add_query_arg( 'preview', 'true', $permalink );
			$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Vista previa del Producto', 'mm-nt' ) );
			$messages_Producto['mm_producto'][8] .= $preview_link;
			$messages_Producto['mm_producto'][10] .= $preview_link;
		}

		return $messages_Producto;
	}

	add_filter( 'post_updated_messages', 'mm_Producto_updated_messages' );

endif;


/*
 * End custom messages
 */

/*
 * Custom bulk messages for custom post-type
 */
if ( !function_exists( 'mm_producto_bulk_messages' ) ) :

	function mm_producto_bulk_messages( $bulk_messages, $bulk_counts ) {

		$bulk_messages['mm_producto'] = array(
			'updated' => _n( '%s Producto actualizado.', '%s Productos actualizados.', $bulk_counts['updated'] ),
			'locked' => _n( '%s Producto no actualizado, alguien más lo está editando.', '%s Productos no actualizados, alguien más los está editando.', $bulk_counts['locked'] ),
			'deleted' => _n( '%s Producto eliminado permanentemente.', '%s Productos eliminados permanentemente.', $bulk_counts['deleted'] ),
			'trashed' => _n( '%s Producto enviado a la papelera.', '%s Productos enviados a la papelera.', $bulk_counts['trashed'] ),
			'untrashed' => _n( '%s Producto restaurado de la papelera.', '%s Productos restaurados de la papelera.', $bulk_counts['untrashed'] ),
		);

		return $bulk_messages;
	}

	add_filter( 'bulk_post_updated_messages', 'mm_producto_bulk_messages', 10, 2 );

endif;

/*
 * End custom bulk messages
 */

/*
 * Custom taxonomy for custom post-type Producto
 */

if ( !function_exists( 'mm_nt_producto' ) ) :

	function mm_nt_producto() {

		$labels = array(
			'name' => _x( 'Categorías', 'Taxonomy General Name', 'mm-nt' ),
			'singular_name' => _x( 'Categoría', 'Taxonomy Singular Name', 'mm-nt' ),
			'menu_name' => __( 'Categorías', 'mm-nt' ),
			'all_items' => __( 'Todas las categorías', 'mm-nt' ),
			'parent_item' => __( 'Categorías', 'mm-nt' ),
			'parent_item_colon' => __( 'Categoría padre:', 'mm-nt' ),
			'new_item_name' => __( 'Nueva categoría', 'mm-nt' ),
			'add_new_item' => __( 'Agregar nueva categoría', 'mm-nt' ),
			'edit_item' => __( 'Editar categoría', 'mm-nt' ),
			'update_item' => __( 'Actualizar categoría', 'mm-nt' ),
			'separate_items_with_commas' => __( 'Separa las categorías con comas', 'mm-nt' ),
			'search_items' => __( 'Buscar categorías', 'mm-nt' ),
			'add_or_remove_items' => __( 'Agregar o eliminar categorías', 'mm-nt' ),
			'choose_from_most_used' => __( 'Elije entre las categorías más usadas', 'mm-nt' ),
			'not_found' => __( 'Categoría no encontrada', 'mm-nt' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
		);
		register_taxonomy( 'mm-category-Producto', array( 'nt_producto' ), $args );
	}

	add_action( 'init', 'mm_nt_producto', 0 );
endif;

/*
 * End custom taxonomy
 */


/** 
*remove unnecesary fields 
**/

add_action('init', 'my_rem_editor_from_post_type');
function my_rem_editor_from_post_type() {
    remove_post_type_support( 'mm_producto', 'editor' );
    remove_post_type_support( 'mm_producto', 'excerpt' );
    remove_post_type_support( 'mm_producto', 'author' );
}