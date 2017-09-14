<header class="projet-header l-largeCell">

	<div class="hp-decor hp-cloud hp-cloud-pos1 hp-cloud1"></div>
	<div class="hp-decor hp-cloud hp-cloud-pos2 hp-cloud2"></div>

	<div class="l-col l-col--content">
		<h1 class="projet-title"><?php echo get_the_title(); ?></h1>
		<h2 class="projet-subtitle"><?php echo get_field('visee'); ?></h2>
	</div>

	<div class="l-duo l-duo--respond l-jump">
		<div class="l-duo__item l-duo__item--left">
			<div class="l-duo__item__content bg-dark">
				<div class="projet-detail">
					<div class="projet-detail__title">
						<span class="t-miniH t-miniH--glow">Soutien apporté</span>
					</div>
					<div class="projet-detail__content">
						<span class="projet-soutien"><?php echo get_field('soutien_apporte'); ?> €</span>
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
	
	<div class="l-jump l-center">
		<span class="c-tiltedTitle">Public cible</span>
	</div>
	<p class="l-col l-col--content t-align--c"><?php echo get_field('public_cible'); ?></p>
</header>