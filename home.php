<?php get_header(); ?>
<main id="main" class="newsroom">
  <section class="newsroom-hero shell">
    <p class="eyebrow">/ GTVAFRIK Newsroom</p>
    <div class="newsroom-hero__grid">
      <div>
        <h1>News, ideas and stories shaping Africa now.</h1>
      </div>
      <p>Politics, business, culture, entertainment, sport and global stories — presented with a cleaner editorial hierarchy and faster reading experience.</p>
    </div>
  </section>

  <?php
  $featured = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 1,
    'ignore_sticky_posts' => false,
  ]);
  $featured_ids = [];
  if ($featured->have_posts()) : ?>
    <section class="shell newsroom-featured">
      <?php while ($featured->have_posts()) : $featured->the_post(); $featured_ids[] = get_the_ID();
        get_template_part('template-parts/post-card', null, ['variant' => 'featured']);
      endwhile; wp_reset_postdata(); ?>
    </section>
  <?php endif; ?>

  <section class="shell newsroom-feed">
    <div class="section-heading">
      <div>
        <p class="eyebrow">/ Latest</p>
        <h2>Latest stories</h2>
      </div>
      <?php get_search_form(); ?>
    </div>

    <?php if (have_posts()) : ?>
      <div class="post-grid">
        <?php while (have_posts()) : the_post();
          if (in_array(get_the_ID(), $featured_ids, true) && !is_paged()) continue;
          get_template_part('template-parts/post-card', null, ['variant' => 'standard']);
        endwhile; ?>
      </div>
      <nav class="pagination" aria-label="Posts pagination"><?php the_posts_pagination(['mid_size'=>1,'prev_text'=>'← Previous','next_text'=>'Next →']); ?></nav>
    <?php else : ?>
      <div class="empty-state"><h2>No stories yet.</h2><p>Published WordPress posts will appear here automatically.</p></div>
    <?php endif; ?>
  </section>
</main>
<?php get_footer(); ?>
