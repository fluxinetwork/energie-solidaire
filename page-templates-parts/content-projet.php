<header class="projet-header l-largeCell">

	<div class="hp-decor hp-cloud hp-cloud-pos1 hp-cloud1"></div>
	<div class="hp-decor hp-cloud hp-cloud-pos2 hp-cloud2"></div>

	<hgroup class="projet-header__hgroup">
		<h1 class="projet-title"><?php echo get_the_title(); ?></h1>
		<h2 class="projet-subtitle"><?php echo get_field('visee'); ?></h2>
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
	
	<div class="l-jump l-center">
		<span class="c-tiltedTitle">Public cible</span>
	</div>
	<p class="l-col l-col--content t-align--c"><?php echo get_field('public_cible'); ?></p>
</header>

<div class="l-innerRythm l-col l-col--aside">
	<div class="l-content__main content">
		<h2 class="c-sectionTitle"><span class="underline">Description</span> du projet</h2>
		<p><?php echo get_field('description_projet'); ?>€</p>
		
		<?php
		if ( get_field('video_projet') ) {
			echo '<div class="js-fitVids l-jump">'. get_field('video_projet') .'</div>';
		}
		?>

		<h2 class="c-sectionTitle"><span class="underline">Structure</span> porteuse</h2>
		<p><?php echo get_field('description_porteur'); ?>€</p>

		<h2 class="c-sectionTitle"><span class="underline">Objectif</span> visé</h2>
		<p><?php echo get_field('objectif_vise'); ?>€</p>
	</div>

	<aside class="l-content__aside">
		<div class="projet-contact aside-cell ">
			<?php

			if ( get_field('photo_contact') ||  get_field('logo_porteur') ) {

				if ( get_field('photo_contact') ) {

					$img_contact__array = get_field('photo_contact');

				} elseif (  get_field('logo_porteur') ) {

					$img_contact__array = get_field('logo_porteur');

				}

				$img_contact = $img_contact__array['sizes']['thumbnail'];
				echo '<img src="'. $img_contact .'" class="projet-contact__img">';

			}

			if ( get_field('nom_prenom') ) {
				echo '<p class="projet-contact__nom">'. get_field('nom_prenom') .'</p>';
			}

			if ( get_field('contact_porteur') ) {
				$email = get_field('contact_porteur');
				echo '<a href="mailto:'. $email .'" class="projet-contact__mail">'. $email .'</a>';
			}

			if ( get_field('facebook') ||  get_field('twitter')  ||  get_field('site_internet') ) {

				if ( get_field('facebook') &&  get_field('twitter')  &&  get_field('site_internet') ) {

					$output = '<div class="projet-contact__liens flex--jcsb">';

				} else {

					$output = '<div class="projet-contact__liens">';

				}

				if ( get_field('facebook') ) {

					$output .= '<a href="'. get_field('facebook') .'" class="c-roundButton" target="_blank"><i class="fa fa-facebook"></i></a>';

				}

				if (  get_field('twitter') ) {

					$output .= '<a href="'. get_field('twitter') .'" class="c-roundButton" target="_blank"><i class="fa fa-twitter"></i></a>';

				}

				if ( get_field('site_internet') ) {

					$output .= '<a href="'. get_field('site_internet') .'" class="c-roundButton" target="_blank"><i class="fa fa-external-link-square"></i></a>';

				}

				$output .= '</div>';

				echo $output;

			}

			?>

			<div class="aside-cell__title">
				<span class="c-tiltedTitle">Contact</span>				
			</div>
		</div>

		<?php

		if ( get_field('lien_externe_du_projet') ) {

			$output = '<div class=" aside-cell projet-links">';

			$output .= '<div class="aside-cell__title"><span class="c-tiltedTitle">Liens</span></div>'; 

			while ( have_rows('lien_externe_du_projet') ) : the_row();

				$txt = get_sub_field('texte_lien');
				$link = get_sub_field('url_lien');
				$icon = ( substr($link, -3) == 'pdf' ) ? 'fa-cloud-download' : 'fa-external-link-square';

				$output .= '<a href="'. $link .'" class="projet-links__item" target="_blank"><div class="c-roundButton"><i class="fa '. $icon .' "></i></div>'. $txt .'</a>';

			endwhile;

			wp_reset_postdata();

			$output .= '</div>';

			echo $output;

		}

		?>

		<button class="projet-shareBt bg-facebook js-share" data-url="<?php echo get_permalink(); ?>" data-network="facebook">Partager sur Facebook</button>
		<button class="projet-shareBt bg-twitter js-share" data-url="<?php echo get_permalink(); ?>" data-network="twitter">Partager sur Twitter</button>	
	</aside>
</div>

<section class="l-innerRythm">
	<h2 class="c-sectionTitle l-col l-col--content"><span class="underline">Découvrir</span> d'autres projets</h2>
	
	<?php require_once( get_template_directory() . '/page-templates-parts/slider-projets.php' );?>
</section>