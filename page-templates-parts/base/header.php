<header class="header">
	<!--<nav class="nav" role="navigation">
		<ul class="main-menu">
			<?php
				wp_nav_menu( array(
					'theme_location'    => 'main-menu',
					'container'     => '',
					'menu_class'        => 'menu main-menu menu-depth-0 menu-even', 
					'echo'          => true,
					'items_wrap'        => '%3$s',
					'depth'         => 3, 
					'walker'        => new fluxi_walker_nav_menu
				) ); 		
			?>
		</ul>
	</nav>

	<?php
	// Admin nav
	if( is_user_logged_in() ):
		echo '<div class="cb-navAdmin">';
		echo '<a href="'.home_url().'/wp-admin/" class="cb-navAdmin__bt">Admin</a>';
		echo '<a href="'.get_edit_post_link(get_the_ID()).'" class="cb-navAdmin__bt">Editer</a>'; 
		echo '</div>';
	endif;
	?>
</header>-->