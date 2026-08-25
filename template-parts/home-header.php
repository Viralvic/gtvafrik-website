<?php $header_logo = gtvafrik_media_url('GTVAFRIK-LOGO.png') ?: gtvafrik_media_url('GTVAFRIK LOGO.png'); ?>
<header class="site-header site-header--homepage" id="top">
  <div class="shell site-header__inner">
    <a class="home-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="GTVAFRIK home"><?php if ($header_logo) : ?><span class="home-brand__logo"><img src="<?php echo esc_url($header_logo); ?>" alt="GTVAFRIK"></span><?php else : ?><span class="home-brand__fallback">GT<span>V</span>AFRIK</span><?php endif; ?></a>
    <nav class="desktop-nav" aria-label="Homepage navigation"><ul class="desktop-nav__list">
      <li><a href="#services">Services</a></li><li><a href="#programming">Programming</a></li><li><a href="#advocacy">Advocacy</a></li><li><a href="#clients">Clients</a></li><li><a href="#work">Past Work</a></li><li><a href="#contact">Contact</a></li>
    </ul></nav>
    <div class="site-header__actions"><a class="button button--ghost button--header desktop-only" href="#contact">Book a Call <span aria-hidden="true">↗</span></a><button class="menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-menu" aria-label="Open menu"><span></span><span></span><span></span></button></div>
  </div>
  <div class="mobile-menu" id="mobile-menu" hidden><a href="#services">Services</a><a href="#programming">Programming</a><a href="#advocacy">Advocacy</a><a href="#clients">Clients</a><a href="#work">Past Work</a><a href="#contact">Contact</a><div class="mobile-menu__actions"><a class="button button--pill" href="#contact">Book a Call <span aria-hidden="true">↗</span></a></div></div>
</header>

