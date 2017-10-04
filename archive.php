<?php
/**
* The template for displaying archive pages
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package rydaway
*/
get_header();

if ( have_posts() ) : ?>


<header class="page-header">
  <?php
$this_posts_thumbnail_url = get_the_post_thumbnail_url();
//the_archive_description( '<div class="archive-description">', '</div>' );
?>
  <div class="archive-header-image-container">
    <div class="header-image" style="background-image: url(<?php echo $this_posts_thumbnail_url ?>);">
    </div>
    <div class="archive-title-container">
      <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
    </div>
  </div>
</header>


<div id="primary" class="content-area">
  <main id="main" class="site-main">
	  
    <?php
/* Start the Loop */
while ( have_posts() ) : the_post();
?>

    <a href="<?php echo get_permalink();  ?>">
	    
	    <?php 
		    // Retrieve the posts's associated image;
		    // If the post doesn't have an associated image, return a standard rydaway image
		    
		    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0];
		    if (!$image) {
			    $image = get_template_directory_uri() . "/img/rydaway_logo_rast.png";
		    }
		    
	    ?>
	    
      <div class="archived-post-container">
        <div class="archived-post-image-container" style="background-image: url( <?php echo $image; ?> )">
        </div>
        <div class="archived-post-content-container">
            <h2> 
              <?php the_title(); ?> 
            </h2> 
            <p>
              <?php the_excerpt(); ?> 
            </p>
        </div>
      </div>
    </a>
    
    
    <?
endwhile;
$args = array('prev_text' => 'Older Posts', 'next_text' => 'Newer Posts');
?> <div class="posts-navigation"> <?php echo get_the_posts_navigation( $args ); ?> </div> <?php 
	


else :
get_template_part( 'template-parts/content', 'none' );
endif; ?>


  </main>
</div>
<!-- #primary -->


<?php
get_sidebar();
get_footer();
