<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package rydaway
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<?php
				
				if ( have_posts() ) {
    while ( have_posts() ) {
	    
	    wpb_set_post_views(get_the_ID()); // Tracking popular posts
 
        the_post(); ?>
 
        <?php the_content(); ?>
 
    <?php }
}
				
				?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<!-- 	<div class="related-posts-title"><h2>Related Posts</h2></div> -->
	<div class="related-posts">
	
	<?php
		// GET RELATED POSTS
		$tags = wp_get_post_tags($post->ID);
		if ($tags) {
			$first_tag = $tags[0]->term_id;
			$args=array(
				'tag__in' => array($first_tag),
				'post__not_in' => array($post->ID),
				'posts_per_page'=>4,
				'caller_get_posts'=>1,
				'post_status' => 'publish',
			);
			$my_query = new WP_Query($args);
			$count = 0;
		
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post(); 
					$count++;

				    // Retrieve the posts's associated image;
				    // If the post doesn't have an associated image, return a standard rydaway image
				    
				    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0];
				    if (!$image) {
					    $image = get_template_directory_uri() . "/img/rydaway_logo_rast.png";
				    }
		    
				?>

					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>">
						<div class="related-post" style="background-image: url( <?php echo esc_url($image); ?> )">
							<h3 class="related-post-txt"><?php the_title(); ?></h3>
						</div>
					</a>
				<?php
				endwhile;

				if ($count < 4) {
					// We don't have enough posts, lets add some of the recent posts.
					//$recentPosts = wp_get_recent_posts();
					$howManyLeftToGet = 4 - $count;
		
					$args = array(
						'numberposts' => $howManyLeftToGet,
						'category' => 0,
					);
					$recent_posts = wp_get_recent_posts( $args );
			
					foreach( $recent_posts as $recent ){
						
						$image = wp_get_attachment_image_src(get_post_thumbnail_id($recent["ID"]), 'large')[0];
						if (!$image) {
					    	$image = get_template_directory_uri() . "/img/rydaway_logo_rast.png";
				    	}

					?>
						<a
							href="<?php echo esc_url(get_permalink($recent["ID"])); ?>"
							rel="bookmark"
							title="Link to <?php echo esc_attr($recent["post_title"]); ?>"
						>
							<div class="related-post" style="background-image: url( <?php echo esc_url($image); ?> )">
								<h3 class="related-post-txt"><?php echo esc_attr($recent["post_title"]); ?></h3>
							</div>
						</a>
					<?php
				 	}
			wp_reset_query();
		
				} // End if $count < 4


			} // End if query has posts

else {
	// We don't have any posts, just grab the latest 10 and select 4 at random to display 
	// This else statement probably doesn't do anything
	
	$args = array( 'numberposts' => 25, 'category' => 0, );
	$recent_posts_full_array = wp_get_recent_posts( $args );
	$keys = array_rand($recent_posts_full_array, 4); // Pick out four entries from the inital array
	
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
	
}
wp_reset_query();

}

else {
	// We don't have any posts, just grab the latest 10 and select 4 at random to display 
	$catID = get_the_category();
	$catID = $catID[0]->cat_ID;
	
	$args = array( 'numberposts' => 25, 'category' => $catID, ); // Get the latest from this category
	$recent_posts_full_array = wp_get_recent_posts( $args );
	$keys = array_rand($recent_posts_full_array, 4); // Pick out four entries from the inital array
	
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
	
}

?>

</div>
	
	

<?php
get_sidebar();


comments_template();
get_footer();
