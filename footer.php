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
		
		<div class="footer-container" style="background-image: url(<?php echo get_template_directory_uri() . "/img/plane.png"; ?>);">
			
			<div class="footer-site-info">
				<h2>&copy; RYDAWAY <?php echo date('Y'); ?></h2>
				<div class="footer-title-underline"></div>
				<p>RYDAWAY is an online travel resource about a guy named Ryder, his adventures, and the people he meets along the way.</p>
				
				<a href="https://github.com/ryderdamen" target="_blank"><i class="fa fa-wordpress" aria-hidden="true"></i> This site runs on a home-built, open-source WordPress theme</a>
			</div>
			
			<div class="footer-contact-info">
				<h2>Contact Info</h2>
				<div class="footer-title-underline"></div>
				<a href="https://instagram.com/rydaway" target="_blank"> <i class="fa fa-instagram social-icon" aria-hidden="true"></i>&nbsp;&nbsp;Follow me on instagram</a> <br>
				<a href="https://rydaway.com/about" target="_blank"> <i class="fa fa-envelope-o social-icon" aria-hidden="true"></i>&nbsp;&nbsp;Send me a message</a>
										
			</div>
			
			<div class="footer-top-links">
				<h2>Top Posts</h2>
				<div class="footer-title-underline"></div>
				<ul>
					
					
				<?php 
$popularpost = new WP_Query( array( 'posts_per_page' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
while ( $popularpost->have_posts() ) : $popularpost->the_post();
 
 ?> <li>
 		<a href="<?php echo get_permalink(); ?>"> <?php the_title(); ?> 
		</a>
	</li>
			
<?php
 
endwhile;
?>
				</ul>

			</div>
			
		</div>
		
<!--
		
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'rydaway' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'rydaway' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'rydaway' ), 'rydaway', '<a href="http://underscores.me/">Underscores.me</a>' );
			?>
		</div><!-- .site-info -->
		
		
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
