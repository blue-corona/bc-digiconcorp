<?php
/**
 * Reliability Online functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Reliability_Online
 * @since 1.0.0
 */

/**
 * Reliability Online only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'reliabilityonline_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function reliabilityonline_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Reliability Online, use a find and replace
		 * to change 'reliabilityonline' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'reliabilityonline', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		remove_action( 'wp_head', 'feed_links', 2 );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'reliabilityonline' ),
				'site' => __( 'Site Menu', 'reliabilityonline' ),
				'services' => __( 'Services Menu', 'reliabilityonline' ),
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
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'reliabilityonline' ),
					'shortName' => __( 'S', 'reliabilityonline' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'reliabilityonline' ),
					'shortName' => __( 'M', 'reliabilityonline' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'reliabilityonline' ),
					'shortName' => __( 'L', 'reliabilityonline' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'reliabilityonline' ),
					'shortName' => __( 'XL', 'reliabilityonline' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'reliabilityonline' ),
					'slug'  => 'primary',
					'color' => reliabilityonline_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'reliabilityonline' ),
					'slug'  => 'secondary',
					'color' => reliabilityonline_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'reliabilityonline' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'reliabilityonline' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'reliabilityonline' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'reliabilityonline_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function reliabilityonline_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'reliabilityonline' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'reliabilityonline' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'reliabilityonline_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function reliabilityonline_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'reliabilityonline_content_width', 640 );
}
add_action( 'after_setup_theme', 'reliabilityonline_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function reliabilityonline_scripts() {
	wp_enqueue_style( 'reliabilityonline-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap', array() );
	wp_enqueue_style( 'reliabilityonline-custom', get_template_directory_uri() . '/assets/css/custom.css', array('reliabilityonline-fonts'), null );
	wp_enqueue_style( 'reliabilityonline-easy-responsive-tabs', get_template_directory_uri() . '/assets/css/easy-responsive-tabs.css', array(), null );
	wp_enqueue_style( 'reliabilityonline-CustomScrollbar', get_template_directory_uri() . '/assets/css/CustomScrollbar.min.css', array(), null );
	
	wp_enqueue_style( 'reliabilityonline-style', get_stylesheet_uri(), array('reliabilityonline-custom','reliabilityonline-easy-responsive-tabs'), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'reliabilityonline-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array('reliabilityonline-style'), null );

	wp_style_add_data( 'reliabilityonline-style', 'rtl', 'replace' );

	if ( has_nav_menu( 'menu-1' ) ) {
		wp_enqueue_script( 'reliabilityonline-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.1', true );
		wp_enqueue_script( 'reliabilityonline-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '1.1', true );
	}

	wp_enqueue_style( 'reliabilityonline-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
	wp_enqueue_style( 'reliabilityonline-fa-pro', 'https://kit-pro.fontawesome.com/releases/v5.10.1/css/pro.min.css', array(), null );
	
	
	
	
	wp_enqueue_script( 'reliabilityonline-fa', 'https://kit.fontawesome.com/c13a77030d.js', array('jquery'), null, true );
	wp_enqueue_script( 'reliabilityonline-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'reliabilityonline-easy-responsive-tabs', get_template_directory_uri() . '/assets/js/easy-responsive-tabs.js', array('jquery'), null, true );
	wp_enqueue_script( 'jquery-wow', get_theme_file_uri( '/assets/js/wow.min.js' ), array( 'jquery' ), null, true );
	
	wp_enqueue_script( 'reliabilityonline-slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'reliabilityonline-scrollTo', get_template_directory_uri() . '/assets/js/jquery.scrollTo.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'reliabilityonline-mCustomScrollbar', get_template_directory_uri() . '/assets/js/jquery.mCustomScrollbar.min.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'reliabilityonline-lazyload', get_template_directory_uri() . '/assets/js/lazyload.min.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'reliabilityonline-common', get_template_directory_uri() . '/assets/js/common.js', array('jquery'), null, true );
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'reliabilityonline_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function reliabilityonline_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'reliabilityonline_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function reliabilityonline_editor_customizer_styles() {

	wp_enqueue_style( 'reliabilityonline-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'reliabilityonline-editor-customizer-styles', reliabilityonline_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'reliabilityonline_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function reliabilityonline_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );

	$primary_color = 199;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', 199 );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo reliabilityonline_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'reliabilityonline_colors_css_wrap' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-reliabilityonline-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-reliabilityonline-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
$settings_id = 46;

add_image_size( 'service-slide-thumb', 360, 401, true ); 


function custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return '.';
}
add_filter('excerpt_more', 'new_excerpt_more');

function change_phone_anchor_responsive ( $content ) {
	$replace = array('817-769-6714' => '<a href="tel:8177696714">817-769-6714</a>',
'(817) 769-6714' => '<a href="tel:8177696714">(817) 769-6714</a>');
	
    if ( wonderplugin_is_device('iPhone,android') ) {
		$content = str_replace(array_keys($replace), $replace, $content);
        return $content;
    }
	return $content;
}
add_filter( 'the_content', 'change_phone_anchor_responsive');

function my_acf_load_value_phone( $value, $post_id, $field )
{
    $value = apply_filters('the_content',$value); 

    return $value;
}
add_filter('acf/load_value/type=wysiwyg', 'my_acf_load_value_phone', 10, 3);
