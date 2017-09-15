<div class="l-dotSlider l-vRythm js-dotSlider">
	<div class="l-dotSlider__items js-dotSlider-items">

		<?php
			$exclude = '';
			if ( is_singular('projets') ) {
				$exclude = get_the_ID();
			}

			$args_projects = array(
				'post_type' 	=> 'projets',
				'post_status' 	=> 'publish',
				'post__not_in' 	=> array($exclude)
			);
			$query_projects = new WP_Query( $args_projects );
			if ( $query_projects->have_posts() ) :
				while ( $query_projects->have_posts() ) :$query_projects->the_post();

					$img_projet_arr = get_field('image_du_projet');
					$img_projet_url = $img_projet_arr['sizes']['thumbnail'];

					echo '<div class="l-dotSlider__items__item js-dotSlider-item">
							<a href="'.get_permalink().'">
								<article class="c-projectCard">
					
									<div class="c-projectCard__city">
										<span class="c-tiltedTitle">'.get_field('lieu_projet').'</span>
									</div>
									<img src="'.$img_projet_url.'" class="c-projectCard__img">
									<h1 class="c-projectCard__title">'.get_the_title().'</h1>
									<h2 class="c-projectCard__excerpt">'.get_field('visee').'</h2>
					
									<div class="c-projectCard__more">
										<span class="t-miniH t-miniH--glow">Découvrir<br>le projet</span>
									</div>
								</article>
							</a>	
						</div>';
				
				endwhile;
			endif;
			wp_reset_postdata();
		?>
		
	</div>
</div>