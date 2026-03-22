/* ============================================================
   BIKCRAFT — Modern Vanilla JavaScript
   No jQuery, no plugins — pure ES6+
   ============================================================ */

'use strict';

/* --- Header scroll effect --- */
(function initHeader() {
  const header = document.querySelector('.header');
  if (!header) return;

  const onScroll = () => {
    header.classList.toggle('is-scrolled', window.scrollY > 60);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
})();

/* --- Mobile menu toggle --- */
(function initMobileMenu() {
  const toggle = document.querySelector('.header__toggle');
  const nav = document.querySelector('.header__nav');
  if (!toggle || !nav) return;

  toggle.addEventListener('click', () => {
    const isOpen = toggle.classList.toggle('is-open');
    nav.classList.toggle('is-open', isOpen);
    document.body.style.overflow = isOpen ? 'hidden' : '';
    toggle.setAttribute('aria-expanded', String(isOpen));
  });

  // Close menu on link click
  nav.querySelectorAll('.header__nav-link').forEach(link => {
    link.addEventListener('click', () => {
      toggle.classList.remove('is-open');
      nav.classList.remove('is-open');
      document.body.style.overflow = '';
      toggle.setAttribute('aria-expanded', 'false');
    });
  });
})();

/* --- Reveal on scroll (Intersection Observer) --- */
(function initReveal() {
  const reveals = document.querySelectorAll('.reveal');
  if (!reveals.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.15,
    rootMargin: '0px 0px -50px 0px'
  });

  reveals.forEach(el => observer.observe(el));
})();

/* --- Testimonials slider --- */
(function initTestimonials() {
  const slider = document.querySelector('.testimonials__slider');
  if (!slider) return;

  const track = slider.querySelector('.testimonials__track');
  const dots = slider.querySelectorAll('.testimonials__dot');
  const items = track.querySelectorAll('.testimonial');
  if (!items.length) return;

  let current = 0;
  let autoplayTimer;

  function goTo(index) {
    current = ((index % items.length) + items.length) % items.length;
    track.style.transform = `translateX(-${current * 100}%)`;
    dots.forEach((dot, i) => dot.classList.toggle('is-active', i === current));
  }

  dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
      goTo(i);
      resetAutoplay();
    });
  });

  function resetAutoplay() {
    clearInterval(autoplayTimer);
    autoplayTimer = setInterval(() => goTo(current + 1), 5000);
  }

  goTo(0);
  resetAutoplay();
})();

/* --- Portfolio gallery slider --- */
(function initPortfolioGallery() {
  const slider = document.querySelector('.portfolio-gallery__slider');
  if (!slider) return;

  const track = slider.querySelector('.portfolio-gallery__track');
  const dots = slider.querySelectorAll('.portfolio-gallery__dot');
  const slides = track.querySelectorAll('.portfolio-gallery__slide');
  if (!slides.length) return;

  let current = 0;
  let autoplayTimer;

  function goTo(index) {
    current = ((index % slides.length) + slides.length) % slides.length;
    track.style.transform = `translateX(-${current * 100}%)`;
    dots.forEach((dot, i) => dot.classList.toggle('is-active', i === current));
  }

  dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
      goTo(i);
      clearInterval(autoplayTimer);
      autoplayTimer = setInterval(() => goTo(current + 1), 4000);
    });
  });

  goTo(0);
  autoplayTimer = setInterval(() => goTo(current + 1), 4000);
})();

/* --- Form handling (secure) --- */
(function initForms() {
  const forms = document.querySelectorAll('.form-secure');
  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();

      // Honeypot check
      const honeypot = form.querySelector('[name="leaveblank"]');
      const honeyCheck = form.querySelector('[name="dontchange"]');
      if (honeypot && honeypot.value.length > 0) {
        showMessage(form, 'error', 'Falha no envio!', 'Tente novamente mais tarde.');
        return;
      }
      if (honeyCheck && honeyCheck.value !== 'http://') {
        showMessage(form, 'error', 'Falha no envio!', 'Tente novamente mais tarde.');
        return;
      }

      // Basic client-side validation
      const nome = form.querySelector('[name="nome"]');
      const email = form.querySelector('[name="email"]');
      const telefone = form.querySelector('[name="telefone"]');
      const mensagem = form.querySelector('[name="mensagem"]');

      if (!nome || !nome.value.trim()) {
        nome && nome.focus();
        return;
      }
      if (!email || !isValidEmail(email.value)) {
        email && email.focus();
        return;
      }

      // Gather data safely
      const formData = new FormData(form);

      // Send via fetch
      const submitBtn = form.querySelector('[type="submit"]');
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Enviando...';
      }

      fetch(form.action, {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (response.ok) {
          showMessage(form, 'success', 'Mensagem enviada!', 'Em breve entraremos em contato com você.');
          form.reset();
        } else {
          throw new Error('Erro no servidor');
        }
      })
      .catch(() => {
        showMessage(form, 'error', 'Falha no envio!',
          'Você pode tentar novamente ou enviar direto para contato@bikcraft.com');
      })
      .finally(() => {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.textContent = 'Enviar';
        }
      });
    });
  });

  function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function showMessage(form, type, title, text) {
    // Find or create message element
    let msgEl = form.parentElement.querySelector('.form__message');
    if (!msgEl) {
      msgEl = document.createElement('div');
      msgEl.className = 'form__message';
      form.parentElement.appendChild(msgEl);
    }

    msgEl.className = `form__message form__message--${type} is-visible`;

    // Use textContent to prevent XSS
    msgEl.innerHTML = '';
    const span = document.createElement('span');
    span.textContent = title;
    const p = document.createElement('p');
    p.textContent = text;
    msgEl.appendChild(span);
    msgEl.appendChild(p);
  }
})();

/* --- Smooth scroll for anchor links --- */
(function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', function(e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
})();
