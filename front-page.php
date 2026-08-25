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
        <?php $hero_reel = gtvafrik_media_url('GTVAFRIK-Hero-Reel.mp4'); ?>
        <?php if ($hero_reel) : ?><video autoplay muted loop playsinline preload="metadata" aria-label="GTVAFRIK production reel"><source src="<?php echo esc_url($hero_reel); ?>" type="video/mp4"></video><?php endif; ?>
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
    <div class="featured-social">
      <div class="section-heading"><div><p class="eyebrow">/ Featured post</p><h2>Inside what we do.</h2></div><a class="text-link" href="https://www.instagram.com/p/DU74uHvCG9Y/" target="_blank" rel="noopener">View original post →</a></div>
      <div class="what-carousel" aria-label="What We Do featured carousel">
        <?php for ($slide = 1; $slide <= 8; $slide++) : $slide_url = gtvafrik_media_url($slide . '.jpg'); if (!$slide_url) continue; ?>
          <figure><img src="<?php echo esc_url($slide_url); ?>" alt="What We Do carousel slide <?php echo esc_attr($slide); ?> of 8" loading="lazy"></figure>
        <?php endfor; ?>
      </div>
    </div>
  </section>

  <section class="programming" id="programming">
    <div class="shell programming__inner"><p class="eyebrow">/ Programming</p><h2>The loudest room is the one you build.</h2></div>
  </section>

  <section class="section shell" id="work">
    <div class="section-heading"><div><p class="eyebrow">/ Proof of work</p><h2>Proof in the work.</h2></div><p>Watch three pieces from GTVAFRIK's current portfolio.</p></div>
    <div class="work-grid">
      <article class="work-card work-card--wide work-card--coral"><span>Case / 01</span><div class="video-frame"><iframe src="https://www.youtube-nocookie.com/embed/dK0AzE0KYjI" title="Citizen Autopsy" loading="lazy" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div><strong>Citizen Autopsy</strong></article>
      <?php foreach ([['Mens-Table.mp4', "Men's Table", 'cyan'], ['The-Rock-Zanzibar.mp4', 'The Rock Restaurant Zanzibar', 'yellow']] as $work) : $work_url = gtvafrik_media_url($work[0]); ?>
        <article class="work-card work-card--reel work-card--<?php echo esc_attr($work[2]); ?>"><span>Case / <?php echo $work[1] === "Men's Table" ? '02' : '03'; ?></span><?php if ($work_url) : ?><video controls playsinline preload="metadata"><source src="<?php echo esc_url($work_url); ?>" type="video/mp4"></video><?php endif; ?><strong><?php echo esc_html($work[1]); ?></strong></article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="section shell" id="clients">
    <div class="section-heading"><div><p class="eyebrow">/ Brands we've worked with</p><h2>Across sectors.<br><span class="accent">Across the continent.</span></h2></div><p>Businesses, institutions and public-interest organisations that trusted GTVAFRIK to carry the signal.</p></div>
    <?php $brands = [
      ['AAA-African-Achievers-Award.png','African Achievers Award'], ['APC-All-Progressives-Congress.png','All Progressives Congress'], ['Colective-Initiative.png','Collective Initiative'], ['Dream-Spring-Microfinance.png','DreamSpring Microfinance'], ['GSP-Hybrid-Power-Solution.svg','GSP Hybrid Power Solution'], ['HyperCITY.jpg','HyperCITY'], ['IEA-International-Energy-Agency-France.webp','International Energy Agency'], ['INEC-Independent-National-Electoral-Commission.png','INEC'], ['Kids-Windows-School.png','Kids Windows School'], ['Ministry-of-Petroleum-Resources-and-Gas-NPR.svg','Ministry of Petroleum Resources and Gas'], ['NCDC-North-Central-Development-Commission.jpg','North Central Development Commission'], ['NEXCO-Elevators.jpg','NEXCO Elevators'], ['NOA-National-Orientation-Agency.svg','National Orientation Agency'], ['PDP-Peoples-Democratic-Party.png','Peoples Democratic Party'], ['REA-Rural-Electrification-Agency.png','Rural Electrification Agency'], ['SLOT-Nigeria.webp','SLOT Nigeria'], ['SSANU-Senior-Staff-Association-of-Nigeria-Universities.png','SSANU'], ['WOTCLEF-Women-Trafficking-and-Child-Labour-Eradication-Foundation.png','WOTCLEF']
    ]; ?>
    <div class="brand-grid"><?php foreach ($brands as $brand) : $logo = gtvafrik_media_url($brand[0]); ?><div class="brand-tile"><?php if ($logo) : ?><img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($brand[1]); ?> logo" loading="lazy"><?php else : echo esc_html($brand[1]); endif; ?></div><?php endforeach; ?><div class="brand-tile brand-tile--text"><strong>TMG</strong><small>Tinubu Mega Group</small></div></div>
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

