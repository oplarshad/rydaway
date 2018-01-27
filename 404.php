<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package rydaway
 */

// old bg image https://c1.staticflickr.com/8/7560/26801245133_936b8fddd4_k.jpg

// Get Page URL
$rydaway_pageUrl = $_SERVER['REQUEST_URI'];
$rydaway_backgroundImageUrl = get_template_directory_uri() . '/error-pages-includes/background' . mt_rand(1, 3) . '.jpg';

get_header(); ?> 


  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/error-pages-includes/main.css" type="text/css">
  <script src="https://code.jquery.com/jquery.min.js"></script>
  <script>
	  $(function(){
	  	var bgimage = new Image();      
	  	bgimage.src="<?php echo $rydaway_backgroundImageUrl; ?>";       
	  	$(".bg-img").hide();
	  	$(bgimage).load(function(){
	  		$(".bg-img").css("background-image","url("+$(this).attr("src")+")").fadeIn(2000);                  
    	});
	});
  </script>
  <body>
	  <div class="bg-img"></div>
	  <div class="container">
		  <a href="<?php echo site_url(); ?>">
		  <div class="inner">
			  <span class="error-code"><p>ERROR 404</p></span>
			  <p class="url-text">
				  <?php 
					  echo site_url() . $rydaway_pageUrl;
				  ?>
			  </p>
			  <h1>You might be lost... Sorry eh?</h1>
			  <p class="small-text">...but don't worry, getting lost makes for a good story.</p>
		  </div>
	  </div></a>
  </body>
</html>



<?php

//get_footer();







/*

Old 404


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Hmm, it looks like that page doesn&rsquo;t exist.', 'rydaway' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'rydaway' ); ?></p>

					<?php
						get_search_form();

						the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'rydaway' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->

					<?php

						$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'rydaway' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

						the_widget( 'WP_Widget_Tag_Cloud' );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
*/
