<?php


namespace testwork538th;


global $post;


if ( ! defined( 'ABSPATH' ) ) { exit; }


$product = null;
$price_html = '';


if ( 'product' == get_post_type( $post ) && is_woo_active() ) {
	$product = wc_get_product( get_the_ID() );
	$price_html = sprintf( '<div class="price">%s %s</div>', $product->get_price(), get_woocommerce_currency() );
}


?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry', get_the_ID() ); ?> >

	<a class="thumbnail" href="<?php the_permalink(); ?>">
		
		<?php

			if ( has_post_thumbnail( $post ) ) {
				the_post_thumbnail( 'medium', [ 'class' => 'wp-post-thumbnail' ] );
			} else {
				printf( '<img src="%s" alt="%s" />', get_theme_file_uri( 'images/thumbnail.png' ), the_title_attribute( [
					'before'  => '',
					'after'   => '',
					'post_id' => get_the_ID(),
					'echo'    => false,
				] ) );
			}

			echo $price_html;

		?>

	</a>
	
	<?php

		the_title( '<h3 class="title">', '</h3>', true );
		the_excerpt();

	?>
	
	<a class="permalink" href="<?php the_permalink(); ?>">
		<?php _e( 'Подробнее', TESTWORK538TH_TEXTDOMAIN ); ?>
	</a>

</article>