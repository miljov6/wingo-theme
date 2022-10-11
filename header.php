<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', '_s'); ?></a>
		<header id="masthead" class="site-header">
			<div class="head">
				<div class="site-branding">
					<?php
					the_custom_logo();
					?>
				</div><!-- .site-branding -->
				<div class="nav-head">
					<div aria-label="Add Contrast" id="accessibility-contrast" class="js-acessibility contrast">
						<strong>Contrast</strong>
					</div>
					<div class="nav-under">
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</nav>
						<div class="over">
							<div id="lang"><?php $args = array('show_flags' => 0, 'show_names' => 0, 'hide_current' => false, 'dropdown' => 1, 'display_names_as' => 'slug');
											pll_the_languages($args); ?></div>
							<div id="cart"><img src="<?php echo get_site_url(); ?>/wp-content/themes/wingo/icons/cart.svg"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="mobile-head">

				<div class="mobile-site-branding">
					<?php
					the_custom_logo();
					?>
				</div><!-- .site-branding -->
				<div class="mobile-menu-content" id="mobile-content-menu">
					<div class="mobile-nav-head">
						<div class="mobile-nav-under">
							<nav id="site-mobile-navigation" class="main-navigation">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-mobile-menu',
									)
								);
								?>
							</nav>
							<div class="mobile-over">
							<div id="mobile-lang"><?php $args = array('show_flags' => 0, 'show_names' => 0, 'hide_current' => false, 'dropdown' => 2, 'display_names_as' => 'slug');
											pll_the_languages($args); ?></div>
								<div id="cart"><img src="<?php echo get_site_url(); ?>/wp-content/themes/wingo/icons/cart.svg"></div>
								<div aria-label="Add Contrast" id="accessibility-contrast" class="js-acessibility contrast">
									<strong>Contrast</strong>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="menu-toggle-wrapper" id="open-mobile" aria-controls="primary-menu" aria-expanded="false">
				</div>
			</div>
		</header><!-- #masthead -->
		<script>
			$("#open-mobile").click(function(){
				$(this).toggleClass('close');
				$('#mobile-content-menu').toggleClass('mobile-menu-content-display');
			})
			//$('#click')
		</script>