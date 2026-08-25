<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Skip to content</a>
<header class="site-header" id="top">
  <div class="shell site-header__inner">
    <div class="brand">
      <?php if (has_custom_logo()) { the_custom_logo(); } else { ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="GTVAFRIK home">
        <span class="brand__word">GT<span>V</span>AFRIK</span>
        </a>
      <?php } ?>
      <span class="brand__suffix">/ MEDIA HOUSE</span>
    </div>
    <nav class="desktop-nav" aria-label="Primary navigation">
      <?php if (has_nav_menu('primary')) {
        wp_nav_menu(['theme_location'=>'primary','container'=>false,'menu_class'=>'desktop-nav__list','fallback_cb'=>false]);
      } else { ?>
        <ul class="desktop-nav__list">
          <li><a href="<?php echo esc_url(home_url('/#services')); ?>">Services</a></li>
          <li><a href="<?php echo esc_url(home_url('/#programming')); ?>">Programming</a></li>
          <li><a href="<?php echo esc_url(home_url('/#advocacy')); ?>">Advocacy</a></li>
          <li><a href="<?php echo esc_url(home_url('/#clients')); ?>">Clients</a></li>
          <li><a href="<?php echo esc_url(home_url('/#work')); ?>">Past Work</a></li>
          <li><a href="<?php echo esc_url(home_url('/#contact')); ?>">Contact</a></li>
        </ul>
      <?php } ?>
    </nav>
    <div class="site-header__actions">
      <a class="button button--ghost button--header desktop-only" href="<?php echo esc_url(home_url('/#contact')); ?>">Book a Call <span aria-hidden="true">↗</span></a>
      <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-menu" aria-label="Open menu"><span></span><span></span><span></span></button>
    </div>
  </div>
  <div class="mobile-menu" id="mobile-menu" hidden>
    <?php if (has_nav_menu('primary')) {
      wp_nav_menu(['theme_location'=>'primary','container'=>false,'menu_class'=>'mobile-menu__list','fallback_cb'=>false]);
    } else { ?>
      <a href="<?php echo esc_url(home_url('/#services')); ?>">Services</a>
      <a href="<?php echo esc_url(home_url('/#programming')); ?>">Programming</a>
      <a href="<?php echo esc_url(home_url('/#advocacy')); ?>">Advocacy</a>
      <a href="<?php echo esc_url(home_url('/#clients')); ?>">Clients</a>
      <a href="<?php echo esc_url(home_url('/#work')); ?>">Past Work</a>
      <a href="<?php echo esc_url(home_url('/#contact')); ?>">Contact</a>
    <?php } ?>
    <div class="mobile-menu__actions">
      <a class="button" href="<?php echo esc_url(home_url('/#contact')); ?>">Book a Call</a>
    </div>
  </div>
</header>

