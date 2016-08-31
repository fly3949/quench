<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

if(comments_open()) {
 ?>
<div class="comments clearfix box">
	<?php $comments = get_comments('post_id='.$post->ID.'&status=approve');?>
	<h5 id="comments-title"><span><?php echo count($comments); ?> <?php _e('Comments', 'quench');?></span></h5>
	<div class="commentshow">
		<ol class="comments-list">
			<?php wp_list_comments('type=comment&callback=comment&max_depth=1000&style=ol'); ?>
		</ol>
		<nav class="commentnav" data-postid="<?php echo $post->ID?>"><?php paginate_comments_links('prev_text=«&next_text=»');?></nav>
	</div>

	<div id="respond" class="comment-respond">
		<h5 id="replytitle" class="comment-reply-title"><?php _e('Leave a Reply', 'quench');?> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;"><?php _e('Cancel reply', 'quench');?></a></small></h5>
		<form action="#" method="post" id="commentform" class="clearfix">
			<?php if ( $user_ID ) { ?>
			<p style="margin-bottom:10px"><?php _e('Logged in as', 'quench');?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;|&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out', 'quench');?> &raquo;</a></p>
			<?php } else { ?>
			<p class="input-row"><input type="text" name="author" class="text_input" id="author" size="22" tabindex="1" value="<?php if (!empty($comment_author)) { echo esc_attr($comment_author); } else { ''; } ?>" placeholder="<?php _e('NAME', 'quench');?> *"/>
			</p>

			<p class="input-row"><input type="text" name="email" class="text_input" id="email" size="22" tabindex="2" value="<?php if (!empty($comment_author_email)) { echo esc_attr($comment_author_email); } else { ''; } ?>"  placeholder="<?php _e('E-MAIL', 'quench');?> *"/>
			</p>

			<p class="input-row"><input type="text" name="url" class="text_input" id="url" size="22" tabindex="3" value="<?php if (!empty($comment_author_url)) { echo esc_attr($comment_author_url); } else { ''; } ?>" placeholder="<?php _e('WEBSITE', 'quench');?>"/>
			</p>

			<?php }?>

			<?php comment_id_fields(); do_action('comment_form', $post->ID); ?>

			<p class="input-row message-row"><textarea class="text_area" rows="3" cols="80" name="comment" id="comment" tabindex="4"  placeholder="<?php _e('CONTENT...', 'quench');?>"></textarea></p>
			<input type="submit" name="submit" class="button" id="submit" tabindex="5" value="<?php _e('Submit', 'quench');?>"/>

		</form>
	</div>

</div>
<?php
}
 ?>
