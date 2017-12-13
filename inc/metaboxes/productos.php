<?php

/**
 * Custom metaboxes post-type Productos
 * Creates the custom metaboxes for the post-type producto
 * @author @ju4nr3v0l at The Mundo Magenta Team
 * @package App Nutricion
 * @version 1.0
 * */
/*
 * Add the events metaboxes
 */

function mm_producto_metaboxes( $post ) {
	add_meta_box( 'mm_producto_marca', 'Marca', 'mm_producto_marca', 'mm_producto', 'normal', 'high' );
	add_meta_box( 'mm_producto_fabricante', 'Fabricante', 'mm_producto_fabricante', 'mm_producto', 'normal', 'high' );
	add_meta_box( 'mm_producto_tamanoPorcion', 'Tamaño porción', 'mm_producto_tamanoPorcion', 'mm_producto', 'normal', 'high' );
	add_meta_box( 'mm_producto_medidaCasera', 'Medida casera', 'mm_producto_medidaCasera', 'mm_producto', 'normal', 'high' );
	add_meta_box( 'mm_producto_valorEnergetico', 'Valor energético', 'mm_producto_valorEnergetico', 'mm_producto', 'normal', 'high' );
	add_meta_box( 'mm_producto_caloriasGrasa', 'Calorías desde la Grasa', 'mm_producto_caloriasGrasa', 'mm_producto', 'normal', 'high' );
	add_meta_box( 'mm_producto_grasaTotal', 'Grasa total', 'mm_producto_grasaTotal', 'mm_producto', 'normal', 'high' );
	add_meta_box( 'mm_producto_grasaSaturada', 'Grasa saturada', 'mm_producto_grasaSaturada', 'mm_producto', 'normal', 'high' );
	add_meta_box( 'mm_producto_grasaInsaturada', 'Grasa insaturada', 'mm_producto_grasaInsaturada', 'mm_producto', 'normal', 'high' );
	add_meta_box( 'mm_producto_grasaTrans', 'Grasa Trans', 'mm_producto_grasaTrans', 'mm_producto', 'normal', 'high' );
	add_meta_box( 'mm_producto_colesterol', 'Colesterol', 'mm_producto_colesterol', 'mm_producto', 'normal', 'high' );
	add_meta_box( 'mm_producto_sodio', 'Sodio', 'mm_producto_sodio', 'mm_producto', 'side', 'high' );
	add_meta_box( 'mm_producto_carbohidrato', 'Carbohidrato', 'mm_producto_carbohidrato', 'mm_producto', 'side', 'high' );
	add_meta_box( 'mm_producto_total', 'Total (gr)', 'mm_producto_total', 'mm_producto', 'side', 'high' );
	add_meta_box( 'mm_producto_fibraDietaria', 'Fibra dietaria (gr)', 'mm_producto_fibraDietaria', 'mm_producto', 'normal', 'high' );
	add_meta_box( 'mm_producto_fibraInsoluble', 'Fibra insoluble (gr)', 'mm_producto_fibraInsoluble', 'mm_producto', 'side', 'high' );
	add_meta_box( 'mm_producto_fibraSoluble', 'Fibra Soluble (gr)', 'mm_producto_fibraSoluble', 'mm_producto', 'side', 'high' );
	add_meta_box( 'mm_producto_azucares', 'Azúcares (gr)', 'mm_producto_azucares', 'mm_producto', 'side', 'high' );
	add_meta_box( 'mm_producto_proteina', 'Proteína (gr)', 'mm_producto_proteina', 'mm_producto', 'side', 'high' );
	add_meta_box( 'mm_producto_vitaminaA', 'Vitamina A %', 'mm_producto_vitaminaA', 'mm_producto', 'side', 'high' );
	add_meta_box( 'mm_producto_vitaminaC', 'Vitamina C %', 'mm_producto_vitaminaC', 'mm_producto', 'side', 'high' );
	add_meta_box( 'mm_producto_calcio', 'Calcio %', 'mm_producto_calcio', 'mm_producto', 'side', 'high' );
	add_meta_box( 'mm_producto_hierro', 'Hierro %', 'mm_producto_hierro', 'mm_producto', 'side', 'high' );

}

add_action( 'add_meta_boxes_mm_producto', 'mm_producto_metaboxes' );



/*
 * HTML output for metaboxes
 */
// Marca
function mm_producto_marca() {
	global $post;

	?>
	<input type="hidden" name="productometa_noncename_marca" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$marca = get_post_meta( $post->ID, 'mm_producto_marca', true );

	
	?>
	<label for="mm-marcaProducto">Ingrese la Marca</label><br />
	<input type="text" name="mm_producto_marca" value="<?php echo $marca; ?>"  ><br />
	<?php
}

