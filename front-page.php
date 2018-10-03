<?php
/* Template Name: HomePage */

get_header(); ?>
	<div class="home-welcome">
		<div class="home-plane-container" style="background-image: url(<?php echo get_template_directory_uri() . "/img/plane.png"; ?>)"></div>
		<div class="welcome-message">
			<h1>Welcome <span class="welcome-dark">to</span> RYDAWAY.</h1>
			<p>An online travel resource.</p>
		</div>
	</div>
	<?php
	// Random Post Display (most popular)
	$args = array(
		'posts_per_page' => 30,
		'meta_key' => 'wpb_post_views_count',
		'orderby' => 'meta_value_num',
		'order' => 'DESC',
		'post_status' => 'publish',
	);
	$recent_posts_full_array = wp_get_recent_posts( $args );
	$keys = array_rand($recent_posts_full_array, 12);
	foreach ($keys as $key) {
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($recent_posts_full_array[$key]["ID"]), 'medium')[0];
		if (!$image) {
		   $image = get_template_directory_uri() . "/img/rydaway_logo_rast.png";
	    }
		?>
		<a
			href="<?php echo esc_url(get_permalink($recent_posts_full_array[$key]["ID"])); ?>"
			rel="bookmark"
			title="Link to <?php echo esc_attr($recent_posts_full_array[$key]["post_title"]);?>"
		>

		    <div class="related-post" style="background-image: url( <?php echo esc_url($image); ?> )">
				<h3 class="related-post-txt"><?php echo esc_attr($recent_posts_full_array[$key]["post_title"]); ?></h3>
			</div>
		</a>
		<?php
	} // End foreach
	wp_reset_query();

	get_footer();
