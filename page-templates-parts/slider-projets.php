<div class="l-dotSlider l-vRythm js-dotSlider">
	<div class="l-dotSlider__items js-dotSlider-items">

		<?php
			$exclude = '';
			if ( is_singular('projets') ) {
				$exclude = get_the_ID();
			}

			$args_projects = array(
				'post_type' 	=> 'projets',
				'post_status' 	=> 'any', #temp
				'post__not_in' 	=> array($exclude)
			);
			$query_projects = new WP_Query( $args_projects );
			if ( $query_projects->have_posts() ) :

				$output = '';

				while ( $query_projects->have_posts() ) :$query_projects->the_post();

					$img_projet_arr = get_field('image_du_projet');
					$img_projet_url = $img_projet_arr['sizes']['thumbnail'];

					$output .= '<div class="l-dotSlider__items__item js-dotSlider-item">';
						$output .= '<a href="'.get_permalink().'">';
							$output .= '<article class="c-projectCard">';
							
							if ( get_field('lieu_projet') ) {
								$output .= '<div class="c-projectCard__city"><span class="c-tiltedTitle">'. get_field('lieu_projet') .'</span></div>';
							}
									
								$output .= '<img src="'. $img_projet_url .'" class="c-projectCard__img">';
								$output .= '<h1 class="c-projectCard__title">'. cut_string(get_the_title(), 50) .'</h1>';
								$output .= '<h2 class="c-projectCard__excerpt">'. get_field('visee') .'</h2>';
				
								$output .= '<div class="c-projectCard__more"><span class="t-miniH t-miniH--glow">Découvrir<br>le projet</span></div>';
							$output .= '</article>';
						$output .= '</a>';
					$output .= '</div>';
				
				endwhile;

				echo $output;

			endif;
			wp_reset_postdata();
		?>
		
	</div>
</div>