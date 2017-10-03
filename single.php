<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
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
'caller_get_posts'=>1
);
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>

<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute();?>">
	<div class="related-post" style="background-image: url( <?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0]; ?> )">
	<h3 class="related-post-txt"><?php the_title(); ?></h3>
	</div>
	</a>

 
<?php
endwhile;
}
wp_reset_query();
}
?>

</div>
	
	

<?php
get_sidebar();



//comments_template();
get_footer();
