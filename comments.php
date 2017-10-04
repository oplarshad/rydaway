<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rydaway
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">Comments</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 0,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed. Sorry, eh?', 'rydaway' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().


	$fields =  array(

  'author' =>
    '<p class="comment-form-author"><label for="author">' . __( 'Your Name', 'domainreference' ) . '</label>&nbsp; ' .
    ( $req ? '<span class="required">*</span>&nbsp;&nbsp;' : '' ) .
    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>',

  'email' =>
    '<p class="comment-form-email"><label for="email">' . __( 'Your Email', 'domainreference' ) . '</label>&nbsp; ' .
    ( $req ? '<span class="required">*</span>&nbsp;&nbsp;' : '' ) .
    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>',

	);

	$args = array('title_reply' => 'Hey, I want to know what you think!', 'fields' => apply_filters( 'comment_form_default_fields', $fields ));
	comment_form($args);
	?>

</div><!-- #comments -->
