<?php

/**
 * Theme Functions
 *
 * @file           functions.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0.1
 */
 
if ( ! function_exists( 'luminescence_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own luminescence_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function luminescence_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'luminescence' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'luminescence' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
		
		<header class="comment-meta comment-author vcard row-fluid">
			<div class="span1">
				<?php echo get_avatar( $comment, 44 ); ?>
			</div>
			<div class="span11">
			<?php
				printf( '<cite class="fn">%1$s %2$s</cite>',
					get_comment_author_link(),
					// If current post author is also comment author, make it known visually.
					( $comment->user_id === $post->post_author ) ? '<span class="postauthor"> ' . __( '&#40;Post author&#41;', 'luminescence' ) . '</span>' : ''
				);
				printf( '<time datetime="%2$s">%3$s</time>',
					esc_url( get_comment_link( $comment->comment_ID ) ),
					get_comment_time( 'c' ),
					/* translators: 1: date, 2: time */
					sprintf( __( '<span class="comment-date">Commented on: %1$s</span>', 'luminescence' ), get_comment_date('F j, Y'), get_comment_time() )
				);
				?>
				<?php edit_comment_link( __( '<strong>Edit</strong> this comment', 'luminescence' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
		</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'luminescence' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
			</section><!-- .comment-content -->

			<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<strong>Reply</strong> to this Comment', 'luminescence' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
			
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

/**
 * Adds markup to the comment form which is needed to make it work with Bootstrap

 */
function luminescence_comment_form_top() {
	echo '<div class="form-horizontal">';
}
add_action( 'comment_form_top', 'luminescence_comment_form_top' );


/**
 * Adds markup to the comment form which is needed to make it work with Bootstrap
 */
function luminescence_comment_form() {
	echo '</div>';
}
add_action( 'comment_form', 'luminescence_comment_form' );


/**
 * Custom author form field for the comments form
 */
function luminescence_comment_form_field_author( $html ) {
	$commenter	=	wp_get_current_commenter();
	$req		=	get_option( 'require_name_email' );
	$aria_req	=	( $req ? " aria-required='true'" : '' );
	
	return	'<div class="comment-form-author form-elements">				
				<input id="author" name="author" type="text" value="' . esc_attr(  $commenter['comment_author'] ) . '" placeholder="' . __( 'Name*', 'luminescence' ) . '" class="span6"' . $aria_req . ' />
					' . '</div>';
}
add_filter( 'comment_form_field_author', 'luminescence_comment_form_field_author');


/**
 * Custom HTML5 email form field for the comments form
 */
function luminescence_comment_form_field_email( $html ) {
	$commenter	=	wp_get_current_commenter();
	$req		=	get_option( 'require_name_email' );
	$aria_req	=	( $req ? " aria-required='true'" : '' );
	
	return	'<div class="comment-form-email form-elements">				
				<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="' . __( 'Email*', 'luminescence' ) . '" class="span6"' . $aria_req . ' /></div>';
}
add_filter( 'comment_form_field_email', 'luminescence_comment_form_field_email');


/**
 * Custom HTML5 url form field for the comments form
 */
function luminescence_comment_form_field_url( $html ) {
	$commenter	=	wp_get_current_commenter();
	
	return	'<div class="comment-form-url form-elements">
					<input id="url" name="url" type="url" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" placeholder="' . __( 'Website', 'luminescence' ) . '" class="span6" />
			</div>';
}
add_filter( 'comment_form_field_url', 'luminescence_comment_form_field_url');

/**
 * Filters comments_form() default arguments
 */
function luminescence_comment_form_defaults( $defaults ) {
	return wp_parse_args( array(
		'comment_field'			=>	'<div class="comment-form-comment form-elements clearfix"><textarea class="span12" id="comment" name="comment" placeholder="' . __( 'Comment*', 'luminescence' ) . '" rows="8" aria-required="true"></textarea></div>',
		'comment_notes_before'	=>	'',
		'comment_notes_after'	=>	'',
		'title_reply'			=>	'<legend>' . __( 'Leave a reply', 'luminescence' ) . '</legend>',
		'title_reply_to'		=>	'<legend>' . __( 'Leave a reply to %s', 'luminescence' ). '</legend>',
		'must_log_in'			=>	'<div class="must-log-in form-elements controls">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'luminescence' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</div>',
		'logged_in_as'			=>	'<div class="logged-in-as form-elements controls">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'luminescence' ), admin_url( 'profile.php' ), wp_get_current_user()->display_name, wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ) ) . '</div>',
	), $defaults );
}
add_filter( 'comment_form_defaults', 'luminescence_comment_form_defaults' );
