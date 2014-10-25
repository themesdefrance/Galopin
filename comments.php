<?php if (post_password_required()) return; ?>

<div id="comments" class="post-comments">
	<?php if (have_comments()): ?>
		<h2 class="comments-title">
			<?php
                printf(apply_filters('galopin_one_comment', __('1 comment was added, add yours','galopin')), apply_filters('galopin_several_comments', __('%1$s comments were added, add yours','galopin')), get_comments_number()), number_format_i18n(get_comments_number()));
            ?>
		</h2>
		
		<?php comment_form(array(
			'comment_notes_before'=>'',
			'comment_notes_after'=>'',
			'title_reply'=>'',
			'title_reply_to'=>apply_filters('galopin_reply_to_comment', __('Reply to %s', 'galopin')),
			'label_submit'=>apply_filters('galopin_post_comment', __('Post comment', 'galopin')),
		)); ?>
		
		<ol class="comment-list">
			<?php wp_list_comments(array('callback'=>'galopin_comment')); ?>
		</ol>
 
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')){ ?>
		<nav role="navigation" id="comment-nav-below" class="comment-navigation">
			<div class="nav-previous">
            	<?php previous_comments_link(apply_filters('galopin_previous_comments', __('Previous comments', 'galopin'))); ?>
            </div>
            <div class="nav-next">
            	<?php next_comments_link(apply_filters('galopin_next_comments', __('Next comments', 'galopin'))); ?>
            </div>
        </nav>
        <?php } // check for comment navigation ?>
 
	<?php else:  ?>
		<h2 class="comments-title">
			<?php apply_filters('galopin_first_to_comment', __('Be the first to post a comment.', 'galopin')); ?>
		</h2>

		<?php comment_form(array(
			'comment_notes_before'=>'',
			'comment_notes_after'=>'',
			'title_reply'=>'',
			'title_reply_to'=>apply_filters('galopin_reply_to_comment', __('Reply to %s', 'galopin')),
			'label_submit'=>apply_filters('galopin_post_comment', __('Post comment', 'galopin')),
		)); 
	endif; ?>
    <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')): ?>
		<p class="nocomments">
			<?php echo apply_filters('galopin_closed_comments', __('Comments are closed.', 'galopin')); ?>
		</p>
	<?php endif; ?>
</div>