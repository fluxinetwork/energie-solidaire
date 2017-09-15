<footer id="footer" class="footer l-innerRythm" role="footer">
	<div class="footer__backTop">
		<button class="c-roundButton c-roundButton--ghost js-scroll-top"><i class="fa fa-arrow-up"></i></button>		
	</div>

	<div class="footer__row l-col l-col--content">
		<?php
			wp_nav_menu( array(
				'theme_location' 	=> 'footer-menu',
				'container'			=> '',
				'menu_class' 		=> '',
				'echo' 				=> true,
				'items_wrap'		=> '%3$s',
				'depth'         	=> 1,
				'walker'        	=> new fluxi_walker_nav_menu
			) );
		?>
	</div>

	<div class="footer__row l-col l-col--content">
		<a href="<?php echo FACEBOOK; ?>" class="c-roundButton"><i class="fa fa-facebook"></i></a>
		<a href="<?php echo TWITTER; ?>" class="c-roundButton"><i class="fa fa-twitter"></i></a>
		<a href="<?php echo YOUTUBE; ?>" class="c-roundButton"><i class="fa fa-youtube-play"></i></a>
	</div>
</footer>