// fabricante
function mm_producto_fabricante() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_fabricante" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$fabricante = get_post_meta( $post->ID, 'mm_producto_fabricante', true );
	
	?>
	<label for="mm_producto_fabricante">Ingrese el fabricante o la empresa</label><br />
	<input type="text" name="mm_producto_fabricante" value="<?php echo $fabricante; ?>"  ><br />
	<?php
}

// tamaño porcion
function mm_producto_tamanoPorcion() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_tamanoPorcion" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$tamanoPorcion = get_post_meta( $post->ID, 'mm_producto_tamanoPorcion', true );
	
	?>
	<label for="mm_producto_tamanoPorcion">Ingrese el tamaño porción (gr, ml)</label><br />
	<input type="text" name="mm_producto_tamanoPorcion" value="<?php echo $tamanoPorcion; ?>"  ><br />
	<?php
}

//Medida Casera

function mm_producto_medidaCasera() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_medidaCasera" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$medidaCasera = get_post_meta( $post->ID, 'mm_producto_medidaCasera', true );
	
	?>
	<label for="mm_producto_medidaCasera">Ingrese la medida casera</label><br />
	<input type="text" name="mm_producto_medidaCasera" value="<?php echo $medidaCasera; ?>"  ><br />
	<?php
}

//Valor Energetico
function mm_producto_valorEnergetico() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_valorEnergetico" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$valorEnergetico = get_post_meta( $post->ID, 'mm_producto_valorEnergetico', true );
	
	?>
	<label for="mm_producto_valorEnergetico">Ingrese el Valor energético (Kcal)	</label><br />
	<input type="text" name="mm_producto_valorEnergetico" value="<?php echo $valorEnergetico; ?>"  ><br />
	<?php
}

//Calorias desde la grasa
function mm_producto_caloriasGrasa() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_caloriasGrasa" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$caloriasGrasa = get_post_meta( $post->ID, 'mm_producto_caloriasGrasa', true );
	
	?>
	<label for="mm_producto_caloriasGrasa">Ingrese las Calorías desde la grasa (Kcal)</label><br />
	<input type="text" name="mm_producto_caloriasGrasa" value="<?php echo $caloriasGrasa; ?>"  ><br />
	<?php
}

//Grasa total
function mm_producto_grasaTotal() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_grasaTotal" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$grasaTotal = get_post_meta( $post->ID, 'mm_producto_grasaTotal', true );
	
	?>
	<label for="mm_producto_grasaTotal">Ingrese la Grasa total (gr)</label><br />
	<input type="text" name="mm_producto_grasaTotal" value="<?php echo $grasaTotal; ?>"  ><br />
	<?php
}

//Grasa saturada
function mm_producto_grasaSaturada() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_grasaSaturada" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$grasaSaturada = get_post_meta( $post->ID, 'mm_producto_grasaSaturada', true );
	
	?>
	<label for="mm_producto_grasaSaturada">Ingrese la Grasa saturada (gr)</label><br />
	<input type="text" name="mm_producto_grasaSaturada" value="<?php echo $grasaSaturada; ?>"  ><br />
	<?php
}

//Grasa Insaturada
function mm_producto_grasaInsaturada() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_grasaInsaturada" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$grasaInsaturada = get_post_meta( $post->ID, 'mm_producto_grasaInsaturada', true );
	
	?>
	<label for="mm_producto_grasaInsaturada">Ingrese la Grasa Insaturada (gr)</label><br />
	<input type="text" name="mm_producto_grasaInsaturada" value="<?php echo $grasaInsaturada; ?>"  ><br />
	<?php
}

//Grasa Trans
function mm_producto_grasaTrans() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_grasaTrans" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$grasaTrans = get_post_meta( $post->ID, 'mm_producto_grasaTrans', true );
	
	?>
	<label for="mm_producto_grasaTrans">Ingrese la Grasa Trans (gr)</label><br />
	<input type="text" name="mm_producto_grasaTrans" value="<?php echo $grasaTrans; ?>"  ><br />
	<?php
}



//Colesterol
function mm_producto_colesterol() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_colesterol" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$colesterol = get_post_meta( $post->ID, 'mm_producto_colesterol', true );
	
	?>
	<label for="mm_producto_colesterol">Ingrese Colesterol (mg)</label><br />
	<input type="text" name="mm_producto_colesterol" value="<?php echo $colesterol; ?>"  ><br />
	<?php
}

