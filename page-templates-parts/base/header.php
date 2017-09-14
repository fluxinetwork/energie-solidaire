<header id="header" class="header" role="header">
	<a  href="<?php bloginfo('url'); ?>" class="header__logo">
		<div class="header__logo__content">
			<img src="<?php bloginfo('template_url'); ?>/app/img/logo.svg">
		</div>
	</a>
	
	<div class="header__nav js-nav">
		<nav class="header__nav__primary js-nav-primary" role="navigation">
			<a href="#" class="c-navLink">Précarité énergétique</a>
			<a href="#" class="c-navLink">Comment agir</a>
			<a href="#" class="c-navLink">Projets soutenus</a>
		</nav>

		<nav class="header__nav__secondary js-nav-secondary" role="navigation">
			<a href="#" class="c-navLink c-navLink--light">À propos</a>
			<a href="#" class="c-navLink c-navLink--light">Actualités</a>
			<a href="#" class="c-navLink c-navLink--light">Presse</a>
			<a href="#" class="c-button c-button--cta" id="nav-cta"><i class="c-button__icon fa fa-heart"></i>Donner</a>	
		</nav>
	</div>

	<div class="header__hamburger">
		<button class="c-roundButton c-roundButton--ghost c-roundButton--2icon js-toggle-menu"><i class="fa fa-bars"></i><i class="fa fa-times"></i></button>	
	</div>
</header>