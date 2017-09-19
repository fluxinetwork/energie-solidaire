<?php
/*
Template Name: Actions soutenues
*/
?>

<?php get_header(); ?>

<article class="l-page">
	<header class="l-page__header l-page__header--glowingShape">
		<hgroup class="l-page__header__hgroup">
			<h1 class="t-title"><?php echo get_the_title(); ?></h1>
			<h2 class="t-subtitle"><?php echo get_field('extrait'); ?></h2>
		</hgroup>
	</header>
			
	<?php
	$args = array(
		'post_type' => 'projets'
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) :
			$query->the_post();
			echo '<article>';
			include( get_template_directory() . '/page-templates-parts/header-projet.php' );
			echo '</article>';
		endwhile;
	endif;
	wp_reset_postdata();
	?>
</article>

<?php get_footer(); ?>


