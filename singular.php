<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();

if ( have_posts() ) {

	while ( have_posts() ) {
		
		the_post();

		include get_theme_file_path( 'views/container-before.php' );

		the_title( '<h1>', '</h1>', true );
			
		get_template_part( 'parts/breadcrumbs' );

		include get_theme_file_path( 'views/entry-singular.php' );

		include get_theme_file_path( 'views/container-after.php' );
	
	}

}

get_footer();