<?php
if (!defined('ABSPATH')) exit;
get_header();

$slug = get_post_field('post_name', get_queried_object_id());
$updated = '7 September 2026';
$legal_pages = [
  'disclaimer' => [
    'title' => 'Disclaimer',
    'intro' => 'Important information about how to understand and use content published by GTVAFRIK.',
    'sections' => [
      ['General information', '<p>Content on this website is provided for general information, news, education and promotional purposes. We aim to keep it useful and accurate, but we do not guarantee that every item is complete, current or suitable for a particular purpose.</p>'],
      ['No professional advice', '<p>Nothing on this website is legal, financial, medical, investment or other professional advice. You should obtain advice from a suitably qualified professional before acting on information that may affect you or your organisation.</p>'],
      ['Editorial content and opinions', '<p>Views expressed by contributors, interviewees or third parties are their own and do not necessarily represent GTVAFRIK. Sponsored, commissioned or partner content may be identified where appropriate. Editorial references do not amount to an endorsement.</p>'],
      ['External links and third-party media', '<p>Our pages may link to or embed services operated by third parties, including YouTube, Instagram and other social platforms. We do not control their availability, content, security or privacy practices. Visiting or using those services is subject to their own terms and policies.</p>'],
      ['Availability and liability', '<p>We work to keep the website available and secure, but access may occasionally be interrupted. To the fullest extent permitted by applicable law, GTVAFRIK will not be liable for indirect or consequential loss arising solely from reliance on this website. Nothing here excludes liability that cannot legally be excluded.</p>'],
      ['Copyright and corrections', '<p>Unless stated otherwise, website text, branding, graphics and original productions belong to GTVAFRIK or are used with permission. If you believe content is inaccurate or infringes your rights, email <a href="mailto:info@gtvafrik.com">info@gtvafrik.com</a> with the page URL and supporting details.</p>'],
    ],
  ],
  'cookies-policy' => [
    'title' => 'Cookies Policy',
    'intro' => 'This policy explains how cookies and similar technologies may be used when you visit gtvafrik.com.',
    'sections' => [
      ['What cookies are', '<p>Cookies are small files placed on your device by a website. Similar technologies, including local storage and embedded-service identifiers, can remember settings, help pages work and provide information about how a service is used.</p>'],
      ['Cookies we may use', '<ul><li><strong>Strictly necessary:</strong> security, network delivery, session management and core WordPress functions.</li><li><strong>Preferences:</strong> choices such as cookie settings or interface preferences.</li><li><strong>Analytics:</strong> aggregated information about visits, page performance and engagement, where enabled.</li><li><strong>Embedded media:</strong> YouTube, Instagram or other providers may set or read identifiers when their content loads or you interact with it.</li></ul>'],
      ['Consent and control', '<p>Where the law requires consent, optional cookies should be used only after you make a choice through an available cookie notice. You can also block or delete cookies in your browser. Blocking necessary cookies may cause parts of the website to stop working correctly.</p>'],
      ['Third-party services', '<p>Third-party platforms determine their own cookies and retention periods. Their handling of information is governed by their privacy policies. We recommend reviewing those policies before playing embedded media or following a social link.</p>'],
      ['Changes and questions', '<p>We may update this policy when our technology or legal obligations change. Questions about cookies can be sent to <a href="mailto:info@gtvafrik.com">info@gtvafrik.com</a>.</p>'],
    ],
  ],
  'privacy-policy' => [
    'title' => 'Privacy Policy',
    'intro' => 'This notice explains how GTVAFRIK handles personal information across our website and communications.',
    'sections' => [
      ['Who we are and scope', '<p>GTVAFRIK is a media, marketing and advocacy platform based in Abuja, Nigeria and serving audiences and clients across West Africa, Southern Africa and North Africa. This notice applies to gtvafrik.com, website enquiries, booking requests and related business communications.</p>'],
      ['Information we collect', '<ul><li>Contact details such as your name, email address and phone number.</li><li>Information you include in a brief, enquiry, application or other message.</li><li>Technical information such as IP address, browser, device, referring page and website activity.</li><li>Public social-media interactions and information supplied during a client or contributor relationship.</li></ul>'],
      ['Why and how we use it', '<p>We use personal information to respond to enquiries, arrange calls, prepare and deliver services, publish authorised content, operate and secure the website, understand performance, keep appropriate business records and meet legal obligations. Depending on the circumstances, our basis may be consent, steps connected to a contract, legal obligation or a legitimate business interest that does not override your rights.</p>'],
      ['Sharing and international transfers', '<p>We may share information with staff, professional advisers, hosting and technology providers, production partners or authorities where reasonably necessary and lawful. Because we operate regionally and use global technology services, information may be processed outside your country. We take reasonable steps to use appropriate contractual, organisational and security safeguards.</p>'],
      ['Retention and security', '<p>We retain information only for as long as reasonably needed for the purpose collected, contractual and accounting records, dispute management and legal requirements. We use reasonable technical and organisational safeguards, but no online system can be guaranteed completely secure.</p>'],
      ['Your choices and rights', '<p>Subject to applicable law, you may ask to access, correct or delete your personal information; object to or restrict certain processing; withdraw consent; or complain to the relevant regulator. This includes rights under Nigeria’s Data Protection Act 2023 and, where applicable, South Africa’s POPIA and Egypt’s Personal Data Protection Law.</p>'],
      ['Contact us', '<p>Send privacy requests to <a href="mailto:info@gtvafrik.com">info@gtvafrik.com</a> or write to GTVAFRIK, Suite 38 (3rd Floor), Birgi Plaza, 697 Idris Gidado Street, Wuye District, Abuja, Nigeria. We may need to verify your identity before completing a request.</p>'],
      ['Updates', '<p>We may revise this notice to reflect changes in our services, vendors or the law. The latest version and effective date will remain available on this page.</p>'],
    ],
  ],
  'terms-of-use' => [
    'title' => 'Terms of Use',
    'intro' => 'These terms govern your access to and use of the GTVAFRIK website.',
    'sections' => [
      ['Acceptance', '<p>By using this website, you agree to these Terms of Use and the policies linked from it. If you do not agree, please stop using the website. Separate written terms may apply to commissioned work, advertising, partnerships, events or other paid services.</p>'],
      ['Permitted use', '<p>You may browse and share links to publicly available pages for lawful, personal or legitimate business purposes. You must not interfere with website security, introduce harmful code, scrape the service at unreasonable scale, impersonate another person, misuse contact forms or use our content unlawfully.</p>'],
      ['Intellectual property', '<p>GTVAFRIK and its associated branding, page designs, text, graphics and original productions are owned by GTVAFRIK or used under licence. Except as permitted by law or with written permission, you may not reproduce, republish, sell, alter or commercially exploit them. Rights in third-party material remain with their owners.</p>'],
      ['User submissions', '<p>When you send a brief, comment, image or other material, you confirm that you have the right to do so and that it is lawful. Sending an enquiry does not transfer ownership of your material or create a client relationship. Project rights and licences will be governed by a separate agreement.</p>'],
      ['Third-party services', '<p>The website may include links or embeds from third parties. GTVAFRIK does not control those services and is not responsible for their terms, content or availability. You use them at your own discretion.</p>'],
      ['Disclaimers and liability', '<p>The website is provided on an “as available” basis. To the fullest extent permitted by law, we exclude implied warranties and will not be responsible for indirect or consequential loss caused solely by use of the website. Nothing in these terms limits rights or liability that applicable law does not allow us to limit.</p>'],
      ['Governing law and disputes', '<p>These website terms are governed by the laws of the Federal Republic of Nigeria. Courts of competent jurisdiction in Nigeria will have jurisdiction, without preventing mandatory consumer or data-protection rights that may apply to visitors in South Africa, Egypt or another country.</p>'],
      ['Changes and contact', '<p>We may update these terms and will publish the revised effective date here. Questions or permission requests should be sent to <a href="mailto:info@gtvafrik.com">info@gtvafrik.com</a>.</p>'],
    ],
  ],
];

