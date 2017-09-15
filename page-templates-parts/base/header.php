<header id="header" class="header" role="header">
	<a  href="<?php bloginfo('url'); ?>" class="header__logo">
		<div class="header__logo__content">
			<img src="<?php bloginfo('template_url'); ?>/app/img/logo.svg">
		</div>
	</a>
	
	<div class="header__nav js-nav">
		<nav class="header__nav__primary js-nav-primary" role="navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' 	=> 'main-menu',
					'container'			=> '',
					'menu_class' 		=> '',
					'echo' 				=> true,
					'items_wrap'		=> '%3$s',
					'depth'         	=> 1,
					'walker'        	=> new fluxi_walker_nav_menu
				) );
			?>
		</nav>

		<nav class="header__nav__secondary js-nav-secondary" role="navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' 	=> 'secondaire-menu',
					'container'			=> '',
					'menu_class' 		=> '',
					'echo' 				=> true,
					'items_wrap'		=> '%3$s',
					'depth'         	=> 1,
					'walker'        	=> new fluxi_walker_secondaire_menu
				) );
			?>
			<a href="<?php echo get_permalink(PAGE_DON); ?>" class="c-button c-button--cta" id="nav-cta"><i class="c-button__icon fa fa-heart"></i>Donner</a>	
		</nav>
	</div>

	<div class="header__hamburger">
		<button class="c-roundButton c-roundButton--ghost c-roundButton--2icon js-toggle-menu"><i class="fa fa-bars"></i><i class="fa fa-times"></i></button>	
	</div>
</header>

