<?php
$variant = $args['variant'] ?? 'standard';
$category = gtvafrik_primary_category();
?>
<article <?php post_class('post-card post-card--' . sanitize_html_class($variant)); ?>>
  <a class="post-card__image" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(get_the_title()); ?>">
    <?php if (has_post_thumbnail()) {
      the_post_thumbnail($variant === 'featured' ? 'large' : 'medium_large', ['loading' => $variant === 'featured' ? 'eager' : 'lazy']);
    } else { ?>
      <span class="post-card__placeholder" aria-hidden="true"></span>
    <?php } ?>
  </a>
  <div class="post-card__content">
    <div class="post-card__meta">
      <?php if ($category) { ?><a href="<?php echo esc_url(get_category_link($category)); ?>"><?php echo esc_html($category->name); ?></a><?php } ?>
      <span><?php echo esc_html(get_the_date('M j, Y')); ?></span>
      <span><?php echo esc_html(gtvafrik_reading_time()); ?> min read</span>
    </div>
    <h3 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="post-card__excerpt"><?php echo esc_html(gtvafrik_excerpt($variant === 'compact' ? 14 : 22)); ?></p>
  </div>
</article>
