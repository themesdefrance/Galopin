<?php if (post_password_required()) return; ?>

<div id="comments" class="post-comments">
	<?php if (have_comments()): ?>
		<h2 class="comments-title">
			<?php
                printf(_n(apply_filters('galopin_commentaire_unique', '1 comment was added, add yours.'), apply_filters('galopin_commentaire_multiple', '%1$s comments were added, add yours.'), get_comments_number(), 'galopin'), number_format_i18n(get_comments_number()));
            ?>
		</h2>
		
		<?php comment_form(array(
			'comment_notes_before'=>'',
			'comment_notes_after'=>'',
			'title_reply'=>'',
			'title_reply_to'=>apply_filters('galopin_commentaire_repondre_a', __('Reply to %s', 'galopin')),
			'label_submit'=>apply_filters('galopin_commentaire_envoyer', __('Post comment', 'galopin')),
		)); ?>
		
		<ol class="comment-list">
			<?php wp_list_comments(array('callback'=>'galopin_comment')); ?>
		</ol>
 
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')){ ?>
		<nav role="navigation" id="comment-nav-below" class="comment-navigation">
			<div class="nav-previous">
            	<?php previous_comments_link(apply_filters('galopin_commentaire_precedents', __('Previous comments', 'galopin'))); ?>
            </div>
            <div class="nav-next">
            	<?php next_comments_link(apply_filters('galopin_commentaire_suivants', __('Next comments', 'galopin'))); ?>
            </div>
        </nav>
        <?php } // check for comment navigation ?>
 
	<?php else:  ?>
		<h2 class="comments-title">
			<?php apply_filters('galopin_commentaire_premier', __('Be the first to post a comment.', 'galopin')); ?>
		</h2>

		<?php comment_form(array(
			'comment_notes_before'=>'',
			'comment_notes_after'=>'',
			'title_reply'=>'',
			'title_reply_to'=>apply_filters('galopin_commentaire_repondre_a', __('Reply to %s', 'galopin')),
			'label_submit'=>apply_filters('galopin_commentaire_envoyer', __('Post comment', 'galopin')),
		)); 
	endif; ?>
    <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')): ?>
		<p class="nocomments">
			<?php echo apply_filters('galopin_commentaires_clos', __('Comments are closed.', 'galopin')); ?>
		</p>
	<?php endif; ?>
</div>