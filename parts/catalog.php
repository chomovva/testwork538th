<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; }


include get_theme_file_path( 'views/container-before.php' );


?>


<h2 id="catalog-title" class="sr-only"><?php echo get_theme_mod( 'catalogtitle' ); ?></h2>


<div class="catalog d-flex flex-wrap">

	<?php

		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

			$entries = get_posts( [
				'post_type'   => 'product',
				'orderby'     => 'date',
				'order'       => 'DESC',
				'include'     => [],
				'exclude'     => [],
			] );

			if ( is_array( $entries ) && ! empty( $entries ) ) {

				ob_start();
				
				foreach ( $entries as $post ) {
				
					setup_postdata( $post );

					include get_theme_file_path( 'views/entry-catalog.php' );
				
				}
			
				wp_reset_postdata();

			}

		} else {

			if ( have_posts() ) {

				while ( have_posts() ) {
					
					the_post();

					include get_theme_file_path( 'views/entry-catalog.php' );

				}

			}

			the_posts_pagination();

		}

	?>

</div>


<?php include get_theme_file_path( 'views/container-after.php' );