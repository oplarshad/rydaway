<?php
/**
 * rydaway functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rydaway
 */

if ( ! function_exists( 'rydaway_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rydaway_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rydaway, use a find and replace
		 * to change 'rydaway' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rydaway', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'rydaway' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'rydaway_custom_background_args', array(
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
	}
endif;
add_action( 'after_setup_theme', 'rydaway_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rydaway_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rydaway_content_width', 640 );
}
add_action( 'after_setup_theme', 'rydaway_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rydaway_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rydaway' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rydaway' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rydaway_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rydaway_scripts() {
	wp_enqueue_style( 'rydaway-style', get_template_directory_uri() . '/css/main.min.css' );

	wp_enqueue_script( 'rydaway-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'rydaway-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rydaway_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Remove the "Category: blah" nonsense
add_filter( 'get_the_archive_title', function ($title) {

       if ( is_category() ) {

           $title = single_cat_title( '', false );

       } elseif ( is_tag() ) {

           $title = single_tag_title( '', false );

       } elseif ( is_author() ) {

           $title = '<span class="vcard">' . get_the_author() . '</span>' ;

       }

   return $title;

});

// POST TRACKING

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');


// Limiting post excerpts
function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Changing that stupid square bracket thing to an elipsis

function new_excerpt_more( $more ) {
    return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');



function rydaway_shortcode_postImageLink( $atts, $content = null ) {
    // Adds the ability to add a shortcode [rydaway-post id="1234"] whereby an image link will be added to that post
        
    // Set attributes and defaults
    $atts = shortcode_atts(
		array(
            'id' => false,
		), 
		$atts,
		'rydaway-post'
    );
    
    if ($atts['id'] === false) return;
        
    try {
	    // Retrieve information (title, permalink, image URL) of the post
	    $postPermalink = get_the_permalink($atts['id']);
	    $postTitle = get_the_title($atts['id']);
	    
	    $postImageUrl = wp_get_attachment_url(get_post_thumbnail_id($atts['id']));
	    if (!$postImageUrl) { // If no image, return the default template one
		    $postImageUrl = get_template_directory_uri() . "/img/rydaway_logo_rast.png";
	 	}
	    
	    // Build the HTML
	    $return = '<a href="' . $postPermalink . '" rel="bookmark" target="_blank" class="rydaway-linked-post-anchor" title="Link to ' . $postTitle . '">'; // Opening the anchor
	    $return .= '<div class="rydaway-linked-post" style="background-image: url(' . $postImageUrl . ')">';
	    $return .= '<h3 class="rydaway-linked-post-txt"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;
' . $postTitle . '</h3>'; // Printing the title
	    $return .= '</div></a>'; // Closing the div, closing the anchor
	    return $return;
	    
	}
	catch (Exception $e) {
		return null; // Print nothing
	}
	
}
add_shortcode( 'rydaway-post', 'rydaway_shortcode_postImageLink' ); // Adds the shortcode




