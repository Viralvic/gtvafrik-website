/* =========================================================
   GTVAFRIK — script.js
   Vanilla JS. No jQuery, no dependencies.
   ========================================================= */

(function () {
  'use strict';

  /* ---------- Mobile menu ---------- */
  var toggle = document.getElementById('navToggle');
  var menu = document.getElementById('mobileMenu');

  function closeMenu() {
    if (!toggle || !menu) return;
    menu.hidden = true;
    toggle.setAttribute('aria-expanded', 'false');
    toggle.setAttribute('aria-label', 'Open menu');
  }

  if (toggle && menu) {
    toggle.addEventListener('click', function () {
      var open = toggle.getAttribute('aria-expanded') === 'true';
      menu.hidden = open;
      toggle.setAttribute('aria-expanded', String(!open));
      toggle.setAttribute('aria-label', open ? 'Open menu' : 'Close menu');
    });

    // Close after tapping a link, and on Escape
    menu.addEventListener('click', function (e) {
      if (e.target.closest('a')) closeMenu();
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeMenu();
    });

    // Close if the viewport grows past the desktop breakpoint
    window.matchMedia('(min-width: 1024px)').addEventListener('change', function (e) {
      if (e.matches) closeMenu();
    });
  }

  /* ---------- Sticky nav hairline ---------- */
  var nav = document.querySelector('.nav');
  if (nav) {
    var onScroll = function () {
      nav.classList.toggle('is-stuck', window.scrollY > 8);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* ---------- Seamless client ticker ----------
     The CSS animation shifts the track by -50%, so the list has to be
     duplicated exactly once. Cloning here keeps the HTML free of the
     repeated markup. */
  var track = document.getElementById('tickerTrack');
  if (track && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    var items = Array.prototype.slice.call(track.children);
    items.forEach(function (item) {
      track.appendChild(item.cloneNode(true));
    });
  }

  /* ---------- Booking form ----------
     Front-end only. Point `action` at your own handler (WordPress admin-ajax,
     a form service, or a serverless endpoint) and remove the fake success. */
  var form = document.getElementById('bookingForm');
  var status = document.getElementById('bookingStatus');

  if (form && status) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      if (!form.checkValidity()) {
        status.textContent = 'Fill in your name, email and a short brief.';
        status.classList.add('is-error');
        form.reportValidity();
        return;
      }

      status.classList.remove('is-error');
      status.textContent = 'Sending…';

      // Replace this block with a real fetch() to your endpoint.
      window.setTimeout(function () {
        status.textContent = 'Brief received. We will come back with a point of view.';
        form.reset();
      }, 600);
    });
  }
  /* ---------- Blog rail ---------- */
  var rail = document.getElementById('blogTrack');
  var dots = document.getElementById('blogDots');
  var prev = document.getElementById('blogPrev');
  var next = document.getElementById('blogNext');

  if (rail && dots && prev && next) {
    var pages = function () {
      return Math.max(1, Math.ceil(rail.scrollWidth / rail.clientWidth));
    };

    var buildDots = function () {
      dots.innerHTML = '';
      var total = pages();
      for (var i = 0; i < total; i++) {
        var b = document.createElement('button');
        b.type = 'button';
        b.setAttribute('role', 'tab');
        b.setAttribute('aria-label', 'Page ' + (i + 1));
        b.dataset.page = i;
        b.addEventListener('click', function (e) {
          rail.scrollTo({ left: rail.clientWidth * Number(e.currentTarget.dataset.page) });
        });
        dots.appendChild(b);
      }
      sync();
    };

    var sync = function () {
      var page = Math.round(rail.scrollLeft / rail.clientWidth);
      Array.prototype.forEach.call(dots.children, function (d, i) {
        d.setAttribute('aria-selected', String(i === page));
      });
      prev.disabled = rail.scrollLeft < 8;
      next.disabled = rail.scrollLeft + rail.clientWidth >= rail.scrollWidth - 8;
    };

    prev.addEventListener('click', function () {
      rail.scrollBy({ left: -rail.clientWidth });
    });
    next.addEventListener('click', function () {
      rail.scrollBy({ left: rail.clientWidth });
    });

    rail.addEventListener('scroll', sync, { passive: true });
    window.addEventListener('resize', buildDots);
    buildDots();
  }
  /* ---------- Footer year ---------- */
  var year = document.getElementById('year');
  if (year) year.textContent = new Date().getFullYear();
}());