//sodio
function mm_producto_sodio() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_sodio" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$sodio = get_post_meta( $post->ID, 'mm_producto_sodio', true );
	
	?>
	<label for="mm_producto_sodio">Ingrese  el sodio (mg)</label><br />
	<input type="text" name="mm_producto_sodio" value="<?php echo $sodio; ?>"  ><br />
	<?php
}

//sodio
function mm_producto_carbohidrato() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_carbohidrato" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$carbohidrato = get_post_meta( $post->ID, 'mm_producto_carbohidrato', true );
	
	?>
	<label for="mm_producto_carbohidrato">Ingrese carbohidratos </label><br />
	<input type="text" name="mm_producto_carbohidrato" value="<?php echo $carbohidrato; ?>"  ><br />
	<?php
}

//total
function mm_producto_total() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_total" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$total = get_post_meta( $post->ID, 'mm_producto_total', true );
	
	?>
	<label for="mm_producto_total">Ingrese total (gr) </label><br />
	<input type="text" name="mm_producto_total" value="<?php echo $total; ?>"  ><br />
	<?php
}



//Fibra dietaria (gr)	
function mm_producto_fibraDietaria() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_fibraDietaria" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$fibraDietaria = get_post_meta( $post->ID, 'mm_producto_fibraDietaria', true );
	
	?>
	<label for="mm_producto_fibraDietaria">Ingrese Fibra dietaria (gr) </label><br />
	<input type="text" name="mm_producto_fibraDietaria" value="<?php echo $fibraDietaria; ?>"  ><br />
	<?php
}

//Fibra insoluble (gr)
function mm_producto_fibraInsoluble() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_fibraInsoluble" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$fibraInsoluble = get_post_meta( $post->ID, 'mm_producto_fibraInsoluble', true );
	
	?>
	<label for="mm_producto_fibraInsoluble">Ingrese Fibra insoluble (gr) </label><br />
	<input type="text" name="mm_producto_fibraInsoluble" value="<?php echo $fibraInsoluble; ?>"  ><br />
	<?php
}

//Fibra soluble (gr)
function mm_producto_fibraSoluble() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_fibraSoluble" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$fibraSoluble = get_post_meta( $post->ID, 'mm_producto_fibraSoluble', true );
	
	?>
	<label for="mm_producto_fibraSoluble">Ingrese Fibra Soluble (gr) </label><br />
	<input type="text" name="mm_producto_fibraSoluble" value="<?php echo $fibraSoluble; ?>"  ><br />
	<?php
}

//Azúcares (gr)
function mm_producto_azucares() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_azucares" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$azucares = get_post_meta( $post->ID, 'mm_producto_azucares', true );
	
	?>
	<label for="mm_producto_azucares">Ingrese azúcares (gr) </label><br />
	<input type="text" name="mm_producto_azucares" value="<?php echo $azucares; ?>"  ><br />
	<?php
}

//Proteína (gr)
function mm_producto_proteina() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_proteina" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$proteina = get_post_meta( $post->ID, 'mm_producto_proteina', true );
	
	?>
	<label for="mm_producto_proteina">Ingrese proteína (gr) </label><br />
	<input type="text" name="mm_producto_proteina" value="<?php echo $proteina; ?>"  ><br />
	<?php
}



//Vitamina A %
function mm_producto_vitaminaA() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_vitaminaA" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$vitaminaA = get_post_meta( $post->ID, 'mm_producto_vitaminaA', true );
	
	?>
	<label for="mm_producto_vitaminaA">Ingrese Vitamina A %</label><br />
	<input type="text" name="mm_producto_vitaminaA" value="<?php echo $vitaminaA; ?>"  ><br />
	<?php
}

//Vitamina C %
function mm_producto_vitaminaC() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_vitaminaC" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$vitaminaC = get_post_meta( $post->ID, 'mm_producto_vitaminaC', true );
	
	?>
	<label for="mm_producto_vitaminaC">Ingrese Vitamina C %</label><br />
	<input type="text" name="mm_producto_vitaminaC" value="<?php echo $vitaminaC; ?>"  ><br />
	<?php
}
//Calcio %	
function mm_producto_calcio() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_calcio" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$calcio = get_post_meta( $post->ID, 'mm_producto_calcio', true );
	
	?>
	<label for="mm_producto_calcio">Ingrese calcio %</label><br />
	<input type="text" name="mm_producto_calcio" value="<?php echo $calcio; ?>"  ><br />
	<?php
}
//Hierro %	
function mm_producto_hierro() {
	global $post;
	?>
	<input type="hidden" name="productometa_noncename_hierro" id="productometa_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>">
	<?php
	$hierro = get_post_meta( $post->ID, 'mm_producto_hierro', true );
	
	?>
	<label for="mm_producto_hierro">Ingrese hierro %</label><br />
	<input type="text" name="mm_producto_hierro" value="<?php echo $hierro; ?>"  ><br />
	<?php
}


