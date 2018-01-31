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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/r-logo-font/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--

                                |                                             
                                 |                                             
   ______________________________|_______________________________              
                       ----\--||___||--/----                                   
                            \ :==^==: /                                        
                             \|  o  |/                                         
                              \_____/                                          
                              /  |  \                                          
                            ^/   ^   \^                                        
                            U    U    U                               
                              RYDAWAY               


 Hello there, I built this custom WordPress theme with the "_s" barebones template                                                                
-->

	<!-- Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97296944-4"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-97296944-4');
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	
	
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rydaway' ); ?></a>

	<header id="masthead" class="site-header" >
		<div class="main-container-home">
			
		<div class="site-branding">
			<div class="header-content">
				<div class="logo-container">
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
				</div>
				<div class="menu-container">
						<nav class="main-site-navigation">

							<?php
								wp_nav_menu( array('theme_location' => 'menu-1', 'menu_id'        => 'primary-menu',) );
							?>
						<!-- Trigger/Open The Modal -->
						<i class="fa fa-search search-button-header" aria-hidden="true" id="searchBarModalSubmit"></i>
						</nav>
						
						<!--- The Search Bar -->

						<!-- The Modal -->
						<div id="searchBarModal" class="modal">
						
						  <!-- Modal content -->
						  <div class="modal-content">
						    <span class="close">&times;</span>
						    <!-- The search bar and logic-->
							<script>
								$(document).ready(function(){
									var originalSearchQuery = document.getElementById("searchBarHeader").value;
								    $("#searchBarHeader").focusout(function(){
								        if (document.getElementById("searchBarHeader").value != originalSearchQuery) {
									        // Submit the search
									        document.getElementById('mainSearchForm').submit();
								        }
								    });
								});
							</script>
								<header class="page-header">
									<h1 class="page-title">
										<form role="search" method="get" action="https://www.rydaway.com/" name="pageSearch" id="mainSearchForm">
											<i class="fa fa-search" id="searchBarIcon" aria-hidden="true"></i>
											<input type="search" id="searchBarHeader" placeholder="Looking for something?" value="<?php echo get_search_query(); ?>" name="s">
											</input>
										</form>
									</h1>
								</header><!-- .page-header -->
						  </div>
						
						</div>

						<!--- Search Bar Script -->
						<script>
							var modal = document.getElementById('searchBarModal');
							var btn = document.getElementById("searchBarModalSubmit");
							var span = document.getElementsByClassName("close")[0];
							
							// When the user clicks on the button, open the modal 
							btn.onclick = function() {
							    modal.style.display = "block";
							}
							
							// When the user clicks on <span> (x), close the modal
							span.onclick = function() {
							    modal.style.display = "none";
							}
							
							// When the user clicks anywhere outside of the modal, close it
							window.onclick = function(event) {
							    if (event.target == modal) {
							        modal.style.display = "none";
							    }
							}
						</script>

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
	<div class="home-plane-container" style="background-image: url(<?php echo get_template_directory_uri() . "/img/plane.png"; ?>)"></div>
	<div class="welcome-message">
		<h1>Welcome <span class="welcome-dark">to</span> RYDAWAY.</h1>
		<p>An online travel resource.</p>
	</div>
	
<!-- 	<div class="notification-panel"><p>Hey! I'm currently doing some coding on my site. Please stick with me while it looks horribly ugly. - October 2, 2017, 6PM in Canada </p></div> -->

	<div id="content" class="site-content">
		<?php
			
			
// Grab 12 of the latest posts at random
	$catID = get_the_category();
	$catID = $catID[0]->cat_ID;
	
	$args = array( 'numberposts' => 25, 'category' => $catID, ); // Get the latest from this category
	$recent_posts_full_array = wp_get_recent_posts( $args );
	$keys = array_rand($recent_posts_full_array, 12); // Pick out four entries from the inital array
	
	foreach ($keys as $key) {
		
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($recent_posts_full_array[$key]["ID"]), 'large')[0];
			if (!$image) {
			   $image = get_template_directory_uri() . "/img/rydaway_logo_rast.png";
		    }
		    
		    ?>
		    
		    <a href="<?php echo get_permalink($recent_posts_full_array[$key]["ID"]); ?>" rel="bookmark" title="Link to <?php echo $recent_posts_full_array[$key]["post_title"];?>">

		    <div class="related-post" style="background-image: url( <?php echo $image; ?> )">
						<h3 class="related-post-txt"><?php echo $recent_posts_full_array[$key]["post_title"]; ?></h3>
					</div>
				</a>
		    
		    <?php
		
	}
	wp_reset_query();
			
			
			
			?>
		
		
				
		<?php
			
			get_footer();

