<?php

/* | MENU & WALKER - V1.0 - 22/03/2017 | 
-------------------------------------------------------
   | 
*/

function register_main_menu() {
  register_nav_menu('main-menu','Main Menu');
}
add_action( 'init', 'register_main_menu' );
/*
 * Walker menu
 */
class fluxi_walker_nav_menu extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args= array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );
		$post_id = get_post_meta( $item->ID, '_menu_item_object_id', true );
		$post_categories = get_the_category($post_id);
    	//$main_cat_id = $post_categories[0]->cat_ID;
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		//$output .= $indent . '<li class="l-header__categories__wraplist__list__item">';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="c-navLink' . ( $depth > 0 ? '' : '' ) . '"';
		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args= array() );
	}  	
}

function register_secondaire_menu() {
  register_nav_menu('secondaire-menu','Menu secondaire');
}
add_action( 'init', 'register_secondaire_menu' );
/*
 * Walker menu
 */
class fluxi_walker_secondaire_menu extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args= array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );
		$post_id = get_post_meta( $item->ID, '_menu_item_object_id', true );
		$post_categories = get_the_category($post_id);
    	//$main_cat_id = $post_categories[0]->cat_ID;
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		//$output .= $indent . '<li class="l-header__categories__wraplist__list__item">';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="c-navLink c-navLink--light' . ( $depth > 0 ? '' : '' ) . '"';
		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args= array() );
	}  	
}

function register_footer_menu() {
  register_nav_menu('footer-menu','Menu pied de page');
}
add_action( 'init', 'register_footer_menu' );
/*
 * Walker menu
 */
class fluxi_walker_footer_menu extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args= array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );
		$post_id = get_post_meta( $item->ID, '_menu_item_object_id', true );
		$post_categories = get_the_category($post_id);
    	//$main_cat_id = $post_categories[0]->cat_ID;
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		//$output .= $indent . '<li class="l-header__categories__wraplist__list__item">';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="c-navLink' . ( $depth > 0 ? '' : '' ) . '"';
		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args= array() );
	}  	
}