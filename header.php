<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<!-- Charset -->
		<meta charset="<?php bloginfo('charset'); ?>">

		<!-- Viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Icons -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/images/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-16x16.png">
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/images/ms-icon-144x144.png">

		<!-- Manifest -->
		<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/manifest.json">
		
		<!-- Mobile Browser Styles -->
		<meta name="theme-color" content="#07f2f1">
		<meta name="msapplication-TileColor" content="#000000">

		<!-- Preload Fonts -->
		<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/geomanist/geomanist-regular-webfont.woff" as="font" crossorigin="anonymous" />
		<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/geomanist/geomanist-regular-webfont.woff2" as="font" crossorigin="anonymous" />
		<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/geomanist/geomanist-regular-italic-webfont.woff" as="font" crossorigin="anonymous" />
		<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/geomanist/geomanist-regular-italic-webfont.woff2" as="font" crossorigin="anonymous" />
		
		<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/geomanist/geomanist-medium-webfont.woff" as="font" crossorigin="anonymous" />
		<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/geomanist/geomanist-medium-webfont.woff2" as="font" crossorigin="anonymous" />
		<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/geomanist/geomanist-medium-italic-webfont.woff" as="font" crossorigin="anonymous" />
		<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/geomanist/geomanist-medium-italic-webfont.woff2" as="font" crossorigin="anonymous" />

		<?php if (!is_front_page()) { ?>
			<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/geomanist/geomanist-bold-webfont.woff" as="font" crossorigin="anonymous" />
			<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/geomanist/geomanist-bold-webfont.woff2" as="font" crossorigin="anonymous" />
		<?php } ?>

		<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/geomanist/geomanist-black-webfont.woff" as="font" crossorigin="anonymous" />
		<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/geomanist/geomanist-black-webfont.woff2" as="font" crossorigin="anonymous" />
		
		<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/font-awesome/webfonts/fa-brands-400.woff" as="font" crossorigin="anonymous" />
		<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/font-awesome/webfonts/fa-brands-400.woff2" as="font" crossorigin="anonymous" />

		<!-- Google Analytics v4 -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-H6HDRCQYD8"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'G-H6HDRCQYD8');
		</script>
			
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!-- SVG Sprite -->
		<div class="svg-sprite">
			<?php get_template_part('images/sprite.svg'); ?>
		</div>

		<!-- Skip to Content Link -->
		<a class="skip-to-content" href="#main">Skip to main content</a>

		<!-- Home Logo Buffer -->
		<div class="home-logo-buffer" aria-hidden="true"></div>

		<!-- Header -->
		<header class="site-header">
			<div class="header-inner">
				<div class="flex">
					<!-- Logo -->
					<div class="logo">
						<div class="logo-inner mobile">
							<a href="<?php bloginfo('url') ?>" aria-label="Navigate to the homepage">
								<svg role="img">
									<title>Ashe Abbott DiBlasi</title>
									<use xlink:href="#logo-mobile" />
								</svg>
							</a>
						</div>
						<div class="logo-inner desktop">
							<a href="<?php bloginfo('url') ?>" aria-label="Navigate to the homepage">
								<svg>
									<title>Ashe Abbott DiBlasi</title>
									<use xlink:href="#logo" />
								</svg>
							</a>
						</div>
					</div>

					<!-- Menu Button -->
					<div class="menu-btn">
						<button class="hamburger" aria-label="Open or close main menu">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
			</div>
		</header>

		<!-- Navigation Menu -->
		<section class="main-navigation">
			<div class="container">
				<nav class="main-menu flex" aria-label="Main Menu">
					<?php wp_nav_menu(array('depth' => 1, 'theme_location' => 'main-menu')); ?>
				</nav>
			</div>
		</section>

		<!-- Main -->
		<main id="main">