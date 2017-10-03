<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rydaway
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">



		<?php
			
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					$this_posts_thumbnail_url = get_the_post_thumbnail_url();
					//the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				
				
		<div class="archive-header-image-container">
			<div class="header-image" style="background-image: url(<?php echo $this_posts_thumbnail_url ?>);">
			</div>
			<div class="single-post-title-container">
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			</div>
		</div>

				
				
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			
			
			

				?>
				
				<a href="<?php echo get_permalink();  ?>">
				<div class="archived-post">
					<div class="archived-post-thumb" style="background-image: url( <?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0]; ?> )"></div>
					<div class="archived-post-content">
						<div class="archived-post-title"> <h2> <?php the_title(); ?> </h2> </div>
						<div class="archived-post-preview">
							<p>
								<?php the_excerpt(); ?> 
							</p>
						</div>
					</div>
					
					
					
				</div>
				</a>
				
						
				
				<?

				
				
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
