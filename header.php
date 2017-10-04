<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rydaway
 */

?>
<!--
 ▄▄▄▄▄▄▄▄▄▄▄  ▄         ▄  ▄▄▄▄▄▄▄▄▄▄   ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄ 
▐░░░░░░░░░░░▌▐░▌       ▐░▌▐░░░░░░░░░░▌ ▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌
▐░█▀▀▀▀▀▀▀█░▌▐░▌       ▐░▌▐░█▀▀▀▀▀▀▀█░▌▐░█▀▀▀▀▀▀▀▀▀ ▐░█▀▀▀▀▀▀▀█░▌
▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░▌          ▐░▌       ▐░▌
▐░█▄▄▄▄▄▄▄█░▌▐░█▄▄▄▄▄▄▄█░▌▐░▌       ▐░▌▐░█▄▄▄▄▄▄▄▄▄ ▐░█▄▄▄▄▄▄▄█░▌
▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░▌       ▐░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌
▐░█▀▀▀▀█░█▀▀  ▀▀▀▀█░█▀▀▀▀ ▐░▌       ▐░▌▐░█▀▀▀▀▀▀▀▀▀ ▐░█▀▀▀▀█░█▀▀ 
▐░▌     ▐░▌       ▐░▌     ▐░▌       ▐░▌▐░▌          ▐░▌     ▐░▌  
▐░▌      ▐░▌      ▐░▌     ▐░█▄▄▄▄▄▄▄█░▌▐░█▄▄▄▄▄▄▄▄▄ ▐░▌      ▐░▌ 
▐░▌       ▐░▌     ▐░▌     ▐░░░░░░░░░░▌ ▐░░░░░░░░░░░▌▐░▌       ▐░▌
 ▀         ▀       ▀       ▀▀▀▀▀▀▀▀▀▀   ▀▀▀▀▀▀▀▀▀▀▀  ▀         ▀ 
 Hello there, I built this custom WordPress theme with the "_s" barebones template                                                                
-->
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="<?php echo get_template_directory_uri(); ?>/js/pace.js"></script>


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rydaway' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<div class="header-content">
				<div class="logo-container">
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
				</div>
				<div class="menu-container">
					<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i>
</button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav>
				</div>
			</div>
		</div>

		
<?php if ( is_single() ) : 
		if ( has_post_thumbnail() ) :
			$this_posts_thumbnail_url = get_the_post_thumbnail_url();
			$this_posts_title = get_the_title();
?>

		<div class="header-image-container">
			<div class="plane-image-container" style="background-image: url(<?php echo get_template_directory_uri() . "/img/plane_top.png"; ?>)"></div>
			<div class="header-image" style="background-image: url(<?php echo $this_posts_thumbnail_url ?>);">
			</div>
			<div class="single-post-title-container">
					<h1><?php echo $this_posts_title ?></h1>
			</div>
		</div>
		<?php endif; // Else, no header. ?>

		
<?php endif; ?>
		
		
		
	</header><!-- #masthead -->
	
<!-- 	<div class="notification-panel"><p>Hey! I'm currently doing some coding on my site. Please stick with me while it looks horribly ugly. - October 2, 2017, 6PM in Canada </p></div> -->

	<div id="content" class="site-content">
