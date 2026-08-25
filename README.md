# GTVAFRIK — homepage

Static build. No framework, no build step. Open `index.html` in a browser and it runs.

```
index.html
styles.css
script.js
assets/
  gtvafrik-editorial.jpg   ← placeholder, swap this out
```

## What changed from the Replit export

- Compiled Tailwind (~124KB inlined) replaced with hand-written CSS on custom properties
- All Vite dev-server, hot-reload and Replit editor scripts removed
- Every `data-replit-metadata` and `data-component-name` attribute stripped
- Absolute `replit.dev` links rewritten to local hashes (`#services`, `#work`, `#contact`)
- The **Advocacy** nav link previously pointed at `#advocacy`, which did not exist. It now targets the third services row.
- Lucide SVG icons replaced with CSS-drawn arrows, chevrons and the play glyph, so there is no icon library to load
- Client ticker duplicated in JS instead of by hand in markup
- Added: skip link, keyboard focus rings, `prefers-reduced-motion` handling, working mobile menu, form validation

## Before this goes live

**1. The hero image.** `assets/gtvafrik-editorial.jpg` is a generated placeholder. Drop your real photo in at the same path, or change the `src` in `index.html`. Portrait crop, roughly 800×1000 or larger.

**2. The client logos and case studies.** The grid currently names MTN, Dangote, Safaricom, PwC Africa, Absa, Equity Bank, the African Union Commission, the Mo Ibrahim Foundation and others. The case studies came from the mockup as illustrative examples. Replace both with real clients and real work, or remove the sections. Naming organisations as clients when they are not is a legal exposure, not a placeholder.

**3. The form.** `script.js` fakes a success response. Point it at a real endpoint before launch.

## Colour reference

| Token | Hex | Used for |
|---|---|---|
| `--navy-900` | `#071936` | page base |
| `--cyan` | `#12d9ed` | primary accent, links, CTAs |
| `--yellow` | `#f2d248` | partners band, hero stat |
| `--coral` | `#ff5e48` | service tags, case chip |
| `--violet` | `#a594e8` | case chip |
| `--cream` | `#f3f0e9` | body text |

Type: Space Grotesk (display), Plus Jakarta Sans (body), DM Mono (labels and metadata).
