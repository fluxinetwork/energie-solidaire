<?php

get_header(); 

echo '<article>';

	if ( have_posts() ) :

		while ( have_posts() ) : the_post();   

			if ( is_singular('post') ) {
				
				require_once( get_template_directory() . '/page-templates-parts/content-single.php' );

			} else if ( is_singular('projets') ) {

				require_once( get_template_directory() . '/page-templates-parts/content-projet.php' );

			}

		endwhile;

	else:

  		require_once( get_template_directory() . '/page-templates-parts/content-none.php' );

	endif;

echo '</article>';

get_footer();

?>