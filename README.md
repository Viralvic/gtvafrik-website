# GTVAFRIK WordPress theme

A lightweight, responsive custom WordPress theme for the GTVAFRIK homepage and Newsroom. It has no Elementor, jQuery, framework, package-manager, or build-step dependency.

## Included

- Responsive homepage with approved services, proof-of-work links, brand list, WhatsApp CTA, and dynamic Newsroom cards
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

The WhatsApp CTA points to `+234 818 805 9300`. The homepage portfolio links and brand names reflect the approved feedback supplied for this project. The bundled editorial image is used as the homepage hero visual until a final production still or showreel poster is supplied.

The retained `index.html`, `styles.css`, and `script.js` files are the original static reference build; WordPress renders from the PHP templates and `assets/` files.

## Performance notes

Theme CSS and JavaScript are cache-busted from file modification times. JavaScript is dependency-free and loaded in the footer. No page-builder frontend runtime is required. Google Fonts are the only third-party frontend request; they can be self-hosted later if desired.
