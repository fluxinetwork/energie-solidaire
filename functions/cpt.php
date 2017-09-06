<?php

/* | CPT & TAXONOMY - V1.0 - 00/00/00 | 
-------------------------------------------------------
   | create_cpts()
   |
*/

if ( CUSTOM_POST_TYPE ) {
	// CPT 
	function create_cpts() {
		$labels_don_ponctuel = array(
			'name' => __( 'Dons ponctuels', '' ),
			'singular_name' => __( 'Don ponctuel', '' ),
			);

		$args_don_ponctuel = array(
			'label' => __( 'Dons ponctuels', '' ),
			'labels' => $labels_don_ponctuel,
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => false,
			'rest_base' => '',
			'has_archive' => false,
			'show_in_menu' => true,
			'exclude_from_search' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'rewrite' => array( 'slug' => 'dons-ponctuels', 'with_front' => false ),
			'query_var' => true,

			'supports' => array( 'title', 'author' ),
			//'taxonomies' => array( 'category', 'post_tag' ),
		);
		register_post_type( 'dons-ponctuels', $args_don_ponctuel );


	}
	add_action( 'init', 'create_cpts' );


}


if ( CUSTOM_TAXONOMY ) {
	//fluxi_register_custom_taxo('filtres', 'Filtres', array('offres-emploi'), false);
}