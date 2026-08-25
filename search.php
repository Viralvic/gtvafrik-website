<?php get_header(); ?>
<main id="main" class="archive-page">
  <header class="archive-hero shell">
    <p class="eyebrow">/ Search</p>
    <h1>Search results for “<?php echo esc_html(get_search_query()); ?>”</h1>
    <p class="archive-description"><?php echo esc_html($wp_query->found_posts); ?> result<?php echo $wp_query->found_posts === 1 ? '' : 's'; ?> found.</p>
  </header>
  <section class="shell newsroom-feed">
    <?php if (have_posts()) : ?>
      <div class="post-grid">
        <?php while (have_posts()) : the_post(); get_template_part('template-parts/post-card', null, ['variant'=>'standard']); endwhile; ?>
      </div>
      <nav class="pagination" aria-label="Search pagination"><?php the_posts_pagination(['mid_size'=>1,'prev_text'=>'← Previous','next_text'=>'Next →']); ?></nav>
    <?php else : ?>
      <div class="empty-state">
        <h2>No matching stories.</h2>
        <p>Try another keyword or browse the Newsroom.</p>
        <?php get_search_form(); ?>
      </div>
    <?php endif; ?>
  </section>
</main>
<?php get_footer(); ?>
