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
    <div class="hero__visual" aria-hidden="true">
      <div class="hero__visual-card"><span>54</span><small>countries<br>in frame</small></div>
      <div class="hero__visual-grid"></div>
    </div>
  </section>

  <section class="section shell" id="services">
    <div class="section-intro">
      <p class="eyebrow">/ What we do</p>
      <div><h2>Not just a message.<br><span class="accent">A movement with momentum.</span></h2><p>We work where culture, media and impact meet, building the strategy, stories and platforms that carry ideas further.</p></div>
    </div>
    <div class="service-list">
      <article><span>01</span><h3>Make the signal impossible to miss.</h3><p>Brand strategy, campaigns and creative direction for ideas that need attention.</p></article>
      <article><span>02</span><h3>Give culture a bigger stage.</h3><p>Original shows, talent partnerships and live production that put African voices in the frame.</p></article>
      <article id="advocacy"><span>03</span><h3>Move people from aware to active.</h3><p>Impact narratives, public engagement and advocacy built to turn attention into action.</p></article>
    </div>
  </section>

  <section class="programming" id="programming">
    <div class="shell programming__inner"><p class="eyebrow">/ Programming</p><h2>The loudest room is the one you build.</h2></div>
  </section>

  <section class="section shell" id="work">
    <div class="section-heading"><div><p class="eyebrow">/ Proof of work</p><h2>Proof in the work.</h2></div><p>Three approved pieces from GTVAFRIK's current portfolio.</p></div>
    <div class="work-grid">
      <a class="work-card" href="https://www.instagram.com/reel/DWjE5zIiOME/" target="_blank" rel="noopener"><span>01</span><strong>Featured Work</strong><small>Instagram Reel</small></a>
      <a class="work-card" href="https://www.instagram.com/reel/DXOhSRKCFaC/" target="_blank" rel="noopener"><span>02</span><strong>Featured Work</strong><small>Instagram Reel</small></a>
      <a class="work-card" href="https://youtu.be/dK0AzE0KYjI" target="_blank" rel="noopener"><span>03</span><strong>Featured Work</strong><small>YouTube</small></a>
    </div>
  </section>

  <section class="section shell" id="clients">
    <div class="section-heading"><div><p class="eyebrow">/ Brands we've worked with</p><h2>Across sectors.<br><span class="accent">Across the continent.</span></h2></div><p>Approved brand names are shown as clean text placeholders until final logo assets are supplied.</p></div>
    <?php $brands = ['INEC','PDP','NOA','APC','SLOT Nigeria','International Energy Agency','NCDC','African Achievers Award','DreamSpring Microfinance','Rural Electrification Agency','SSANU','NEXCO Elevators','Ministry of Petroleum Resources and Gas','WOTCLEF','HyperCITY']; ?>
    <div class="brand-grid"><?php foreach ($brands as $brand) : ?><div class="brand-tile"><?php echo esc_html($brand); ?></div><?php endforeach; ?></div>
  </section>

  <section class="section newsroom-preview shell" id="newsroom">
    <div class="section-heading"><div><p class="eyebrow">/ Newsroom</p><h2>Latest from GTVAFRIK.</h2></div><a class="text-link" href="<?php echo esc_url(gtvafrik_posts_page_url()); ?>">View all stories →</a></div>
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
