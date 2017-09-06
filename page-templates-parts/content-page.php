<?php
/**
 * The template part for displaying the content
 */
?>

<article class="l-col l-col--content <? ( is_page() ) ? print('page') : print('article'); ?>">

	<header>
		<?php the_title( '<h1>', '</h1>' ); ?>
	</header>

	<?php the_content(); ?>	

</article>


