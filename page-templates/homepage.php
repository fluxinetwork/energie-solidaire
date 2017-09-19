<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<section class="hp-intro">

	<div class="hp-intro__content">
		<h1 class="c-heroTxt"><?php echo get_field('texte_intro', false, false); ?></h1>
	</div>

	<div class="hp-decor hp-cloud hp-cloud-pos1 hp-cloud1"></div>
	<div class="hp-decor hp-cloud hp-cloud-pos2 hp-cloud2"></div>
	
	<div class="hp-intro__ground">
		<div class="hp-decor hp-ground-decor hp-leftHouse"></div>
		<div class="hp-decor hp-ground-decor hp-family"></div>
		<div class="hp-decor hp-ground-decor hp-rightHouse"></div>
	</div>
</section>

<section class="hp-video l-padding">
	<div class="hp-video__title"><?php echo get_field('titre_video'); ?><br><span><?php echo get_field('sous-titre_video'); ?></span></div>
	

	<div class="hp-decor hp-cloud-pos3 hp-cloud-flip">
		<div class="hp-decor hp-cloud hp-cloud2"></div>
	</div>

	<div class="hp-decor hp-cloud-pos4 hp-cloud-flip">
		<div class="hp-decor hp-cloud hp-cloud1"></div>
	</div>

	<div class="hp-video__player l-jump js-fitVids">
		<?php echo get_field('video'); ?>
	</div>
	
	<div class="hp-video__txt l-jump l-col">
		<p><?php echo get_field('sous_texte_video'); ?></p>
	</div>

	<div class="hp-video__button l-jump">
		<a href="<?php echo get_field('lien_video'); ?>" class="c-button"><i class="c-button__icon fa fa-plus"></i>En savoir plus</a>
	</div>

	<div class="hp-video__decor">
		<div class="hp-wrapMountain">
			<div class="hp-decor hp-mountain"></div>			
		</div>

		<div class="hp-wrapMountain hp-wrapMountain--flip">
			<div class="hp-decor hp-mountain"></div>
		</div>
	</div>
</section>

<section class="l-page__section">
	<div class="l-page__section__title">
		<h2 class="c-sectionTitle"><?php echo get_field('titre_section_don'); ?></h2>
	</div>
	
	<div class="l-page__section__content content hp-glowing-shape hp-glowing-shape--rect">
		<h3><?php echo get_field('titre_texte_don_1'); ?></h3>
		<p><?php echo get_field('texte_don_1'); ?></p>
		<a href="<?php echo get_field('lien_don_1'); ?>" class="c-link">En savoir plus</a>
		<img src="<?php bloginfo('template_url'); ?>/app/img/homepage/micro-don.png" class="hp-micro-don">
	</div>

	<div class="l-page__section__content content hp-glowing-shape hp-glowing-shape--round">
		<h3><?php echo get_field('titre_texte_don_2'); ?></h3>
		<p><?php echo get_field('texte_don_2'); ?></p>
		<a href="<?php echo get_field('lien_don_energie'); ?>" class="c-link">En savoir plus</a>
	</div>

	<div class="l-duo l-duo--respond l-jump">
		<div class="l-duo__title is-none">
			<span class="c-tiltedTitle">2 formes de don d'énergie</span>
		</div>

		<div class="l-duo__item l-duo__item--left bg-dark">
			<div class="l-duo__item__content hp-forme-don">
				<span class="t-miniH t-miniH--glow">Professionnels</span>
				<div class="hp-forme-don__illustration">
					<img src="<?php bloginfo('template_url'); ?>/app/img/homepage/don-energie-pro.png"></img>
				</div>
				<p class="hp-forme-don__txt"><?php echo get_field('texte_professionels'); ?></p>
			</div>
		</div>

		<div class="l-duo__item l-duo__item--right bg-main">
			<div class="l-duo__item__content hp-forme-don">
				<span class="t-miniH t-miniH--glow">Particuliers</span>
				<div class="hp-forme-don__illustration">
					<img src="<?php bloginfo('template_url'); ?>/app/img/homepage/don-energie-particulier.png"></img>
				</div>
				<p class="hp-forme-don__txt"><?php echo get_field('texte_particuliers'); ?></p>
			</div>
		</div>
	</div>
</section>

<section class="l-page__more">
	<div class="l-page__more__title">
		<h2 class="c-sectionTitle"><?php echo get_field('titre_projets'); ?></h2>		
	</div>
	
	<div class="l-page__more__content">
		<?php require_once( get_template_directory() . '/page-templates-parts/slider-projets.php' );?>		
	</div>
</section>

<?php get_footer(); ?>

