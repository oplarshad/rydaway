<?php
/* Template Name: HomePage */

// This is a specific page just for the home page.

get_header(); ?>
<!doctype html>

	<div class="home-welcome">
		<div class="home-plane-container" style="background-image: url(<?php echo get_template_directory_uri() . "/img/plane.png"; ?>)"></div>
		<div class="welcome-message">
			<h1>Welcome <span class="welcome-dark">to</span> RYDAWAY.</h1>
			<p>An online travel resource.</p>
		</div>
	</div>
	
		<?php
			
			
// Grab 12 of the latest posts at random
	$catID = get_the_category();
	$catID = $catID[0]->cat_ID;
	
	$args = array( 'numberposts' => 25, 'category' => $catID, ); // Get the latest from this category
	$recent_posts_full_array = wp_get_recent_posts( $args );
	$keys = array_rand($recent_posts_full_array, 12); // Pick out four entries from the inital array
	
	foreach ($keys as $key) {
		
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($recent_posts_full_array[$key]["ID"]), 'medium')[0];
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

