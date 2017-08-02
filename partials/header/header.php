<header>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="logo-wrap">
					<?php

						$logo_path        = get_theme_mod( 'inspiry_site_logo' );
						$retina_logo_path = get_theme_mod( 'inspiry_site_logo_retina' );

//						inspiry_site_logo( $logo_path, $retina_logo_path );
					?>
				</div>
			</div>
			<div class="col-md-8 clearfix">
				<?php
					$main_menu = array(
						'menu'            => 'Header Menu',
						'theme_location'  => 'header-menu',
						'menu_class'      => 'main-menu clearfix',
						'container'       => 'nav',
						'container_class' => 'main-menu-wrap'
					);

					wp_nav_menu( $main_menu );
				?>
			</div>
		</div>
	</div>
</header>