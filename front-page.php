<?php
/* Template Name: HomePage */

// This is a specific page just for the home page.

 ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	
	
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rydaway' ); ?></a>

	<header id="masthead" class="site-header" style="background: none !important;">
		<div class="main-container-home">
		<div class="site-branding">
			<div class="header-content">
				<div class="logo-container">
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
				</div>
				<div class="menu-container">
					<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'rydaway' ); ?></button>
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

		<div class="archive-header-image-container">
			<div class="header-image" style="background-image: url(<?php echo $this_posts_thumbnail_url ?>);">
			</div>
			<div class="single-post-title-container">
					<h1><?php echo $this_posts_title ?></h1>
			</div>
		</div>
		<?php endif; // Else, no header. ?>

		
<?php endif; ?>
		
		</div>
	</header><!-- #masthead -->
	
<!-- 	<div class="notification-panel"><p>Hey! I'm currently doing some coding on my site. Please stick with me while it looks horribly ugly. - October 2, 2017, 6PM in Canada </p></div> -->

	<div id="content" class="site-content">
		
		<h1>Welcome to RYDAWAY</h1>
		<p>RYDAWAY is an online travel resource about a guy named Ryder, his adventures, and the people he meets along the way.</p>
		
		<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
		
		<h1>Instagram</h1>
		
		<?php
			
			get_footer();

