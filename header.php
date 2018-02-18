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
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Meta Tags -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#1a348b">
	<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

	
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
		<header id="masthead" class="site-header">
			
			<!--Mobile Navigation -->
			<div class="mobile-menu">
				<div class="mobile-menu-logo">
					<h1 class="mobile-site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
				</div>
				<div class="mobile-menu-button" id="mobile-menu-button">
					<i class="fas fa-bars mobile-menu-icon" id="mobile-menu-button-icon"></i>
				</div>
				<div class="mobile-menu-search" id="mobile-menu-search">
					<i class="fas fa-search mobile-menu-icon" id="mobile-menu-search-icon"></i>
				</div>
			</div>
			<div class="mobile-search-bar" id="mobile-search-bar">
				<form role="search" method="get" action="https://www.rydaway.com/" name="pageSearch" id="mainSearchForm">
					<input type="search" class="mobile-search-bar-input" id="mobileSearchInput" placeholder="Looking for something?" name="s">
				</form>
				</input>
			</div>
			<script>
				$(document).ready(function() {
					
					var menuOpen = false;
					var searchOpen = false;
					
					function openMenu() {
						document.getElementById('mobile-menu-button').style.backgroundColor = '#f8f8f8';
						document.getElementById('mobile-menu-button-icon').style.color = '#0fb8ad';
						document.getElementById('main-nav').style.display = 'block';
						document.getElementById('masthead').style.background = '#1a348b';
						menuOpen = true;
					}
					
					function closeMenu() {
						document.getElementById('mobile-menu-button').style.backgroundColor = 'transparent';
						document.getElementById('mobile-menu-button-icon').style.color = '#fff';
						document.getElementById('main-nav').style.display = 'none';
						document.getElementById('masthead').style.background = 'linear-gradient(141deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 75%)';
						menuOpen = false;
					}
					
					function openSearch() {
						document.getElementById('mobile-menu-search').style.backgroundColor = '#f8f8f8';
						document.getElementById('mobile-menu-search-icon').style.color = '#0fb8ad';
						document.getElementById('mobile-search-bar').style.display = 'block';
						searchOpen = true;
					}
					
					function closeSearch() {
						document.getElementById('mobile-menu-search').style.backgroundColor = 'transparent';
						document.getElementById('mobile-menu-search-icon').style.color = '#fff';
						document.getElementById('mobile-search-bar').style.display = 'none';
						searchOpen = false;
					}
					
					function resetHeader() {
						document.getElementById('main-nav').style.display = 'block';
					}
					
					// Mobile Search Bar Logic
					$(document).ready(function(){
									var originalSearchQuery = document.getElementById("mobileSearchInput").value;
								    $("#searchBarHeader").focusout(function(){
								        if (document.getElementById("mobileSearchInput").value != originalSearchQuery) {
									        // Submit the search
									        document.getElementById('mainSearchForm').submit();
								        }
								    });
								});
					
					// Clickable Logic
				    $('#mobile-menu-button').on('click', function() {
					    if (!menuOpen) {
						    openMenu()
						    closeSearch()
					    }
					    else { // The menu is already open. Close it.
						    closeMenu()
					    }
				    });
				    
				    $('#mobile-menu-search').on('click', function() {
					    if (!searchOpen) { // The search is not open, open it.
						    openSearch()
						    closeMenu()
					    }
					    else { // The search is already open. Close it.
						    closeSearch()
					    }
				    });
					
					// Resizing Logic
					 $(window).resize(function() {
						 if ($(window).width() > 768) {
						 	resetHeader()
						 }
						 if ($(window).width() < 768) {
						 	closeMenu()
						 }
						});
				});
			</script>
			
			<!-- Regular Navigation -->
			<div class="site-branding" id="main-nav">
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
						<i class="fas fa-search search-button-header" aria-hidden="true" id="searchBarModalSubmit"></i>

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
											<i class="fas fa-search" id="searchBarIcon" aria-hidden="true"></i>
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
			
			<!-- The Featured Image and Title -->	
			<?php if ( is_single() ) : 
					if ( has_post_thumbnail() ) :
						$this_posts_thumbnail_url = get_the_post_thumbnail_url();
						$this_posts_title = get_the_title();
			?>

			<div class="header-image-container">
					<div class="header-image" style="background-image: url(<?php echo $this_posts_thumbnail_url ?>);">
				</div>
				<img class="plane-top" src="<?php echo get_template_directory_uri() . "/img/plane_top.png"; ?>">
				<div class="single-post-title-container">
						<h1><?php echo $this_posts_title ?></h1>
				</div>
			</div>
			<?php endif; // Else, no header. ?>

<?php endif; ?>
		
		</header><!-- #masthead -->
		<div id="content" class="site-content"> <!-- Begin the main content -->




	
	