<?php get_header(); ?>
<main id="main" class="archive-page">
  <header class="archive-hero shell">
    <p class="eyebrow">/ Category</p>
    <h1><?php single_cat_title(); ?></h1>
    <?php if (category_description()) : ?><div class="archive-description"><?php echo wp_kses_post(category_description()); ?></div><?php endif; ?>
  </header>
  <section class="shell newsroom-feed">
    <?php if (have_posts()) : ?>
      <div class="post-grid">
        <?php while (have_posts()) : the_post(); get_template_part('template-parts/post-card', null, ['variant'=>'standard']); endwhile; ?>
      </div>
      <nav class="pagination" aria-label="Posts pagination"><?php the_posts_pagination(['mid_size'=>1,'prev_text'=>'← Previous','next_text'=>'Next →']); ?></nav>
    <?php else : ?>
      <div class="empty-state"><h2>No stories in this category yet.</h2></div>
    <?php endif; ?>
  </section>
</main>
<?php get_footer(); ?>
