<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( has_nav_menu( 'main' ) ) : ?>

	<nav class="wrapper__item wrapper__item--nav nav" id="nav">
		<div class="container">

			<?php
				wp_nav_menu( [
					'theme_location'  => 'main',
					'menu'            => 'main',
					'container'       => false,
					'menu_id'         => 'list',
					'menu_class'      => 'list',
					'echo'            => true,
					'depth'           => 1,
					'fallback_cb'     => '__return_empty_string',
				] );
			?>

			<button class="burger" id="burger">
				<span class="bar bar1"></span>
				<span class="bar bar2"></span>
				<span class="bar bar3"></span>
				<span class="sr-only"><?php _e( 'Меню', TESTWORK538TH_TEXTDOMAIN ); ?></span>
			</button>

		</div>
	</nav>

<?php endif;