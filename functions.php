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

		load_theme_textdomain( 'rydaway', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'rydaway' ),
		) );
		
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
 */
function rydaway_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rydaway_content_width', 640 );
}
add_action( 'after_setup_theme', 'rydaway_content_width', 0 );

/**
 * Register widget area.
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
	
	// Styles
	wp_enqueue_style( 'rydaway-style', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'rydaway-font-awesome', get_template_directory_uri() . '/css/fontawesome-all.min.css' );
	wp_enqueue_style( 'rydaway-ryder-logo-font', get_template_directory_uri() . '/css/r-logo-font/styles.css' );

	// Scripts
	wp_enqueue_script( 'rydaway-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'rydaway-pace', get_template_directory_uri() . '/js/pace.js');
	wp_enqueue_script( 'rydaway-mobile-navigation', get_template_directory_uri() . '/js/mobile-menu.min.js', array('jquery'));
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


/** Changes square bracket to ellipsis */
function change_bracket_to_ellipsis( $more ) {
    return ' ...';
}
add_filter('excerpt_more', 'change_bracket_to_ellipsis');


// Adds the ability to add a shortcode [rydaway-post id="1234"] whereby an image link will be added to that post
function rydaway_shortcode_postImageLink( $atts, $content = null ) {
        
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
	    	    
	    $postImageUrl = wp_get_attachment_image_src(get_post_thumbnail_id($atts['id']), 'medium_large')[0];

	    if (!$postImageUrl) { // If no image, return the default template one
		    $postImageUrl = get_template_directory_uri() . "/img/rydaway_logo_rast.png";
	 	}
	    
	    // Build the HTML
	    $return = '<a href="' . $postPermalink . '" rel="bookmark" target="_blank" class="rydaway-linked-post-anchor" title="Link to ' . $postTitle . '">'; // Opening the anchor
	    $return .= '<div class="rydaway-linked-post" style="background-image: url(' . $postImageUrl . ')">';
	    $return .= '<div class="rydaway-linked-post-des"><p>You may also like...</p></div>';
	    $return .= '<p class="rydaway-linked-post-txt"><i class="fas fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;
' . $postTitle . '</p>'; // Printing the title
	    $return .= '</div></a>'; // Closing the div, closing the anchor
	    return $return;
	    
	}
	catch (Exception $e) {
		return null; // Print nothing
	}
	
}
add_shortcode( 'rydaway-post', 'rydaway_shortcode_postImageLink' ); // Adds the shortcode

// Adding Asychronous Scripts
function add_async_attribute($tag, $handle) {
	switch ($handle) {
		case 'jquery':
			return str_replace( ' src', ' async="async" src', $tag );
			break;
		case 'rydaway-navigation':
			return str_replace( ' src', ' async="async" src', $tag );
			break;
		case 'rydaway-mobile-navigation':
			return str_replace( ' src', ' async="async" src', $tag );
			break;
		case 'rydaway-pace':
			return str_replace( ' src', ' async="async" src', $tag );
			break;
		case 'rydaway-skip-link-focus-fix':
			return str_replace( ' src', ' async="async" src', $tag );
			break;
		default:
			return $tag;
	}
}
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);





