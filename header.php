<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<!DOCTYPE html>
<html <?php language_attributes(); ?> >
	
	<?php get_template_part( 'parts/head' ); ?>

	<body class="home">
		<div class="wrapper" id="wrapper">
			<header class="wrapper__item wrapper__item--header header" id="header">
				<div class="container">
					<div class="col">
						<?php
							the_custom_logo();
							if ( ! empty( trim( get_bloginfo( 'description', 'raw' ) ) ) ) {
								echo wpautop( get_bloginfo( 'description', 'raw' ), true );
							}
						?>
					</div>
					<div class="col">
						<?php
							if ( is_pll_active() ) {
								get_template_part( 'parts/languages' );
							}
						?>
					</div>
				</div>
			</header>

			<?php get_template_part( 'parts/nav' ); ?>

			<main class="wrapper__item wrapper__item--main main" id="main">