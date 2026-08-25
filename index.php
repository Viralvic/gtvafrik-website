<?php get_header(); ?>
<main id="main" class="archive-page">
  <header class="archive-hero shell"><p class="eyebrow">/ GTVAFRIK</p><h1><?php bloginfo('name'); ?></h1></header>
  <section class="shell newsroom-feed">
    <?php if (have_posts()) : ?><div class="post-grid"><?php while (have_posts()) : the_post(); get_template_part('template-parts/post-card', null, ['variant'=>'standard']); endwhile; ?></div><?php the_posts_pagination(); else : ?><div class="empty-state"><h2>No content found.</h2></div><?php endif; ?>
  </section>
</main>
<?php get_footer(); ?>
