<div class="l-page">
	<?php require_once( get_template_directory() . '/page-templates-parts/header-projet.php' );?>	

	<div class="l-page__content l-page__content--aside"> 
		<div class="l-page__content__main content">
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

		<aside class="l-page__content__aside">
			<div class="projet-contact l-cell l-cell--bg">
				<div class="l-cell__title">
					<span class="c-tiltedTitle">Contact</span>				
				</div>

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
			</div>

			<?php

			if ( get_field('lien_externe_du_projet') ) {

				$output = '<div class="l-cell l-cell--bg projet-links">';

				$output .= '<div class="l-cell__title"><span class="c-tiltedTitle">Liens</span></div>'; 

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

			<button class="projet-shareBt bg-facebook js-share" data-url="<?php echo get_permalink(); ?>" data-network="facebook"><i class="fa fa-share-square"></i>Partager sur Facebook</button>
			<button class="projet-shareBt bg-twitter js-share" data-url="<?php echo get_permalink(); ?>" data-network="twitter"><i class="fa fa-share-square"></i>Partager sur Twitter</button>	
		</aside>
	</div>
</div>

<section class="l-page__more">
	<div class="l-page__more__title">
		<h2 class="c-sectionTitle"><span class="underline">Découvrir</span> d'autres projets</h2>
	</div>

	<div class="l-page__more__content">
		<?php require_once( get_template_directory() . '/page-templates-parts/slider-projets.php' );?>
	</div>
</section>