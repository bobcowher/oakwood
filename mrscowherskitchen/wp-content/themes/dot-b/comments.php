<?php
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'dot-b'); ?></p>
	<?php
		return;
	}
?>
<!-- You can start editing here -->
	<?php if ( have_comments() ) { ?>
			<h2 id="comments-title"><span>{ <a href="#respond"  rel="nofollow" title="<?php _e('Leave a Reply ?', 'dot-b'); ?>"><?php _e('Leave a Reply ?', 'dot-b'); ?></a> }</span></h2>
			<ol class="commentlist" id="thecomments">
				<?php wp_list_comments('type=comment&callback=dotb_mytheme_comment'); ?>
			</ol>
			<div class="navigation"><?php paginate_comments_links(); ?></div>

	<?php } else { // this is displayed if there are no comments so far. ?>
	<?php if ( ! comments_open() && !is_page() ) { ?>

	<?php } // end ! comments_open() ?>

	<?php } // end have_comments()
	comment_form(); 
	$pings_count = 0;
	foreach($comments as $comment){ if(get_comment_type() != 'comment' && $comment->comment_approved != '0'){ $pings_count = 1; break; } }
	if($pings_count == 1) :
	?>
	<h2 id="pings-title">Pingback & Trackback</h2>
	<ol class="pingslist">
	<?php wp_list_comments('type=pings&callback=dotb_mytheme_comment'); ?>
	</ol>
	<?php endif; ?>