if ('book-a-call' === $slug) : ?>
  <main id="main" class="action-page">
    <div class="shell action-page__grid">
      <div class="action-page__copy"><p class="eyebrow">/ Booking desk</p><h1>Let’s make the<br><span class="accent">next move.</span></h1><p>Tell us what you’re building, where you need momentum and when you would like to talk. Our team will respond to arrange a suitable time.</p><ul class="action-page__details"><li><strong>Email</strong><a href="mailto:info@gtvafrik.com">info@gtvafrik.com</a></li><li><strong>Phone</strong><a href="tel:+2348188059300">+234 818 805 9300</a></li></ul></div>
      <?php gtvafrik_contact_form('Book a Call'); ?>
    </div>
  </main>
<?php elseif ('contact-us' === $slug) : ?>
  <main id="main" class="action-page">
    <div class="shell action-page__grid">
      <div class="action-page__copy"><p class="eyebrow">/ Contact us</p><h1>Start a<br><span class="accent">conversation.</span></h1><p>For campaigns, production, partnerships, newsroom enquiries or general questions, reach us directly or send the form.</p><ul class="action-page__details"><li><strong>Email</strong><a href="mailto:info@gtvafrik.com">info@gtvafrik.com</a></li><li><strong>Call / WhatsApp</strong><a href="tel:+2348188059300">+234 818 805 9300</a></li><li><strong>Office</strong><address>Suite 38 (3rd Floor), Birgi Plaza,<br>697 Idris Gidado Street, Wuye District,<br>Abuja, Nigeria</address></li></ul><a class="button button--ghost button--pill" href="https://wa.me/2348188059300" target="_blank" rel="noopener">Open WhatsApp <span aria-hidden="true">↗</span></a></div>
      <?php gtvafrik_contact_form('Contact GTVAFRIK'); ?>
    </div>
  </main>
<?php elseif (isset($legal_pages[$slug])) :
  $page = $legal_pages[$slug]; ?>
  <main id="main" class="legal-page">
    <div class="shell legal-page__layout">
      <aside class="legal-page__aside">
        <p class="eyebrow">/ Legal</p>
        <h1><?php echo esc_html($page['title']); ?></h1>
        <p class="legal-page__updated">Effective <?php echo esc_html($updated); ?></p>
      </aside>
      <article class="legal-page__content">
        <p class="legal-page__intro"><?php echo esc_html($page['intro']); ?></p>
        <?php foreach ($page['sections'] as $section) : ?>
          <section><h2><?php echo esc_html($section[0]); ?></h2><?php echo wp_kses_post($section[1]); ?></section>
        <?php endforeach; ?>
      </article>
    </div>
  </main>
<?php else : ?>
  <main id="main" class="section shell">
    <?php while (have_posts()) : the_post(); ?>
      <article><p class="eyebrow">/ <?php echo esc_html(get_post_type()); ?></p><h1><?php the_title(); ?></h1><div class="article-content"><?php the_content(); ?></div></article>
    <?php endwhile; ?>
  </main>
<?php endif;
get_footer();
