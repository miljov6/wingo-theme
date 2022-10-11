<?php

/**
 * Wingo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wingo
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wingo_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Wingo, use a find and replace
		* to change 'wingo' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('wingo', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'bursl'),
			'footer_menu_1'  => __('Footer Menu 1', 'bursl'),
			'footer_menu_2'  => __('Footer Menu 2', 'bursl'),
			'footer_menu_3'  => __('Footer Menu 3', 'bursl'),
			'footer_menu_4'  => __('Footer Menu 4', 'bursl'),
			'bottom_menu'  => __('Bottom Menu', 'bursl')
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wingo_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'wingo_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wingo_content_width()
{
	$GLOBALS['content_width'] = apply_filters('wingo_content_width', 640);
}
add_action('after_setup_theme', 'wingo_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wingo_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'wingo'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'wingo'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'wingo_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wingo_scripts()
{
	wp_enqueue_style('wingo-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('wingo-style', 'rtl', 'replace');

	wp_enqueue_script('wingo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('three-min', get_template_directory_uri() . '/node_modules/three/build/three.min.js', array(), null, false);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'wingo_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

include_once(WP_PLUGIN_DIR . '/advanced-custom-fields-pro/acf.php');
require get_template_directory() . '/inc/acf-functions/theme-acf-footer.php';

add_action('wp_footer', 'contrast_function');
function contrast_function()
{
?>
	<script>
		$(document).ready(function() {
			$('.contrast').each(function() {
				$(this).click(function() {
					$('body').toggleClass('active-contrast');
				})
			})
		})
	</script>
<?php
}

define('WC_MAX_LINKED_VARIATIONS', 2050);


add_action('wp_footer', 'converts_product_attributes_from_select_options_to_div');
function converts_product_attributes_from_select_options_to_div()
{

?>
	<script type="text/javascript">
		jQuery(function($) {

			// clones select options for each product attribute
			var clone = $(".single-product div.product div.variations select").clone(true, true);

			// adds a "data-parent-id" attribute to each select option
			$(".single-product div.product div.variations select option").each(function() {
				$(this).attr('data-parent-id', $(this).parent().attr('id'));
			});

			// converts select options to div
			$(".single-product div.product div.variations select option").unwrap().each(function() {
				if ($(this).val() == '') {
					$(this).remove();
					return true;
				}
				var option = $('<div class="custom_option is-visible" data-parent-id="' + $(this).data('parent-id') + '" data-value="' + $(this).val() + '">' + $(this).text() + '</div>');
				$(this).replaceWith(option);
			});

			// reinsert the clone of the select options of the attributes in the page that were removed by "unwrap()"
			$(clone).insertBefore('.single-product div.product div.variations .reset_variations').hide();

			// when a user clicks on a div it adds the "selected" attribute to the respective select option
			$(document).on('click', '.custom_option', function() {
				var parentID = $(this).data('parent-id');
				if ($(this).hasClass('on')) {
					$(this).removeClass('on');
					$(".single-product div.product div.variations select#" + parentID).val('').trigger("change");
				} else {
					$('.custom_option[data-parent-id=' + parentID + ']').removeClass('on');
					$(this).addClass('on');
					$(".single-product div.product div.variations select#" + parentID).val($(this).data("value")).trigger("change");
				}

			});

			// if a select option is already selected, it adds the "on" attribute to the respective div
			$(".single-product div.product div.variations select").each(function() {
				if ($(this).find("option:selected").val()) {
					var id = $(this).attr('id');
					$('.custom_option[data-parent-id=' + id + ']').removeClass('on');
					var value = $(this).find("option:selected").val();
					$('.custom_option[data-parent-id=' + id + '][data-value=' + value + ']').addClass('on');
				}
			});

			// when the select options change based on the ones selected, it shows or hides the respective divs
			$('body').on('check_variations', function() {
				$('div.custom_option').removeClass('is-visible');
				$('.single-product div.product div.variations select').each(function() {
					var attrID = $(this).attr("id");
					$(this).find('option').each(function() {
						if ($(this).val() == '') {
							return;
						}
						$('div[data-parent-id="' + attrID + '"][data-value="' + $(this).val() + '"]').addClass('is-visible');
					});
				});
			});

		});

		$(document).ready(function() {
			setTimeout(function() {
				$('.custom_option').each(function() {
					if ($(this).data('parent-id') == 'pa_color') {
						var ral = $(this).data('value');
						if (ral == 'ral1026') {
							$(this).addClass('color');
							$(this).css('background-color', '#FFFF00');
						} else if (ral == 'ral2003') {
							$(this).addClass('color');
							$(this).css('background-color', '#FF7514');
						} else if (ral == 'ral2017') {
							$(this).addClass('color');
							$(this).css('background-color', '#FA4402');
						} else if (ral == 'ral3004') {
							$(this).addClass('color');
							$(this).css('background-color', '#763D41');
						} else if (ral == 'ral3017') {
							$(this).addClass('color');
							$(this).css('background-color', '#E63244');
						} else if (ral == 'ral3026') {
							$(this).addClass('color');
							$(this).css('background-color', '#FE0000');
						} else if (ral == 'ral4005') {
							$(this).addClass('color');
							$(this).css('background-color', '#6C4675');
						} else if (ral == 'ral5015') {
							$(this).addClass('color');
							$(this).css('background-color', '#2271B3');
						} else if (ral == 'ral6018') {
							$(this).addClass('color');
							$(this).css('background-color', '#57A639');
						} else if (ral == 'ral7001') {
							$(this).addClass('color');
							$(this).css('background-color', '#8A9597');
						} else if (ral == 'ral8015') {
							$(this).addClass('color');
							$(this).css('background-color', '#633A34');
						} else if (ral == 'ral9003') {
							$(this).addClass('color');
							$(this).css('background-color', '#F4F4F4');
						} else if (ral == 'ral9011') {
							$(this).addClass('color');
							$(this).css('background-color', '#1C1C1C');
						}
					} else if ($(this).data('parent-id') == 'pa_decor') {
						$(this).addClass('decor');
						var decor = $(this).data('value');
						if (decor == 'sxb') {
							$(this).addClass('sxb');
						} else if (decor == 'sxg') {
							$(this).addClass('sxg');
						} else if (decor == 'sxw') {
							$(this).addClass('sxw');
						} else if (decor == 'sxc') {
							$(this).addClass('sxc');
						} else if (decor == 'fha') {
							$(this).addClass('fha');
						}
					} else if ($(this).data('parent-id') == 'pa_shape') {
						$(this).addClass('shape');
					}
				});
				$('.shape').each(function() {
					$(this).click(function() {
						var shape = $(this).data('value');
						$('#3dgenerator').attr('data-shape', shape);
					})
				})
				$('.color').each(function() {
					$(this).click(function() {
						var color = $(this).data('value');
						$('#3dgenerator').attr('data-color', color);
					})
				})
				$('.decor').each(function() {
					$(this).click(function() {
						var decor = $(this).data('value');
						$('#3dgenerator').attr('data-decor', decor);
					})
				})
				$('#3dgenerator').click(function(e) {
					var url = $(this).attr('data-url');
					var decor = $(this).attr('data-decor');
					var color = $(this).attr('data-color');
					var shape = $(this).attr('data-shape');
					jQuery.ajax({
						url: url,
						headers: {
							"cache-control": "no-cache"
						},
						cache: false,
						method: 'POST',
						data: {
							decor: decor,
							color: color,
							shape: shape
						},
						success: function(data) {
							console.log(data);
							jQuery('.woocommerce-product-gallery').html(data);
						}
					});
				})
			}, 100)
		})
	</script>
<?php

}

add_action('wp_ajax_generate_model', 'generate_model');
add_action('wp_ajax_nopriv_generate_model', 'generate_model');

function generate_model()
{
	$decor = $_POST['decor'];
	$color = $_POST['color'];
	$shape = $_POST['shape'];
	$combination = $decor . '-' . $color . '-' . $shape;
	if ($combination == 'sxb-ral9011-hex') :
		echo do_shortcode('[3d_viewer id="853"]');
	elseif ($combination == 'sxb-ral9003-hex') :
		echo do_shortcode('[3d_viewer id="855"]');
	elseif ($combination == 'sxb-ral8015-hex') :
		echo do_shortcode('[3d_viewer id="857"]');
	elseif ($combination == 'sxb-ral7001-hex') :
		echo do_shortcode('[3d_viewer id="859"]');
	elseif ($combination == 'sxb-ral6018-hex') :
		echo do_shortcode('[3d_viewer id="862"]');
	elseif ($combination == 'sxb-ral5015-hex') :
		echo do_shortcode('[3d_viewer id="864"]');
	elseif ($combination == 'sxb-ral4005-hex') :
		echo do_shortcode('[3d_viewer id="866"]');
	elseif ($combination == 'sxb-ral3026-hex') :
		echo do_shortcode('[3d_viewer id="868"]');
	elseif ($combination == 'sxb-ral3017-hex') :
		echo do_shortcode('[3d_viewer id="870"]');
	elseif ($combination == 'sxb-ral3004-hex') :
		echo do_shortcode('[3d_viewer id="872"]');
	elseif ($combination == 'sxb-ral2017-hex') :
		echo do_shortcode('[3d_viewer id="874"]');
	elseif ($combination == 'sxb-ral1026-hex') :
		echo do_shortcode('[3d_viewer id="876"]');
	elseif ($combination == 'sxb-ral2003-hex') :
		echo do_shortcode('[3d_viewer id="878"]');
	elseif ($combination == 'sxg-ral9011-hex') :
		echo do_shortcode('[3d_viewer id="880"]');
	elseif ($combination == 'sxg-ral9003-hex') :
		echo do_shortcode('[3d_viewer id="882"]');
	elseif ($combination == 'sxg-ral8015-hex') :
		echo do_shortcode('[3d_viewer id="884"]');
	elseif ($combination == 'sxg-ral7001-hex') :
		echo do_shortcode('[3d_viewer id="886"]');
	elseif ($combination == 'sxg-ral6018-hex') :
		echo do_shortcode('[3d_viewer id="888"]');
	elseif ($combination == 'sxg-ral5015-hex') :
		echo do_shortcode('[3d_viewer id="890"]');
	elseif ($combination == 'sxg-ral4005-hex') :
		echo do_shortcode('[3d_viewer id="892"]');
	elseif ($combination == 'sxg-ral3026-hex') :
		echo do_shortcode('[3d_viewer id="894"]');
	elseif ($combination == 'sxg-ral3017-hex') :
		echo do_shortcode('[3d_viewer id="896"]');
	elseif ($combination == 'sxg-ral3004-hex') :
		echo do_shortcode('[3d_viewer id="898"]');
	elseif ($combination == 'sxg-ral2017-hex') :
		echo do_shortcode('[3d_viewer id="900"]');
	elseif ($combination == 'sxg-ral1026-hex') :
		echo do_shortcode('[3d_viewer id="902"]');
	elseif ($combination == 'sxg-ral2003-hex') :
		echo do_shortcode('[3d_viewer id="904"]');
	elseif ($combination == 'sxw-ral2003-hex') :
		echo do_shortcode('[3d_viewer id="906"]');
	elseif ($combination == 'sxw-ral1026-hex') :
		echo do_shortcode('[3d_viewer id="908"]');
	elseif ($combination == 'sxw-ral2017-hex') :
		echo do_shortcode('[3d_viewer id="910"]');
	elseif ($combination == 'sxw-ral3004-hex') :
		echo do_shortcode('[3d_viewer id="912"]');
	elseif ($combination == 'sxw-ral3017-hex') :
		echo do_shortcode('[3d_viewer id="914"]');
	elseif ($combination == 'sxw-ral3026-hex') :
		echo do_shortcode('[3d_viewer id="916"]');
	elseif ($combination == 'sxw-ral4005-hex') :
		echo do_shortcode('[3d_viewer id="918"]');
	elseif ($combination == 'sxw-ral5015-hex') :
		echo do_shortcode('[3d_viewer id="920"]');
	elseif ($combination == 'sxw-ral6018-hex') :
		echo do_shortcode('[3d_viewer id="922"]');
	elseif ($combination == 'sxw-ral7001-hex') :
		echo do_shortcode('[3d_viewer id="924"]');
	elseif ($combination == 'sxw-ral8015-hex') :
		echo do_shortcode('[3d_viewer id="926"]');
	elseif ($combination == 'sxw-ral9003-hex') :
		echo do_shortcode('[3d_viewer id="928"]');
	elseif ($combination == 'sxw-ral9011-hex') :
		echo do_shortcode('[3d_viewer id="930"]');
	elseif ($combination == 'sxc-ral2003-hex') :
		echo do_shortcode('[3d_viewer id="932"]');
	elseif ($combination == 'sxc-ral1026-hex') :
		echo do_shortcode('[3d_viewer id="934"]');
	elseif ($combination == 'sxc-ral2017-hex') :
		echo do_shortcode('[3d_viewer id="936"]');
	elseif ($combination == 'sxc-ral3017-hex') :
		echo do_shortcode('[3d_viewer id="938"]');
	elseif ($combination == 'sxc-ral3026-hex') :
		echo do_shortcode('[3d_viewer id="940"]');
	elseif ($combination == 'sxc-ral4005-hex') :
		echo do_shortcode('[3d_viewer id="942"]');
	elseif ($combination == 'sxc-ral5015-hex') :
		echo do_shortcode('[3d_viewer id="944"]');
	elseif ($combination == 'sxc-ral6018-hex') :
		echo do_shortcode('[3d_viewer id="946"]');
	elseif ($combination == 'sxc-ral9003-hex') :
		echo do_shortcode('[3d_viewer id="948"]');
	elseif ($combination == 'sxc-ral9011-hex') :
		echo do_shortcode('[3d_viewer id="950"]');
	elseif ($combination == 'sxc-ral8015-hex') :
		echo do_shortcode('[3d_viewer id="952"]');
	elseif ($combination == 'sxc-ral7001-hex') :
		echo do_shortcode('[3d_viewer id="954"]');
	elseif ($combination == 'sxc-ral3004-hex') :
		echo do_shortcode('[3d_viewer id="956"]');
	elseif ($combination == 'fha-ral2003-hex') :
		echo do_shortcode('[3d_viewer id="958"]');
	elseif ($combination == 'fha-ral1026-hex') :
		echo do_shortcode('[3d_viewer id="960"]');
	elseif ($combination == 'fha-ral2017-hex') :
		echo do_shortcode('[3d_viewer id="962"]');
	elseif ($combination == 'fha-ral3004-hex') :
		echo do_shortcode('[3d_viewer id="964"]');
	elseif ($combination == 'fha-ral3017-hex') :
		echo do_shortcode('[3d_viewer id="966"]');
	elseif ($combination == 'fha-ral3026-hex') :
		echo do_shortcode('[3d_viewer id="968"]');
	elseif ($combination == 'fha-ral4005-hex') :
		echo do_shortcode('[3d_viewer id="970"]');
	elseif ($combination == 'fha-ral5015-hex') :
		echo do_shortcode('[3d_viewer id="972"]');
	elseif ($combination == 'fha-ral6018-hex') :
		echo do_shortcode('[3d_viewer id="974"]');
	elseif ($combination == 'fha-ral7001-hex') :
		echo do_shortcode('[3d_viewer id="976"]');
	elseif ($combination == 'fha-ral8015-hex') :
		echo do_shortcode('[3d_viewer id="978"]');
	elseif ($combination == 'fha-ral9003-hex') :
		echo do_shortcode('[3d_viewer id="980"]');
	elseif ($combination == 'fha-ral9011-hex') :
		echo do_shortcode('[3d_viewer id="982"]');
	elseif ($combination == 'fha-ral1026-rnd') :
		echo do_shortcode('[3d_viewer id="985"]');
	elseif ($combination == 'fha-ral2003-rnd') :
		echo do_shortcode('[3d_viewer id="987"]');
	elseif ($combination == 'fha-ral2017-rnd') :
		echo do_shortcode('[3d_viewer id="989"]');
	elseif ($combination == 'fha-ral3004-rnd') :
		echo do_shortcode('[3d_viewer id="991"]');
	elseif ($combination == 'fha-ral3017-rnd') :
		echo do_shortcode('[3d_viewer id="993"]');
	elseif ($combination == 'fha-ral3026-rnd') :
		echo do_shortcode('[3d_viewer id="995"]');
	elseif ($combination == 'fha-ral4005-rnd') :
		echo do_shortcode('[3d_viewer id="997"]');
	elseif ($combination == 'fha-ral5015-rnd') :
		echo do_shortcode('[3d_viewer id="999"]');
	elseif ($combination == 'fha-ral6018-rnd') :
		echo do_shortcode('[3d_viewer id="1001"]');
	elseif ($combination == 'fha-ral7001-rnd') :
		echo do_shortcode('[3d_viewer id="1003"]');
	elseif ($combination == 'fha-ral8015-rnd') :
		echo do_shortcode('[3d_viewer id="1005"]');
	elseif ($combination == 'fha-ral9011-rnd') :
		echo do_shortcode('[3d_viewer id="1007"]');
	elseif ($combination == 'fha-ral9003-rnd') :
		echo do_shortcode('[3d_viewer id="1009"]');
	elseif ($combination == 'sxc-ral1026-rnd') :
		echo do_shortcode('[3d_viewer id="1012"]');
	elseif ($combination == 'sxc-ral2003-rnd') :
		echo do_shortcode('[3d_viewer id="1014"]');
	elseif ($combination == 'sxc-ral2017-rnd') :
		echo do_shortcode('[3d_viewer id="1016"]');
	elseif ($combination == 'sxc-ral3004-rnd') :
		echo do_shortcode('[3d_viewer id="1018"]');
	elseif ($combination == 'sxc-ral3017-rnd') :
		echo do_shortcode('[3d_viewer id="1020"]');
	elseif ($combination == 'sxc-ral3026-rnd') :
		echo do_shortcode('[3d_viewer id="1022"]');
	elseif ($combination == 'sxc-ral4005-rnd') :
		echo do_shortcode('[3d_viewer id="1024"]');
	elseif ($combination == 'sxc-ral5015-rnd') :
		echo do_shortcode('[3d_viewer id="1027"]');
	elseif ($combination == 'sxc-ral6018-rnd') :
		echo do_shortcode('[3d_viewer id="1029"]');
	elseif ($combination == 'sxc-ral7001-rnd') :
		echo do_shortcode('[3d_viewer id="1031"]');
	elseif ($combination == 'sxc-ral8015-rnd') :
		echo do_shortcode('[3d_viewer id="1033"]');
	elseif ($combination == 'sxc-ral9003-rnd') :
		echo do_shortcode('[3d_viewer id="1035"]');
	elseif ($combination == 'sxc-ral9011-rnd') :
		echo do_shortcode('[3d_viewer id="1037"]');
	elseif ($combination == 'sxw-ral1026-rnd') :
		echo do_shortcode('[3d_viewer id="1039"]');
	elseif ($combination == 'sxw-ral2003-rnd') :
		echo do_shortcode('[3d_viewer id="1041"]');
	elseif ($combination == 'sxw-ral2017-rnd') :
		echo do_shortcode('[3d_viewer id="1043"]');
	elseif ($combination == 'sxw-ral3004-rnd') :
		echo do_shortcode('[3d_viewer id="1045"]');
	elseif ($combination == 'sxw-ral3017-rnd') :
		echo do_shortcode('[3d_viewer id="1047"]');
	elseif ($combination == 'sxw-ral3026-rnd') :
		echo do_shortcode('[3d_viewer id="1049"]');
	elseif ($combination == 'sxw-ral4005-rnd') :
		echo do_shortcode('[3d_viewer id="1051"]');
	elseif ($combination == 'sxw-ral5015-rnd') :
		echo do_shortcode('[3d_viewer id="1053"]');
	elseif ($combination == 'sxw-ral6018-rnd') :
		echo do_shortcode('[3d_viewer id="1055"]');
	elseif ($combination == 'sxw-ral7001-rnd') :
		echo do_shortcode('[3d_viewer id="1057"]');
	elseif ($combination == 'sxw-ral8015-rnd') :
		echo do_shortcode('[3d_viewer id="1060"]');
	elseif ($combination == 'sxw-ral9003-rnd') :
		echo do_shortcode('[3d_viewer id="1062"]');
	elseif ($combination == 'sxw-ral9011-rnd') :
		echo do_shortcode('[3d_viewer id="1064"]');
	elseif ($combination == 'sxg-ral1026-rnd') :
		echo do_shortcode('[3d_viewer id="1079"]');
	elseif ($combination == 'sxg-ral2003-rnd') :
		echo do_shortcode('[3d_viewer id="1080"]');
	elseif ($combination == 'sxg-ral2017-rnd') :
		echo do_shortcode('[3d_viewer id="1081"]');
	elseif ($combination == 'sxg-ral3004-rnd') :
		echo do_shortcode('[3d_viewer id="1082"]');
	elseif ($combination == 'sxg-ral3017-rnd') :
		echo do_shortcode('[3d_viewer id="1083"]');
	elseif ($combination == 'sxg-ral3026-rnd') :
		echo do_shortcode('[3d_viewer id="1084"]');
	elseif ($combination == 'sxg-ral4005-rnd') :
		echo do_shortcode('[3d_viewer id="1085"]');
	elseif ($combination == 'sxg-ral5015-rnd') :
		echo do_shortcode('[3d_viewer id="1086"]');
	elseif ($combination == 'sxg-ral6018-rnd') :
		echo do_shortcode('[3d_viewer id="1087"]');
	elseif ($combination == 'sxg-ral7001-rnd') :
		echo do_shortcode('[3d_viewer id="1088"]');
	elseif ($combination == 'sxg-ral8015-rnd') :
		echo do_shortcode('[3d_viewer id="1089"]');
	elseif ($combination == 'sxg-ral9003-rnd') :
		echo do_shortcode('[3d_viewer id="1090"]');
	elseif ($combination == 'sxg-ral9011-rnd') :
		echo do_shortcode('[3d_viewer id="1091"]');
	elseif ($combination == 'sxb-ral1026-rnd') :
		echo do_shortcode('[3d_viewer id="1105"]');
	elseif ($combination == 'sxb-ral2003-rnd') :
		echo do_shortcode('[3d_viewer id="1106"]');
	elseif ($combination == 'sxb-ral2017-rnd') :
		echo do_shortcode('[3d_viewer id="1107"]');
	elseif ($combination == 'sxb-ral3004-rnd') :
		echo do_shortcode('[3d_viewer id="1108"]');
	elseif ($combination == 'sxb-ral3017-rnd') :
		echo do_shortcode('[3d_viewer id="1109"]');
	elseif ($combination == 'sxb-ral3026-rnd') :
		echo do_shortcode('[3d_viewer id="1110"]');
	elseif ($combination == 'sxb-ral4005-rnd') :
		echo do_shortcode('[3d_viewer id="1111"]');
	elseif ($combination == 'sxb-ral5015-rnd') :
		echo do_shortcode('[3d_viewer id="1112"]');
	elseif ($combination == 'sxb-ral6018-rnd') :
		echo do_shortcode('[3d_viewer id="1113"]');
	elseif ($combination == 'sxb-ral7001-rnd') :
		echo do_shortcode('[3d_viewer id="1114"]');
	elseif ($combination == 'sxb-ral8015-rnd') :
		echo do_shortcode('[3d_viewer id="1115"]');
	elseif ($combination == 'sxb-ral9003-rnd') :
		echo do_shortcode('[3d_viewer id="1116"]');
	elseif ($combination == 'sxb-ral9011-rnd') :
		echo do_shortcode('[3d_viewer id="1117"]');
	elseif ($combination == 'fha-ral1026-sqr') :
		echo do_shortcode('[3d_viewer id="1131"]');
	elseif ($combination == 'fha-ral2003-sqr') :
		echo do_shortcode('[3d_viewer id="1132"]');
	elseif ($combination == 'fha-ral2017-sqr') :
		echo do_shortcode('[3d_viewer id="1133"]');
	elseif ($combination == 'fha-ral3004-sqr') :
		echo do_shortcode('[3d_viewer id="1134"]');
	elseif ($combination == 'fha-ral3017-sqr') :
		echo do_shortcode('[3d_viewer id="1135"]');
	elseif ($combination == 'fha-ral3026-sqr') :
		echo do_shortcode('[3d_viewer id="1136"]');
	elseif ($combination == 'fha-ral4005-sqr') :
		echo do_shortcode('[3d_viewer id="1137"]');
	elseif ($combination == 'fha-ral5015-sqr') :
		echo do_shortcode('[3d_viewer id="1138"]');
	elseif ($combination == 'fha-ral6018-sqr') :
		echo do_shortcode('[3d_viewer id="1139"]');
	elseif ($combination == 'fha-ral7001-sqr') :
		echo do_shortcode('[3d_viewer id="1140"]');
	elseif ($combination == 'fha-ral8015-sqr') :
		echo do_shortcode('[3d_viewer id="1141"]');
	elseif ($combination == 'fha-ral9003-sqr') :
		echo do_shortcode('[3d_viewer id="1142"]');
	elseif ($combination == 'fha-ral9011-sqr') :
		echo do_shortcode('[3d_viewer id="1143"]');
	elseif ($combination == 'sxc-ral1026-sqr') :
		echo do_shortcode('[3d_viewer id="1157"]');
	elseif ($combination == 'sxc-ral2003-sqr') :
		echo do_shortcode('[3d_viewer id="1158"]');
	elseif ($combination == 'sxc-ral2017-sqr') :
		echo do_shortcode('[3d_viewer id="1159"]');
	elseif ($combination == 'sxc-ral3004-sqr') :
		echo do_shortcode('[3d_viewer id="1160"]');
	elseif ($combination == 'sxc-ral3017-sqr') :
		echo do_shortcode('[3d_viewer id="1161"]');
	elseif ($combination == 'sxc-ral3026-sqr') :
		echo do_shortcode('[3d_viewer id="1162"]');
	elseif ($combination == 'sxc-ral4005-sqr') :
		echo do_shortcode('[3d_viewer id="1163"]');
	elseif ($combination == 'sxc-ral5015-sqr') :
		echo do_shortcode('[3d_viewer id="1164"]');
	elseif ($combination == 'sxc-ral6018-sqr') :
		echo do_shortcode('[3d_viewer id="1165"]');
	elseif ($combination == 'sxc-ral7001-sqr') :
		echo do_shortcode('[3d_viewer id="1166"]');
	elseif ($combination == 'sxc-ral8015-sqr') :
		echo do_shortcode('[3d_viewer id="1167"]');
	elseif ($combination == 'sxc-ral9003-sqr') :
		echo do_shortcode('[3d_viewer id="1168"]');
	elseif ($combination == 'sxc-ral9011-sqr') :
		echo do_shortcode('[3d_viewer id="1169"]');
	elseif ($combination == 'sxw-ral1026-sqr') :
		echo do_shortcode('[3d_viewer id="1183"]');
	elseif ($combination == 'sxw-ral2003-sqr') :
		echo do_shortcode('[3d_viewer id="1184"]');
	elseif ($combination == 'sxw-ral2017-sqr') :
		echo do_shortcode('[3d_viewer id="1185"]');
	elseif ($combination == 'sxw-ral3004-sqr') :
		echo do_shortcode('[3d_viewer id="1186"]');
	elseif ($combination == 'sxw-ral3017-sqr') :
		echo do_shortcode('[3d_viewer id="1187"]');
	elseif ($combination == 'sxw-ral3026-sqr') :
		echo do_shortcode('[3d_viewer id="1188"]');
	elseif ($combination == 'sxw-ral4005-sqr') :
		echo do_shortcode('[3d_viewer id="1189"]');
	elseif ($combination == 'sxw-ral5015-sqr') :
		echo do_shortcode('[3d_viewer id="1190"]');
	elseif ($combination == 'sxw-ral6018-sqr') :
		echo do_shortcode('[3d_viewer id="1191"]');
	elseif ($combination == 'sxw-ral7001-sqr') :
		echo do_shortcode('[3d_viewer id="1192"]');
	elseif ($combination == 'sxw-ral8015-sqr') :
		echo do_shortcode('[3d_viewer id="1193"]');
	elseif ($combination == 'sxw-ral9003-sqr') :
		echo do_shortcode('[3d_viewer id="1194"]');
	elseif ($combination == 'sxw-ral9011-sqr') :
		echo do_shortcode('[3d_viewer id="1195"]');
	elseif ($combination == 'sxg-ral1026-sqr') :
		echo do_shortcode('[3d_viewer id="1209"]');
	elseif ($combination == 'sxg-ral2003-sqr') :
		echo do_shortcode('[3d_viewer id="1210"]');
	elseif ($combination == 'sxg-ral2017-sqr') :
		echo do_shortcode('[3d_viewer id="1211"]');
	elseif ($combination == 'sxg-ral3004-sqr') :
		echo do_shortcode('[3d_viewer id="1212"]');
	elseif ($combination == 'sxg-ral3017-sqr') :
		echo do_shortcode('[3d_viewer id="1213"]');
	elseif ($combination == 'sxg-ral3026-sqr') :
		echo do_shortcode('[3d_viewer id="1214"]');
	elseif ($combination == 'sxg-ral4005-sqr') :
		echo do_shortcode('[3d_viewer id="1215"]');
	elseif ($combination == 'sxg-ral5015-sqr') :
		echo do_shortcode('[3d_viewer id="1216"]');
	elseif ($combination == 'sxg-ral6018-sqr') :
		echo do_shortcode('[3d_viewer id="1217"]');
	elseif ($combination == 'sxg-ral7001-sqr') :
		echo do_shortcode('[3d_viewer id="1218"]');
	elseif ($combination == 'sxg-ral8015-sqr') :
		echo do_shortcode('[3d_viewer id="1219"]');
	elseif ($combination == 'sxg-ral9003-sqr') :
		echo do_shortcode('[3d_viewer id="1220"]');
	elseif ($combination == 'sxg-ral9011-sqr') :
		echo do_shortcode('[3d_viewer id="1221"]');
	elseif ($combination == 'sxb-ral1026-sqr') :
		echo do_shortcode('[3d_viewer id="1235"]');
	elseif ($combination == 'sxb-ral2003-sqr') :
		echo do_shortcode('[3d_viewer id="1236"]');
	elseif ($combination == 'sxb-ral2017-sqr') :
		echo do_shortcode('[3d_viewer id="1237"]');
	elseif ($combination == 'sxb-ral3004-sqr') :
		echo do_shortcode('[3d_viewer id="1238"]');
	elseif ($combination == 'sxb-ral3017-sqr') :
		echo do_shortcode('[3d_viewer id="1239"]');
	elseif ($combination == 'sxb-ral3026-sqr') :
		echo do_shortcode('[3d_viewer id="1240"]');
	elseif ($combination == 'sxb-ral4005-sqr') :
		echo do_shortcode('[3d_viewer id="1241"]');
	elseif ($combination == 'sxb-ral5015-sqr') :
		echo do_shortcode('[3d_viewer id="1242"]');
	elseif ($combination == 'sxb-ral6018-sqr') :
		echo do_shortcode('[3d_viewer id="1243"]');
	elseif ($combination == 'sxb-ral7001-sqr') :
		echo do_shortcode('[3d_viewer id="1244"]');
	elseif ($combination == 'sxb-ral8015-sqr') :
		echo do_shortcode('[3d_viewer id="1245"]');
	elseif ($combination == 'sxb-ral9003-sqr') :
		echo do_shortcode('[3d_viewer id="1246"]');
	elseif ($combination == 'sxb-ral9011-sqr') :
		echo do_shortcode('[3d_viewer id="1247"]');
	endif;
	wp_die();
}
