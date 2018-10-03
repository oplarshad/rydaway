<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rydaway
 */

?>
	</div><!-- #content -->
	<footer id="colophon" class="site-footer">
		<div class="footer-container" style="background-image: url(<?php echo get_template_directory_uri() . "/img/plane_ud.png"; ?>);">
			<div class="footer-site-info">
				<h2>&copy; RYDAWAY <?php echo date('Y'); ?></h2>
				<div class="footer-title-underline"></div>
				<p>RYDAWAY is an online travel resource about a guy named Ryder, his adventures, and the people he meets along the way.</p>
				<a href="https://github.com/ryderdamen/rydaway" target="_blank" rel="noopener"><i class="fab fa-wordpress" aria-hidden="true"></i> RYDAWAY is a WordPress site, running a custom theme built by me. Click for more info.</a>
			</div>

			<div class="footer-contact-info">
				<h2>Contact Info</h2>
				<div class="footer-title-underline"></div>
				
				<a class="contact-info-container" href="https://instagram.com/rydaway" target="_blank" rel="noopener">
					<div class="contact-info-logo">
						<i class="fab fa-instagram" aria-hidden="true"></i>
					</div>
					<p class="contact-info-text">
						Follow me on Instagram
					</p>
				</a>
				
				<a class="contact-info-container" href="m&#97;ilto&#58;r%79der%&#52;0ryd&#97;w&#97;y&#46;c%&#54;F&#109;" target="_blank">
					<div class="contact-info-logo">
						<i class="fas fa-envelope" aria-hidden="true"></i>
					</div>
					<p class="contact-info-text">
						Send me a message
					</p>
				</a>
				
				<a class="contact-info-container" href="https://twitter.com/rydamen" target="_blank" rel="noopener">
					<div class="contact-info-logo">
						<i class="fab fa-twitter" aria-hidden="true"></i>
					</div>
					<p class="contact-info-text">
						Follow me on Twitter
					</p>
				</a>
				
				<a class="contact-info-container" href="https://ryderdamen.com" target="_blank" rel="noopener">
					<div class="contact-info-logo">
						<i class="icon-r-logo" aria-hidden="true"></i>
					</div>
					<p class="contact-info-text">
						Check out my main site
					</p>
				</a>
				
										
			</div>
			
			<div class="footer-top-links">
				<h2>Top Posts</h2>
					<div class="footer-title-underline"></div>
				<ul>	
				<?php 
					// Get Top Posts
					$args = array(
						'posts_per_page' => 5,
						'meta_key' => 'wpb_post_views_count',
						'orderby' => 'meta_value_num',
						'order' => 'DESC',
						'post_status' => 'publish',
					);
					$popularpost = new WP_Query( $args );
					
					// Start the loop
					while ( $popularpost->have_posts() ) : $popularpost->the_post();
 					?> 
	 					<li>
	 						<a href="<?php echo esc_url(get_permalink()); ?>"> <?php the_title(); ?> </a>
	 					</li>
 					<?php
 					endwhile;
 					wp_reset_query();
				?>
				</ul>
				
				<!-- Search Bar -->
				<script>
					$(document).ready(function(){
						var originalSearchQuery = document.getElementById("footerSearchBar").value;
					    $("#footerSearchBar").focusout(function(){
						    var newQuery = document.getElementById("footerSearchBar").value;
					        if (newQuery != originalSearchQuery) {
						        // Submit the search
						        document.getElementById('footerSearchForm').submit();
					        }
					    });
					});
				</script>
				<p class="searchText">
					<form role="search" method="get" action="https://www.rydaway.com/" name="pageSearch" id="footerSearchForm">
						<i class="fas fa-search" id="footerSearchBarIcon" aria-hidden="true"></i>
						<input type="search" id="footerSearchBar" placeholder="Looking for something?" name="s">
						</input>
					</form>
				</p>
			</div>
		</div>		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
