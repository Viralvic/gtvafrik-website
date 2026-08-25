<?php get_header(); ?>
<main id="main" class="single-article">
<?php while (have_posts()) : the_post(); $category = gtvafrik_primary_category(); ?>
  <article <?php post_class(); ?>>
    <header class="article-hero shell">
      <div class="article-hero__meta">
        <?php if ($category) : ?><a href="<?php echo esc_url(get_category_link($category)); ?>"><?php echo esc_html($category->name); ?></a><?php endif; ?>
        <span><?php echo esc_html(get_the_date('F j, Y')); ?></span>
        <span><?php echo esc_html(gtvafrik_reading_time()); ?> min read</span>
      </div>
      <h1><?php the_title(); ?></h1>
      <?php if (has_excerpt()) : ?><p class="article-hero__dek"><?php echo esc_html(get_the_excerpt()); ?></p><?php endif; ?>
    </header>

    <?php if (has_post_thumbnail()) : ?>
      <figure class="article-feature shell"><?php the_post_thumbnail('full', ['loading'=>'eager']); ?></figure>
    <?php endif; ?>

    <div class="article-layout shell">
      <aside class="article-share" aria-label="Share article">
        <span>Share</span>
        <a target="_blank" rel="noopener" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(get_permalink()); ?>">Facebook</a>
        <a target="_blank" rel="noopener" href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode(get_permalink()); ?>&text=<?php echo rawurlencode(get_the_title()); ?>">X</a>
        <a target="_blank" rel="noopener" href="https://wa.me/?text=<?php echo rawurlencode(get_the_title() . ' ' . get_permalink()); ?>">WhatsApp</a>
      </aside>
      <div class="article-content"><?php the_content(); wp_link_pages(); ?></div>
      <aside class="article-sidebar">
        <div class="sidebar-card">
          <p class="eyebrow">/ Latest News</p>
          <?php $latest = new WP_Query(['posts_per_page'=>4,'post__not_in'=>[get_the_ID()],'ignore_sticky_posts'=>true]);
          if ($latest->have_posts()) : while ($latest->have_posts()) : $latest->the_post(); ?>
            <a class="sidebar-story" href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span><small><?php echo esc_html(get_the_date('M j')); ?></small></a>
          <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
      </aside>
    </div>

    <section class="related shell">
      <div class="section-heading"><div><p class="eyebrow">/ Keep reading</p><h2>You might also like</h2></div></div>
      <div class="post-grid post-grid--related">
        <?php $related_args = ['posts_per_page'=>3,'post__not_in'=>[get_the_ID()],'ignore_sticky_posts'=>true];
        if ($category) $related_args['cat'] = $category->term_id;
        $related = new WP_Query($related_args);
        if ($related->have_posts()) : while ($related->have_posts()) : $related->the_post(); get_template_part('template-parts/post-card', null, ['variant'=>'standard']); endwhile; wp_reset_postdata(); endif; ?>
      </div>
    </section>
  </article>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
