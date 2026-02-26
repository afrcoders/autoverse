/* Blessed CJ Automobile — site interactions */

/* --- Theme Toggle --- */
(function () {
    const toggle = document.querySelector('[data-theme-toggle]');
    const meta = document.getElementById('meta-theme-color');

    function applyTheme(theme) {
        if (theme === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
            if (meta) meta.content = '#0b0f19';
        } else {
            document.documentElement.removeAttribute('data-theme');
            if (meta) meta.content = '#f4f1ec';
        }
    }

    // Apply saved preference (inline script already handles initial paint,
    // but this keeps things in sync for SPA-style navigations)
    const saved = localStorage.getItem('theme');
    if (saved) applyTheme(saved);

    if (toggle) {
        toggle.addEventListener('click', () => {
            const isDark = document.documentElement.hasAttribute('data-theme');
            const next = isDark ? 'light' : 'dark';
            localStorage.setItem('theme', next);
            applyTheme(next);
        });
    }
})();

/* --- PWA Service Worker --- */
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js').catch(() => {});
    });
}

/* --- Mobile Nav Toggle --- */
const navToggle = document.querySelector('[data-nav-toggle]');
const mainNav = document.querySelector('[data-main-nav]');

if (navToggle && mainNav) {
    navToggle.addEventListener('click', () => {
        const isOpen = mainNav.classList.toggle('open');
        navToggle.textContent = isOpen ? '✕' : '☰';
        navToggle.setAttribute('aria-expanded', isOpen);
    });

    // Close on link click (mobile)
    mainNav.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mainNav.classList.remove('open');
            navToggle.textContent = '☰';
        });
    });
}

/* --- Hero Slider --- */
const slider = document.querySelector('[data-slider]');

if (slider) {
    const track = slider.querySelector('[data-slider-track]');
    const slides = Array.from(slider.querySelectorAll('[data-slide]'));
    const prevButton = slider.querySelector('[data-slider-prev]');
    const nextButton = slider.querySelector('[data-slider-next]');
    const dotsWrap = slider.querySelector('[data-slider-dots]');

    let index = 0;
    let intervalId;

    const setSlide = (newIndex) => {
        index = (newIndex + slides.length) % slides.length;
        track.style.transform = `translateX(-${index * 100}%)`;

        Array.from(dotsWrap.querySelectorAll('.slider-dot')).forEach((dot, dotIndex) => {
            dot.classList.toggle('active', dotIndex === index);
        });
    };

    const startAutoPlay = () => {
        intervalId = window.setInterval(() => setSlide(index + 1), 5500);
    };

    const stopAutoPlay = () => {
        if (intervalId) {
            window.clearInterval(intervalId);
        }
    };

    slides.forEach((_, dotIndex) => {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'slider-dot';
        dot.setAttribute('aria-label', `Go to slide ${dotIndex + 1}`);
        dot.addEventListener('click', () => {
            stopAutoPlay();
            setSlide(dotIndex);
            startAutoPlay();
        });
        dotsWrap.appendChild(dot);
    });

    prevButton?.addEventListener('click', () => {
        stopAutoPlay();
        setSlide(index - 1);
        startAutoPlay();
    });

    nextButton?.addEventListener('click', () => {
        stopAutoPlay();
        setSlide(index + 1);
        startAutoPlay();
    });

    slider.addEventListener('mouseenter', stopAutoPlay);
    slider.addEventListener('mouseleave', startAutoPlay);

    setSlide(0);
    startAutoPlay();
}

/* --- WhatsApp Contact Form --- */
const waForm = document.querySelector('[data-wa-form]');

if (waForm) {
    waForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const fd = new FormData(waForm);
        const name = (fd.get('name') || '').toString().trim();
        const phone = (fd.get('phone') || '').toString().trim();
        const car = (fd.get('car') || '').toString().trim();
        const part = (fd.get('part') || '').toString().trim();
        const details = (fd.get('details') || '').toString().trim();

        const lines = ['Hello Blessed CJ Automobile!'];
        if (name) lines.push(`*Name:* ${name}`);
        if (phone) lines.push(`*Phone:* ${phone}`);
        if (car) lines.push(`*Car:* ${car}`);
        if (part) lines.push(`*Part Needed:* ${part}`);
        if (details) lines.push(`*Details:* ${details}`);

        const message = encodeURIComponent(lines.join('\n'));
        window.open(`https://wa.me/2348160101258?text=${message}`, '_blank');
    });
}
