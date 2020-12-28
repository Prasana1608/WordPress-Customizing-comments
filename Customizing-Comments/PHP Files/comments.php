<?php
/**
 * The template for displaying comments
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if (post_password_required())
{
    return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if (have_comments()):
	?>
	<h2 class="comments-title">
		<?php
	    	$test_comment_count = get_comments_number();
	    	if ('1' === $test_comment_count){
			printf(
			esc_html__('One thought on &ldquo;%1$s&rdquo;', 'test') , '<span>' . wp_kses_post(get_the_title()) . '</span>');
    		}
   		 else{
		        printf(
		        esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $test_comment_count, 'comments title', 'test')) , number_format_i18n($test_comment_count) , // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		        '<span>' . wp_kses_post(get_the_title()) . '</span>');
		}
		?>
	</h2>
		<?php the_comments_navigation(); ?>

	<ol class="comment-list">
		<li>
			<?php
			    $args = ['callback' => 'wptags_comment'];
			    wp_list_comments($args);
			?>
		</li>
	</ol>

		<?php
		    the_comments_navigation();

		    // If comments are closed and there are comments, let's leave a little note, shall we?
		    if (!comments_open()):
		?>
	<p class="no-comments"><?php esc_html_e('Comments are closed.', 'test'); ?></p>
		<?php
    			endif;
			endif;
			$comment_send = 'Submit';	
			$comment_reply = 'Leave a Message';
			$comment_reply_to = 'Reply a comment';
			$comment_author = 'Name';
			$comment_email = 'E-Mail';
			$comment_body = 'Comment';
			$comment_cookies_1 = ' By commenting you agree the';
			$comment_cookies_2 = ' Privacy Policy';
			$comment_before = 'e-mail address wont be displayed.';
			$comment_abort = 'Abort Reply';

			//Array
			$comments_args = array(
			    //Define Fields
			    'fields' => array(
				//Author field
				'author, email' => '<div class="d-flex"><p class="comment-form-author"><br /><input id="author" name="author" aria-required="true" placeholder="' . $comment_author . '"></input></p><p class="comment-form-email"><br /><input id="email" name="email" placeholder="' . $comment_email . '"></input></p></div>',
				//Comment text area
				'comment_field' => '<p class="comment-form-comment"><br /><textarea id="comment" name="comment" aria-required="true" placeholder="' . $comment_body . '"></textarea></p>',
				//Cookies
				'cookies' => '<input id="wp-comment-cookies-consent" type="checkbox" required>' . $comment_cookies_1 . '<a href="' . get_privacy_policy_url() . '">' . $comment_cookies_2 . '</a>',
   				 ) ,
			    // Change the title of send button
			    'label_submit' => __($comment_send) ,
			    // Change the title of the reply section
			    'title_reply' => __($comment_reply) ,
			    // Change the title of the reply section
			    'title_reply_to' => __($comment_reply_to) ,
			    //Cancel Reply Text
			    'cancel_reply_link' => __($comment_abort) ,
			    // Redefine your own textarea (the comment body).
			    'comment_field' => '<p class="comment-form-comment"><br /><textarea id="comment" name="comment" aria-required="true" placeholder="' . $comment_body . '"></textarea></p>',
			    //Message Before Comment
			    'comment_notes_before' => __($comment_before) ,
			    // Remove "Text or HTML to be displayed after the set of comment fields".
			    'id_submit' => __('comment-submit') ,
			);
			comment_form();
			?>

</div><!-- #comments -->
