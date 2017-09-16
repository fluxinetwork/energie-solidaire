<?php
/**
 * The template part for displaying the content
 */
?>

<article>

	<header class="projet-header l-largeCell">
		<div class="hp-decor hp-cloud hp-cloud-pos1 hp-cloud1"></div>
		<div class="hp-decor hp-cloud hp-cloud-pos2 hp-cloud2"></div>

		<hgroup class="projet-header__hgroup">
			<h1 class="projet-title"><?php echo get_the_title(); ?></h1>
		</hgroup>
	</header>
	
	<div class="l-col l-col--content l-innerRythm content">
		<?php the_content(); ?>			
	</div>

</article>


