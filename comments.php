<?php
if (post_password_required()) return;
?>
<div id="comments" class="comments-area">
  <div class="section-heading"><div><p class="eyebrow">/ Join the conversation</p><h2><?php echo esc_html(get_comments_number() ? sprintf(_n('%s comment','%s comments',get_comments_number(),'gtvafrik'),number_format_i18n(get_comments_number())) : 'Leave a comment'); ?></h2></div></div>
  <?php if (have_comments()) : ?>
    <ol class="comment-list"><?php wp_list_comments(['style'=>'ol','avatar_size'=>54,'short_ping'=>true]); ?></ol>
    <?php the_comments_navigation(); ?>
  <?php endif; ?>
  <?php comment_form([
    'title_reply'=>'Share your perspective',
    'label_submit'=>'Post comment',
    'comment_field'=>'<p class="comment-form-comment"><label for="comment">Comment</label><textarea id="comment" name="comment" rows="6" required></textarea></p>',
  ]); ?>
</div>
