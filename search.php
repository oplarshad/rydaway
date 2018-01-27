<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package rydaway
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>
		
		<!-- The search bar and logic-->
		<script>
			$(document).ready(function(){
				var originalSearchQuery = document.getElementById("searchBarPage").value;
			    $("#searchBarPage").focusout(function(){
			        if (document.getElementById("searchBarPage").value != originalSearchQuery) {
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
						<input type="search" id="searchBarPage" value="<?php echo get_search_query(); ?>" name="s">
						</input>
					</form>
				</h1>
			</header><!-- .page-header -->

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
			
			<?php
			
			

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

		// Nothing was found
		
		?>
		
		<!-- The search bar and logic-->
		<script>
			$(document).ready(function(){
				var originalSearchQuery = document.getElementById("searchBarPage").value;
			    $("#searchBarPage").focusout(function(){
				    var newQuery = document.getElementById("searchBarPage").value;
			        if (newQuery != originalSearchQuery) {
				        // Submit the search
				        document.getElementById('mainSearchForm').submit();
			        }
			    });
			});
		</script>
		<header class="page-header" style="height: 400px;">
			<h1 class="page-title">
				<form role="search" method="get" action="https://www.rydaway.com/" name="pageSearch" id="mainSearchForm">
					<i class="fa fa-search" id="searchBarIcon" aria-hidden="true"></i>
					<input type="search" id="searchBarPage" placeholder="Sorry! Nothing was found." name="s">
					</input>
				</form>
			</h1>
		</header><!-- .page-header -->
		
		
		<?php
		
		

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
