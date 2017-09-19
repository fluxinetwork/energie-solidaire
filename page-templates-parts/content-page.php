<?php
/**
 * The template part for displaying the content
 */
?>

<article class="l-page">

	<header class="l-page__header">
		<hgroup class="l-page__header__hgroup">
			<h1 class="t-title"><?php echo get_the_title(); ?></h1>
		</hgroup>
	</header>
	
	<div class="l-page__content content">
		<?php the_content(); ?>			
	</div>

</article>


