<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="home page">

	<a class="skip-link screen-reader-text" href="#main">Skip to content</a>


	<header aria-label="header" id="masthead" class="site-header">
		<div class="site-branding">


			<p class="site-title"><a href="/" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/centre_of_change_logo.svg"
						alt="Centre of Change Logo"></a></p>
			<p class="smallTextLogo">Centre of Change</p>
		</div>

		<nav id="site-navigation" class="main-navigation" aria-label="Primary">

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<svg class="icon icon--menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28"
					height="28" fill="currentColor" aria-hidden="true">
					<path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
				</svg>
				<span class="screen-reader-text">Menu</span>
			</button>

			<div class="menu-panel" id="menu-panel">
				<button class="menu-close">
					<svg class="icon icon--close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28"
						height="28" fill="currentColor" aria-hidden="true">
						<path
							d="M10.5859 12L2.79297 4.20706L4.20718 2.79285L12.0001 10.5857L19.793 2.79285L21.2072 4.20706L13.4143 12L21.2072 19.7928L19.793 21.2071L12.0001 13.4142L4.20718 21.2071L2.79297 19.7928L10.5859 12Z">
						</path>
					</svg>
					<span class="screen-reader-text">Close menu</span>
				</button>

                
                <!-- dynamic wordpress menu -->
                 <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'         => 'primary-menu',
                        'menu_class'      => 'menu',
                        'container'       => false, // stops WP wrapping it in an extra <div>
                        'fallback_cb'     => false, // shows nothing if no menu is assigned yet, instead of erroring
                    ) );
                ?>

                <!-- orginal hard coded menu start -->
		        <!-- <ul id="primary-menu" class="menu">
					<li class="menu-item"><a href="index.html">Home</a></li>
					<li class="menu-item"><a href="page.html">About</a></li>
					<li class="menu-item"><a href="team.html">Team</a></li>
					<li class="menu-item"><a href="single.html">Blog</a></li>
				</ul> -->
                <!-- orginal hard coded menu start -->


			</div>

				<!-- top right CTA get support button data from customiser -->
				 <a 
    class="button button--nav-cta" 
    href="<?php echo esc_url( get_theme_mod( 'nav_cta_url', '/support' ) ); ?>"
>
    <?php echo esc_html( get_theme_mod( 'nav_cta_text', 'Get Support' ) ); ?>
</a>
		</nav>
	</header>
	<!-- ////////////HEADER end ///////////// -->


	<!-- ////////////MAIN START ////////////-->

	<main id="main" class="site-main">