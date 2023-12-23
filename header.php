<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'maureen_tw_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'maureen_tw_header' ); ?>

	<header>
		<div class="mx-auto container">
			<div class="lg:flex lg:justify-between lg:items-center border-b py-6">
				<div class="flex justify-between items-center">
					<div>
						<?php if ( has_custom_logo() ) { ?>
							<?php the_custom_logo(); ?>
						<?php } else { ?>
							<a href="<?php echo get_bloginfo( 'url' ); ?>" class="font-extrabold text-4xl uppercase h1">
								<?php echo get_bloginfo( 'name' ); ?>
							</a>
							<p class="text-sm font-light text-gray-600">
								<?php echo get_bloginfo( 'description' ); ?>
							</p>
						<?php } ?>
					</div>

					<div class="lg:hidden">
						<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
							<!-- Hamburger Icon SVG -->
							<svg viewBox="0 0 20 20" class="inline-block w-6 h-6" fill="none" stroke="currentColor">
								<path d="M0 3h20M0 10h20M0 17h20"/>
							</svg>
						</a>
					</div>
				</div>

				<nav id="primary-menu" class="hidden bg-gray-100 mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_class'     => 'lg:flex lg:-mx-4',
							'li_class'       => 'lg:mx-4',
							'fallback_cb'    => false,
						)
					);
					?>

					<?php if ( is_active_sidebar( 'header-widget-area' ) ) : ?>
						<div class="header-widget-area">
							<?php dynamic_sidebar( 'header-widget-area' ); ?>
						</div>
					<?php endif; ?>
				</nav>
			</div>
		</div>
	</header>

	<div id="content" class="site-content flex-grow">
		<?php if ( is_front_page() ) : ?>
			<!-- Start introduction -->
			<!-- Additional Content Here -->
		<?php endif; ?>

		<?php do_action( 'maureen_tw_content_start' ); ?>

		<main>
