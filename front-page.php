<?php get_header(); ?>
<?php
$hero_reel = gtvafrik_media_url('GTVAFRIK-Hero-Reel.mp4');
$proof_items = [
  ['01', 'Citizen Autopsy', 'DOCUMENTARY · PUBLIC INTEREST', 'youtube', 'https://www.youtube-nocookie.com/embed/dK0AzE0KYjI?autoplay=1', 'coral'],
  ['02', "Men's Table", 'ORIGINAL PROGRAMMING · CULTURE', 'video', gtvafrik_media_url('Mens-Table.mp4'), 'cyan'],
  ['03', 'The Rock Restaurant Zanzibar', 'TRAVEL · HOSPITALITY', 'video', gtvafrik_media_url('The-Rock-Zanzibar.mp4'), 'yellow'],
];
?>
<main id="main">
  <section class="hero shell">
    <div class="hero__copy">
      <p class="eyebrow">On air from Africa to everywhere</p>
      <h1><span>Africa's</span><span>story.</span><span class="tint">Uncut,</span><span class="accent">unstoppable.</span></h1>
      <p class="hero__lede">GTVAFRIK is the media, marketing and advocacy platform helping African businesses, artists and change-makers get seen worldwide.</p>
      <div class="hero__actions">
        <a class="button button--pill" href="#contact">Book a Call <span aria-hidden="true">↗</span></a>
        <button class="reel-trigger" type="button" data-modal="hero-reel-modal"><span class="play-icon" aria-hidden="true">▶</span><strong>Watch the reel</strong></button>
      </div>
    </div>
    <div class="hero__visual">
      <figure class="hero__frame"><?php if ($hero_reel) : ?><video autoplay muted loop playsinline preload="metadata" aria-label="GTVAFRIK production reel"><source src="<?php echo esc_url($hero_reel); ?>" type="video/mp4"></video><?php endif; ?><span class="hero__wash" aria-hidden="true"></span></figure>
      <div class="hero__visual-card" aria-hidden="true"><span>54</span><small>countries<br>in frame</small></div>
      <p class="hero__rotated" aria-hidden="true">The continent in motion</p>
    </div>
  </section>

  <section class="section shell" id="services">
    <div class="section-intro"><p class="eyebrow">/ What we do</p><div><h2>Not just a message.<br><span class="accent">A movement with momentum.</span></h2><p>We work where culture, media and impact meet, building the strategy, stories and platforms that carry ideas further.</p></div></div>
    <div class="service-list">
      <article class="service-card service-card--cyan"><span>01</span><div><h3>Make the signal impossible to miss.</h3><ul class="tag-list"><li>Brand strategy</li><li>Campaigns</li><li>Creative direction</li></ul></div><p>We turn sharp ideas into stories people stop for, across screens, cities and conversations.</p></article>
      <article class="service-card service-card--coral"><span>02</span><div><h3>Give culture a bigger stage.</h3><ul class="tag-list tag-list--coral"><li>Original shows</li><li>Talent partnerships</li><li>Live production</li></ul></div><p>From original formats to live moments, we build programming that puts African voices in the frame.</p></article>
      <article class="service-card service-card--yellow" id="advocacy"><span>03</span><div><h3>Move people from aware to active.</h3><ul class="tag-list tag-list--yellow"><li>Impact narratives</li><li>Public engagement</li><li>Movement design</li></ul></div><p>Advocacy with a pulse: human campaigns that make complex issues clear, urgent and actionable.</p></article>
    </div>
    <div class="carousel carousel--what" data-carousel><div class="carousel__track what-carousel">
      <?php for ($slide = 1; $slide <= 8; $slide++) : $slide_url = gtvafrik_media_url($slide . '.jpg'); if (!$slide_url) continue; ?><a href="https://www.instagram.com/p/DU74uHvCG9Y/" target="_blank" rel="noopener"><img src="<?php echo esc_url($slide_url); ?>" alt="What We Do carousel slide <?php echo esc_attr($slide); ?> of 8" loading="lazy"></a><?php endfor; ?>
    </div><div class="carousel__bar" aria-hidden="true"><span></span></div></div>
  </section>

  <section class="section programming" id="programming"><div class="shell programming__inner">
    <div><p class="eyebrow">/ Programming</p><h2>The loudest<br>room is the one<br>you build.</h2></div>
    <div class="programming__art" aria-hidden="true"><span class="programming__yellow"></span><strong>LIVE /<br>LOCAL /<br>LIMITLESS</strong><span class="programming__screen"></span><span class="programming__circle"></span></div>
  </div></section>

  <section class="section shell" id="work">
    <div class="section-heading"><div><p class="eyebrow">/ Proof of work</p><h2>Proof in the work.</h2></div><p>Selected work across storytelling, original programming and destination media.</p></div>
    <div class="proof-grid"><?php foreach ($proof_items as $item) : ?><button class="proof-card proof-card--<?php echo esc_attr($item[5]); ?>" type="button" data-proof-type="<?php echo esc_attr($item[3]); ?>" data-proof-src="<?php echo esc_url($item[4]); ?>" data-proof-title="<?php echo esc_attr($item[1]); ?>"><span class="proof-card__case">Case / <?php echo esc_html($item[0]); ?></span><span class="proof-card__shape" aria-hidden="true"></span><span class="proof-card__meta"><?php echo esc_html($item[2]); ?></span><strong><?php echo esc_html($item[1]); ?></strong><small>Watch the work <b aria-hidden="true">▶</b></small></button><?php endforeach; ?></div>
  </section>

  <section class="section shell" id="clients">
    <div class="brand-intro"><p class="eyebrow">/ Who we've built for</p><div><h2>Across sectors.<br><span class="accent">Across the continent.</span></h2><p>From boardrooms to newsrooms and stages, we've carried the signal for businesses, institutions and artists who needed the world to pay attention.</p><p class="brand-intro__link">Working with your brand? <a href="#contact">Let's talk.</a></p></div></div>
    <div class="brand-marquee" aria-label="Selected clients"><div><?php foreach (['INEC','AGRA','MO IBRAHIM FOUNDATION','WOTCLEF','AFRICAN ACHIEVERS AWARD','NCDC','SLOT','SSANU'] as $name) : ?><span><?php echo esc_html($name); ?> <b>/</b></span><?php endforeach; ?></div></div>
    <?php $brands = [
      ['AAA-African-Achievers-Award.png','African Achievers Award'], ['APC-All-Progressives-Congress.png','All Progressives Congress'], ['Colective-Initiative.png','Collective Initiative'], ['Dream-Spring-Microfinance.png','DreamSpring Microfinance'], ['GSP-Hybrid-Power-Solution.svg','GSP Hybrid Power Solution'], ['HyperCITY.jpg','HyperCITY'], ['IEA-International-Energy-Agency-France.webp','International Energy Agency'], ['INEC-Independent-National-Electoral-Commission.png','INEC'], ['Kids-Windows-School.png','Kids Windows School'], ['Ministry-of-Petroleum-Resources-and-Gas-NPR.svg','Ministry of Petroleum Resources and Gas'], ['NCDC-North-Central-Development-Commission.jpg','North Central Development Commission'], ['NEXCO-Elevators.jpg','NEXCO Elevators'], ['NOA-National-Orientation-Agency.svg','National Orientation Agency'], ['PDP-Peoples-Democratic-Party.png','Peoples Democratic Party'], ['REA-Rural-Electrification-Agency.png','Rural Electrification Agency'], ['SLOT-Nigeria.webp','SLOT Nigeria'], ['SSANU-Senior-Staff-Association-of-Nigeria-Universities.png','SSANU'], ['WOTCLEF-Women-Trafficking-and-Child-Labour-Eradication-Foundation.png','WOTCLEF']
    ]; ?><div class="brand-grid"><?php foreach ($brands as $brand) : $logo = gtvafrik_media_url($brand[0]); ?><div class="brand-tile"><?php if ($logo) : ?><img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($brand[1]); ?> logo" loading="lazy"><?php else : echo esc_html($brand[1]); endif; ?></div><?php endforeach; ?><div class="brand-tile brand-tile--text"><strong>TMG</strong><small>Tinubu Mega Group</small></div></div>
  </section>

  <section class="trust"><div class="shell trust__grid"><div><p class="eyebrow">/ Trust, with receipts</p><h2>Built to travel.<br>Trusted to land.</h2></div><div><p>The best work is generous: it makes room for more voices, gives partners a clear point of view and leaves people with something to do next.</p><ul><li>Media</li><li>Culture</li><li>Commerce</li><li>Impact</li><li>Diaspora</li></ul></div></div></section>

  <section class="section newsroom-preview shell" id="newsroom">
    <div class="section-heading"><div><p class="eyebrow">/ From the newsroom</p><h2>Stories, in progress.</h2></div><a class="text-link" href="<?php echo esc_url(gtvafrik_posts_page_url()); ?>">View all stories →</a></div>
    <?php $news = new WP_Query(['post_type'=>'post','posts_per_page'=>8,'post_status'=>'publish','ignore_sticky_posts'=>true]); if ($news->have_posts()) : ?><div class="carousel carousel--posts" data-carousel><div class="carousel__track post-carousel"><?php while ($news->have_posts()) : $news->the_post(); get_template_part('template-parts/post-card', null, ['variant'=>'standard']); endwhile; wp_reset_postdata(); ?></div><div class="carousel__controls"><button type="button" data-prev aria-label="Previous stories">‹</button><div class="carousel__dots" aria-hidden="true"><span class="is-active"></span><span></span><span></span></div><button type="button" data-next aria-label="Next stories">›</button></div></div><?php endif; ?>
  </section>

  <section class="section shell contact" id="contact"><div class="contact__grid">
    <div><p class="eyebrow">/ Start a conversation</p><h2>Let's put your<br>story <span class="accent">on air.</span></h2><p>Have a brief, a big question or just a spark? Send it through. We'll come back with a point of view.</p><a class="contact__email" href="mailto:hello@gtvafrik.com">hello@gtvafrik.com</a><br><a class="button button--ghost contact__whatsapp" href="https://wa.me/2348188059300" target="_blank" rel="noopener">WhatsApp</a></div>
    <form class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post"><input type="hidden" name="action" value="gtvafrik_contact"><?php wp_nonce_field('gtvafrik_contact','gtvafrik_nonce'); ?><p class="eyebrow">Booking desk</p><label>Your name<input name="name" required placeholder="Tell us what to call you"></label><label>Email address<input name="email" type="email" required placeholder="you@company.com"></label><label>Project type<select name="project"><option>Brand & Campaign</option><option>Programming & Production</option><option>Advocacy & Impact</option><option>Media Partnership</option><option>Other</option></select></label><label>A little about the brief<textarea name="message" required rows="4" placeholder="What are we making matter?"></textarea></label><button class="button button--pill" type="submit">Send the brief <span aria-hidden="true">↗</span></button></form>
  </div></section>
</main>
<dialog class="media-modal" id="hero-reel-modal"><button class="media-modal__close" type="button" aria-label="Close video">×</button><div class="media-modal__stage media-modal__stage--vertical"><?php if ($hero_reel) : ?><video controls playsinline preload="metadata"><source src="<?php echo esc_url($hero_reel); ?>" type="video/mp4"></video><?php endif; ?></div></dialog>
<dialog class="media-modal" id="proof-modal"><button class="media-modal__close" type="button" aria-label="Close video">×</button><h2></h2><div class="media-modal__stage"></div></dialog>
<?php get_footer(); ?>

