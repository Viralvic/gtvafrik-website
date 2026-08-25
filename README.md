# GTVAFRIK WordPress theme

A lightweight, responsive custom WordPress theme for the GTVAFRIK homepage and Newsroom. It has no Elementor, jQuery, framework, package-manager, or build-step dependency.

## Included

- Responsive homepage with modal video reels, service hover states, portfolio and editorial carousels, a six-column client wall, contact form, and dynamic Newsroom cards
- Newsroom/posts archive with featured-story treatment, search, and pagination
- Category and search-result archives
- Single-story template with reading time, sharing links, latest stories, and category-related stories
- WordPress custom-logo and navigation-menu support
- Accessible mobile navigation, skip link, focus behavior, responsive images, and reduced-motion handling

## Install

1. Place this folder in `wp-content/themes/gtvafrik`.
2. Activate **GTVAFRIK** under Appearance → Themes.
3. Set a static page as the homepage and a separate page as the posts page under Settings → Reading.
4. Upload the supplied GTVAFRIK logo under Appearance → Customize → Site Identity.
5. Assign a menu to the **Primary Menu** location if custom navigation is required. The theme includes a complete fallback menu.
6. Ensure posts have featured images, excerpts, and categories for the strongest editorial presentation.

## Content and assets

The contact-section WhatsApp CTA points to `+234 818 805 9300`. Homepage media is resolved from the WordPress Media Library by filename, so the uploaded hero reel, proof-of-work videos, carousel artwork, and client logos remain replaceable through WordPress.

The retained `index.html`, `styles.css`, and `script.js` files are the original static reference build; WordPress renders from the PHP templates and `assets/` files.

## Performance notes

Theme CSS and JavaScript are cache-busted from file modification times. JavaScript is dependency-free and loaded in the footer. No page-builder frontend runtime is required. Google Fonts are the only third-party frontend request; they can be self-hosted later if desired.

