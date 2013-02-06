<?php
/*
 * Template - comments.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * This template is activated when comments are required on a single page or standard page.
 * The template sets the page links for comments that have been broken up across different pages.
 * The template then shows all the relevant comments followed by any relevant trackbacks/pingbacks.
 * The arguments for the standard comment form from the core files are then set.
 * Once the arguments have been set the mentioned comment form is called.
 * This is the only template where any changes to the comments and the comments form can be made.
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */

	
	if (!empty($_SERVER[ 'SCRIPT_FILENAME' ]) && 'comments.php' == basename($_SERVER[ 'SCRIPT_FILENAME' ]))
		die ( __( 'Please do not load this page directly. Thanks!', 'tweaker3' ) );
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'tweaker3' ); ?></p>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<?php paginate_comments_links(); ?>
	
	<?php if ( ! empty($comments_by_type[ 'comment' ]) ) : ?>
		
		<h3 id="comments"><?php comments_number( __( 'No Responses to', 'tweaker3' ), __( 'One Response to', 'tweaker3' ), __( '% Responses to', 'tweaker3' ) );?> '<?php the_title(); ?>'</h3>
		<ol class="commentlist">
			<?php $reply = __( 'Reply', 'tweaker3' ); ?>
			<?php wp_list_comments( 'type=comment&avatar_size=60&reply_text='.$reply ); ?>
		</ol>
	
	<?php endif; ?>
	
	<?php if ( ! empty($comments_by_type[ 'pings' ]) ) : ?>
		
		<h5 id="pings">Trackbacks/Pingbacks</h5>
		<ol class="commentlist">
			<?php $reply = __( 'Reply', 'tweaker3' ); ?>
			<?php wp_list_comments( 'type=pings&avatar_size=60&reply_text='.$reply ); ?>
		</ol>
	
	<?php endif; ?>
	
	<?php paginate_comments_links(); ?>

<?php else : ?>
	
	<?php if ( 'open' == $post->comment_status ) : ?>
	<?php else : ?>
	 	
		<?php if (is_page()): ?>
		<?php else: ?>
			
			<p class="nocomments"><?php _e( 'Comments are closed.', 'tweaker3' ); ?></p>
		
		<?php endif; ?>
	
	<?php endif; ?>

<?php endif; ?>

<?php if ( 'open' == $post->comment_status ) : ?>

	<?php $required_text = __( ' Required fields are marked <span class="required">*</span>', 'tweaker3' ); ?>
	
	<?php $tweaker3_comment_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<p class="comment-form-author">' .
                '<label for="author">' . __( 'Name', 'tweaker3' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="author" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '"  />' .
                '</p>',
    'email'  => '<p class="comment-form-email">' .
                '<label for="email">' . __( 'Email', 'tweaker3' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="email" name="email" type="text" value="' . 
				esc_attr(  $commenter['comment_author_email'] ) . '" />' .
				'</p>',
    'url'    => '<p class="comment-form-url">' .
				'<label for="url">' . __( 'Website', 'tweaker3' ) . '</label>' .
	            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></p>' ) ),
    'comment_field' => '<p class="comment-form-comment">' .
                '<label for="comment">' . __( 'Comment', 'tweaker3' ) . '</label>' .
                '<textarea id="comment" name="comment" rows="8"></textarea>' .
                '</p>',
    'comment_notes_after' => '',
	'title_reply'=> __( 'Leave a Reply', 'tweaker3' ),
	'logged_in_as'=> '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'tweaker3' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
	'label_submit'=> __( 'Post Comment', 'tweaker3' ),
	'comment_notes_before'=> '<p class="comment-notes">' . __( 'Your email address will not be published.', 'tweaker3' ) . ( $req ? $required_text : '' ) . '</p>',
	'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'tweaker3' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
	'cancel_reply_link' => __( 'Cancel reply', 'tweaker3' ),
	);
	
	comment_form($tweaker3_comment_args); ?>

<?php endif; ?>