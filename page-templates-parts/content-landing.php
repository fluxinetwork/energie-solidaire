<?php
/**
 * The template part for displaying the content of the landing page
 */
?>

<section class="landing">

	<header class="landing__header">		
		<div class="landing__logo">
			<img width="144" height="150" alt="Energie Solidaire" class="landing__logo__img" src="<?php echo THEME_DIR_PATH.'/app/img/landing/svg/logo.svg'; ?>">
			<span class="landing__follow"><a href="https://www.facebook.com/energiesolidaire" class="landing__follow__link icon-fb" target="_blank"></a> <a href="https://twitter.com/Energie_SolidR" class="landing__follow__link icon-twitter" target="_blank"></a></span>
		</div>
		<div class="landing__header__content">
			<h1 class="landing__maintitle">En France, 11 millions de personnes sont touchées par la précarité énergétique.</h1>
			<p class="landing__header__txt">Un fléau quasi invisible et méconnu qui a des conséquences sur la santé, le bien-être et le budget d’un ménage sur cinq. La précarité énergétique est aussi une plaie pour la planète, mais des solutions existent pour la combattre.</p>
			<span class="landing__header__claim">Agissons !</span>
		</div>
		<ul class="landing__header__deco">
			<li class="icon-ampoule"></li>
			<li class="icon-ampoule"></li>
			<li class="icon-ampoule"></li>
			<li class="icon-ampoule"></li>
			<li class="icon-ampoule"></li>
			<li class="icon-ampoule"></li>
		</ul>
	</header>

	<article class="landing__article">

		<div class="fitvids landing__video">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/xvZootvRCBw?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
		</div>

		<h2 class="landing__title">Prochainement sur ce site</h2>
		<ul class="landing__claims">
			<li class="landing__claims__item"><strong>trouvez</strong> de l’information sur la précarité énergétique</li>
			<li class="landing__claims__item"><strong>soutenez</strong> des projets de lutte contre la précarité énergétique</li>
			<li class="landing__claims__item"><strong>proposez</strong> des projets de lutte contre la précarité énergétique</li>
		</ul>

		<aside class="landing__subscribe">
			<form class="subscribe" id="subscribe" role="form">				
				<h3 class="landing__subtitle">Pour suivre les actualités du projet</h3>				
				<span class="subscribe__input">
					<input class="subscribe__input__field" type="text" name="email" placeholder="entrez votre email">
					<input type="hidden" value="9439541686" name="toky_toky">
				    <?php wp_nonce_field( 'fluxi_subscribe', 'fluxi_subscribe_nonce_field' ); ?>
					<button class="subscribe__input__button" type="submit">OK</button>
				</span>								
			</form>	
			<div class="landing__notify"></div>	
			<span class="landing__follow"><span class="p--small">ou suivez nous sur</span> <a href="https://www.facebook.com/energiesolidaire" class="landing__follow__link icon-fb" target="_blank"></a> <a href="https://twitter.com/Energie_SolidR" class="landing__follow__link icon-twitter" target="_blank"></a></span>

		</aside>
	</article>

	<article class="about grid">		
		<div class="grid__col about__logos">
			<ul class="about__logos__content">
				<li><img alt="Les amis d'Enercoop" src="<?php echo THEME_DIR_PATH.'/app/img/landing/png/logo-amis-enercoop.png'; ?>"></li>
				<li><img alt="Enercoop" src="<?php echo THEME_DIR_PATH.'/app/img/landing/png/logo-enercoop.png'; ?>"></li>
				<li><img alt="Energie Partagée" src="<?php echo THEME_DIR_PATH.'/app/img/landing/png/logo-ep.png'; ?>"></li>
				<li><img alt="Dr Watt" src="<?php echo THEME_DIR_PATH.'/app/img/landing/png/logo-dr-watt.png'; ?>"></li>
			</ul>
		</div>
		<div class="grid__col about__infos">
			<div class="about__infos__content">
				<h2 class="landing__title--nob">Qui sommes-nous ?</h2>
				<p>L'association Les Amis d'Enercoop soutient l'action des citoyens en faveur d'une transition énergétique fondée sur la sobriété, l'efficacité et la solidarité, autant de prérequis à sa réussite.<br><br>

				C'est dans cette dynamique initiée à la création de l'association en 2008 qu'Énergie Solidaire s'inscrit, succédant à des projets tels que Docteur Watt et Énergie Partagée dont elle est à l'origine.<br><br>

				Son objectif ? Permettre la réalisation d'actions concrètes et adaptées aux problèmes de précarité énergétique rencontrés sur l'ensemble du territoire.

				<a class="link" href="http://www.lesamisdenercoop.org/" target="_blank">www.lesamisdenercoop.org</a>
				</p>	
			</div>		
		</div>		
	</article>

	<article class="landing__article--cta">
		<h2 class="landing__title">Agir dès aujourd’hui</h2>
		<p class="landing__article--cta__txt">La précarité énergétique est une urgence sociale, soutenez-nous.</p>
		<a href="<?php echo home_url(); ?>/faire-un-don/" class="button--cta"><span>je fais un don</span></a>
		
		<ul class="landing__article--cta__deco">
			<li class="icon-ampoule"></li>
			<li class="icon-ampoule"></li>
			<li class="icon-ampoule"></li>
			<li class="icon-ampoule"></li>
			<li class="icon-ampoule"></li>
			<li class="icon-ampoule"></li>
		</ul>
	</article>

	<aside class="landing__supports">
		<h3 class="landing__subtitle">Ils nous soutiennent</h3>
		<ul class="landing__supports__list">
			<li><img alt="Rexel Fondation" src="<?php echo THEME_DIR_PATH.'/app/img/landing/png/logo-rexel-fondation.png'; ?>"></li>
			<li><img alt="Macif Fondation" src="<?php echo THEME_DIR_PATH.'/app/img/landing/png/logo-fondation-macif.png'; ?>"></li>
			<li><img alt="Nexans Fondation" src="<?php echo THEME_DIR_PATH.'/app/img/landing/png/logo-nexans-fondation.png'; ?>"></li>
			<li><img alt="AG2R La Mondiale" src="<?php echo THEME_DIR_PATH.'/app/img/landing/png/logo-agr-mondiale.png'; ?>"></li>
		</ul>
	</aside>

	<footer class="landing__footer">	
		<div class="landing__footer__content">	
			<img alt="Energie Solidaire" class="landing__footer__logo" src="<?php echo THEME_DIR_PATH.'/app/img/landing/svg/logo.svg'; ?>">
			<span class="landing__follow"><a href="https://www.facebook.com/energiesolidaire" class="landing__follow__link icon-fb" target="_blank"></a> <a href="https://twitter.com/Energie_SolidR" class="landing__follow__link icon-twitter" target="_blank"></a></span>
			<p class="p--small">Design &amp; Code par Thibaut&nbsp;Caroli + Yann&nbsp;Rolland</p>
		</div>
		<div class="landing__footer__bg--left"></div>
		<div class="landing__footer__bg--right"></div>
	</footer>

	<?php get_template_part( 'page-templates-parts/base/warning-flexbox'); ?>
	
</section>
