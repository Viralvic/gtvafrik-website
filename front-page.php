<?php get_header(); ?>
<main id="main">
  <section class="hero shell">
    <div class="hero__copy">
      <p class="eyebrow eyebrow--dot">On air from Africa to everywhere</p>
      <h1>Africa's story.<br><span class="tint">Uncut,</span><br><span class="accent">unstoppable.</span></h1>
      <p class="hero__lede">GTVAFRIK is the media, marketing and advocacy platform helping African businesses, artists and change-makers get seen worldwide.</p>
      <div class="hero__actions">
        <a class="button" href="#contact">Book a Call</a>
        <a class="button button--ghost" href="https://wa.me/2348188059300" target="_blank" rel="noopener">WhatsApp</a>
        <a class="text-link" href="https://www.instagram.com/reel/DbqKQEzIDlP/" target="_blank" rel="noopener">Watch the reel →</a>
      </div>
    </div>
    <div class="hero__visual">
      <div class="hero__ring" aria-hidden="true"></div>
      <figure class="hero__frame">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/gtvafrik-editorial.jpg'); ?>" alt="GTVAFRIK editorial production" width="1200" height="800" fetchpriority="high">
        <span class="hero__wash" aria-hidden="true"></span>
      </figure>
      <div class="hero__visual-card" aria-hidden="true"><span>54</span><small>countries<br>in frame</small></div>
      <p class="hero__rotated" aria-hidden="true">The continent in motion</p>
    </div>
  </section>

  <section class="section shell" id="services">
    <div class="section-intro">
      <p class="eyebrow">/ What we do</p>
      <div><h2>Not just a message.<br><span class="accent">A movement with momentum.</span></h2><p>We work where culture, media and impact meet, building the strategy, stories and platforms that carry ideas further.</p></div>
    </div>
    <div class="service-list">
      <article><span>01</span><div><h3>Make the signal impossible to miss.</h3><ul class="tag-list"><li>Brand strategy</li><li>Campaigns</li><li>Creative direction</li></ul></div><p>We turn sharp ideas into stories people stop for, across screens, cities and conversations.</p></article>
      <article><span>02</span><div><h3>Give culture a bigger stage.</h3><ul class="tag-list tag-list--coral"><li>Original shows</li><li>Talent partnerships</li><li>Live production</li></ul></div><p>From original formats to live moments, we build programming that puts African voices in the frame.</p></article>
      <article id="advocacy"><span>03</span><div><h3>Move people from aware to active.</h3><ul class="tag-list tag-list--yellow"><li>Impact narratives</li><li>Public engagement</li><li>Movement design</li></ul></div><p>Advocacy with a pulse: human campaigns that make complex issues clear, urgent and actionable.</p></article>
    </div>
  </section>

  <section class="programming" id="programming">
    <div class="shell programming__inner"><p class="eyebrow">/ Programming</p><h2>The loudest room is the one you build.</h2></div>
  </section>

  <section class="section shell" id="work">
    <div class="section-heading"><div><p class="eyebrow">/ Proof of work</p><h2>Proof in the work.</h2></div><p>Watch three pieces from GTVAFRIK's current portfolio.</p></div>
    <div class="work-grid">
      <a class="work-card work-card--coral" href="https://www.instagram.com/reel/DWjE5zIiOME/" target="_blank" rel="noopener"><span>Case / 01</span><strong>Campaign storytelling</strong><small>Watch on Instagram <b aria-hidden="true">↗</b></small></a>
      <a class="work-card work-card--cyan" href="https://www.instagram.com/reel/DXOhSRKCFaC/" target="_blank" rel="noopener"><span>Case / 02</span><strong>Culture in motion</strong><small>Watch on Instagram <b aria-hidden="true">↗</b></small></a>
      <a class="work-card work-card--yellow" href="https://youtu.be/dK0AzE0KYjI" target="_blank" rel="noopener"><span>Case / 03</span><strong>Stories built to travel</strong><small>Watch on YouTube <b aria-hidden="true">↗</b></small></a>
    </div>
  </section>

  <section class="section shell" id="clients">
    <div class="section-heading"><div><p class="eyebrow">/ Brands we've worked with</p><h2>Across sectors.<br><span class="accent">Across the continent.</span></h2></div><p>Businesses, institutions and public-interest organisations that trusted GTVAFRIK to carry the signal.</p></div>
    <?php $brands = ['INEC','PDP','NOA','APC','SLOT Nigeria','International Energy Agency','NCDC','African Achievers Award','DreamSpring Microfinance','Rural Electrification Agency','SSANU','NEXCO Elevators','Ministry of Petroleum Resources and Gas','WOTCLEF','HyperCITY']; ?>
    <div class="brand-grid"><?php foreach ($brands as $brand) : ?><div class="brand-tile"><?php echo esc_html($brand); ?></div><?php endforeach; ?></div>
  </section>

  <section class="section newsroom-preview shell" id="newsroom">
    <div class="section-heading"><div><p class="eyebrow">/ From the newsroom</p><h2>Stories, in progress.</h2><p class="section-note"><?php echo esc_html(gtvafrik_post_count_label()); ?> and counting.</p></div><a class="text-link" href="<?php echo esc_url(gtvafrik_posts_page_url()); ?>">View all stories →</a></div>
    <?php $news = new WP_Query(['post_type'=>'post','posts_per_page'=>3,'post_status'=>'publish','ignore_sticky_posts'=>true]); ?>
    <?php if ($news->have_posts()) : ?><div class="post-grid post-grid--home"><?php while ($news->have_posts()) : $news->the_post(); get_template_part('template-parts/post-card', null, ['variant'=>'standard']); endwhile; wp_reset_postdata(); ?></div><?php else : ?><div class="empty-state"><h3>Your latest WordPress posts will appear here.</h3></div><?php endif; ?>
  </section>

  <section class="section shell contact" id="contact">
    <div class="contact__grid">
      <div><p class="eyebrow">/ Start a conversation</p><h2>Let's put your story <span class="accent">on air.</span></h2><p>Have a brief, a big question or just a spark? Get in touch.</p></div>
      <div class="contact__actions"><a class="button" href="mailto:hello@gtvafrik.com">Email GTVAFRIK</a><a class="button button--ghost" href="https://wa.me/2348188059300" target="_blank" rel="noopener">WhatsApp</a></div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
