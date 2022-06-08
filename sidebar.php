<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( is_active_sidebar( 'basement' ) ) : ?>

	<aside class="wrapper__item wrapper__item--aside aside" id="aside">
		<div class="container">

			<?php dynamic_sidebar( 'basement' ); ?>

		</div>
	</aside>

<?php endif;