/** Save **/
function mm_save_producto_meta( $post_id, $post ) {
	global $post;
		
	if ( !wp_verify_nonce( $_POST['productometa_noncename_marca'], plugin_basename( __FILE__ ) ) ||	!wp_verify_nonce( $_POST['productometa_noncename_fabricante'], plugin_basename( __FILE__ ) ) || !wp_verify_nonce( $_POST['productometa_noncename_tamanoPorcion'], plugin_basename( __FILE__ ) ) || !wp_verify_nonce( $_POST['productometa_noncename_medidaCasera'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_valorEnergetico'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_caloriasGrasa'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_grasaTotal'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_grasaSaturada'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_grasaInsaturada'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_grasaTrans'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_colesterol'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_sodio'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_carbohidrato'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_total'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_fibraDietaria'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_fibraInsoluble'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_fibraSoluble'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_azucares'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_proteina'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_vitaminaA'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_vitaminaC'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_calcio'], plugin_basename( __FILE__ )) || !wp_verify_nonce( $_POST['productometa_noncename_hierro'], plugin_basename( __FILE__ )) )
		return $post->ID;

	if ( !current_user_can( 'edit_post', $post->ID ) )
		return $post->ID;

	$productos_meta['mm_producto_marca'] = $_POST['mm_producto_marca'];
	$productos_meta['mm_producto_fabricante'] = $_POST['mm_producto_fabricante'];
	$productos_meta['mm_producto_tamanoPorcion'] = $_POST['mm_producto_tamanoPorcion'];
	$productos_meta['mm_producto_medidaCasera'] = $_POST['mm_producto_medidaCasera'];
	$productos_meta['mm_producto_valorEnergetico'] = $_POST['mm_producto_valorEnergetico'];
	$productos_meta['mm_producto_caloriasGrasa'] = $_POST['mm_producto_caloriasGrasa'];
	$productos_meta['mm_producto_grasaTotal'] = $_POST['mm_producto_grasaTotal'];
	$productos_meta['mm_producto_grasaSaturada'] = $_POST['mm_producto_grasaSaturada'];
	$productos_meta['mm_producto_grasaInsaturada'] = $_POST['mm_producto_grasaInsaturada'];
	$productos_meta['mm_producto_grasaTrans'] = $_POST['mm_producto_grasaTrans'];
	$productos_meta['mm_producto_colesterol'] = $_POST['mm_producto_colesterol'];
	$productos_meta['mm_producto_sodio'] = $_POST['mm_producto_sodio'];
	$productos_meta['mm_producto_carbohidrato'] = $_POST['mm_producto_carbohidrato'];
	$productos_meta['mm_producto_total'] = $_POST['mm_producto_total'];
	$productos_meta['mm_producto_fibraDietaria'] = $_POST['mm_producto_fibraDietaria'];
	$productos_meta['mm_producto_fibraInsoluble'] = $_POST['mm_producto_fibraInsoluble'];
	$productos_meta['mm_producto_fibraSoluble'] = $_POST['mm_producto_fibraSoluble'];
	$productos_meta['mm_producto_azucares'] = $_POST['mm_producto_azucares'];
	$productos_meta['mm_producto_proteina'] = $_POST['mm_producto_proteina'];
	$productos_meta['mm_producto_vitaminaA'] = $_POST['mm_producto_vitaminaA'];
	$productos_meta['mm_producto_vitaminaC'] = $_POST['mm_producto_vitaminaC'];
	$productos_meta['mm_producto_calcio'] = $_POST['mm_producto_calcio'];
	$productos_meta['mm_producto_hierro'] = $_POST['mm_producto_hierro'];

	
	foreach ( $productos_meta as $key => $value ) {
			if ( $post->post_type == 'revision' )
				return;
			$value = implode( ",", (array) $value );
			if ( get_post_meta( $post->ID, $key, false ) )
				update_post_meta( $post->ID, $key, $value );
			else
				add_post_meta( $post->ID, $key, $value );
			if ( !$value )
				delete_post_meta( $post->ID, $key );
	}


}

add_action( 'save_post', 'mm_save_producto_meta', 1, 2 );


