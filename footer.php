<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

			</main>
			
			<?php get_sidebar(); ?>

			<footer class="wrapper__item wrapper__item--footer footer" id="footer">
				<div class="container">
					<p id="footercopy" class="copyright"><?php printf( '%s, %s', get_theme_mod( 'footercopy' ), date( 'Y' ) ) ?></p>
					<p id="developer" class="developer"><?php _e( 'Разработка: <a href="https://chomovva.ru/">chomovva</a>', TESTWORK538TH_TEXTDOMAIN ); ?></p>
				</div>
			</footer>
			
			<?php wp_footer(); ?>

		</div>
	</body>
</html>