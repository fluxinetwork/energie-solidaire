<header class="l-page__header l-page__header--wormz">
	<hgroup class="l-page__header__hgroup">
		<h1 class="t-title"><?php echo get_the_title(); ?></h1>
		<h2 class="t-subtitle"><?php echo get_field('visee'); ?></h2>
	</hgroup>

	<div class="l-duo l-duo--respond l-jump">
		<div class="l-duo__item l-duo__item--left">
			<div class="l-duo__item__content bg-dark">
				<div class="projet-detail">
					<div class="projet-detail__title">
						<span class="t-miniH t-miniH--glow">Soutien apporté</span>
					</div>
					<div class="projet-detail__content">
						<span class="projet-soutien"><?php echo get_field('soutien_apporte'); ?>€</span>
					</div>
				</div>
			</div>
		</div>
		<div class="l-duo__item l-duo__item--right">
			<div class="l-duo__item__content bg-main">
				<div class="projet-detail">
					<div class="projet-detail__title">
						<span class="t-miniH t-miniH--glow">Structure porteuse</span>
					</div>
					<div class="projet-detail__content">
						<div class="projet-porteur"><?php echo get_field('structure_porteuse'); ?></div>
					</div>
				</div>
			</div>
		</div>
		<div class="l-duo__junction">
			<div class="c-roundButton c-roundButton--ghost c-white"><i class="fa fa-arrow-right"></i></div>
		</div>
	</div>

	<div class="l-col l-col--content l-jump">
		<div class="l-cell__title">
			<span class="c-tiltedTitle">Public cible</span>
		</div>
		<p class="t-align--c"><?php echo get_field('public_cible'); ?></p>
	</div>

	<?php
	if ( is_page_template( 'page-templates/actions-soutenues.php' ) ) {

		$output = '<div class="l-jump l-center">';
		$output .= '<a href='. get_permalink() .'" class="c-button c-button--cta"><i class="fa fa-plus c-button__icon"></i>En savoir plus</a>'; 
		$output .= '</div>';

		echo $output;

	}
	?>
</header>