/**
 * Sakbaddy Theme Main JavaScript
 * Handles navigation, mobile menu, testimonials slider, portfolio filtering & modal,
 * animated skills, contact form validation & AJAX submission, and GA4 event tracking.
 */

document.addEventListener('DOMContentLoaded', () => {
    initNavbar();
    initScrollSpy();
    initTestimonialsSlider();
    initPortfolio();
    initSkillsObserver();
    initContactForm();
    initAnalyticsEvents();
});

/* ==========================================================================
   1. NAVBAR & MOBILE DRAWER
   ========================================================================== */
function initNavbar() {
    const nav = document.querySelector('.vnavbar');
    const toggle = document.querySelector('.nav-toggle');
    if (!nav || !toggle) return;

    const closeNav = () => {
        nav.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Open navigation');
    };

    toggle.addEventListener('click', () => {
        const isOpen = nav.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', String(isOpen));
        toggle.setAttribute('aria-label', isOpen ? 'Close navigation' : 'Open navigation');
    });

    nav.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', closeNav);
    });

    document.addEventListener('keydown', event => {
        if (event.key === 'Escape' && nav.classList.contains('is-open')) {
            closeNav();
        }
    });

    const mql = window.matchMedia('(min-width: 641px)');
    mql.addEventListener('change', event => {
        if (event.matches) closeNav();
    });
}

/* ==========================================================================
   2. SCROLLSPY & SMOOTH SCROLL
   ========================================================================== */
function initScrollSpy() {
    const navLinks = document.querySelectorAll('.vnavbar .nav-links a');
    if (!navLinks.length) return;

    const sectionIds = ['home', 'about', 'resume', 'portfolio', 'testimonials', 'contact'];
    const sections = sectionIds
        .map(id => document.getElementById(id))
        .filter(el => el !== null);

    if (!sections.length) return;

    function onScroll() {
        const scrollPos = window.scrollY + 180;

        let currentSectionId = '';
        for (let i = sections.length - 1; i >= 0; i--) {
            const section = sections[i];
            if (section.offsetTop <= scrollPos) {
                currentSectionId = section.id;
                break;
            }
        }

        if (!currentSectionId && sections.length) {
            currentSectionId = sections[0].id;
        }

        navLinks.forEach(link => {
            const href = link.getAttribute('href') || '';
            const isMatch = href === '#' + currentSectionId || href.endsWith('#' + currentSectionId);

            if (isMatch) {
                link.classList.add('active');
                link.setAttribute('aria-current', 'page');
            } else if (href.startsWith('#')) {
                link.classList.remove('active');
                link.removeAttribute('aria-current');
            }
        });
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}

/* ==========================================================================
   3. TESTIMONIALS SLIDER
   ========================================================================== */
function initTestimonialsSlider() {
    const track = document.getElementById('testimonialsTrack');
    const dots = document.getElementById('testimonialsDots');
    if (!track || !dots) return;

    const cards = Array.from(track.querySelectorAll('.testimonial-card'));
    if (!cards.length) return;

    let activeIndex = 0;

    function updateSlider() {
        const isMobileOrTablet = window.matchMedia('(max-width: 980px)').matches;
        const visibleCards = isMobileOrTablet ? 1 : 2;
        const maxIndex = Math.max(0, cards.length - visibleCards);

        activeIndex = Math.min(activeIndex, maxIndex);

        if (cards[activeIndex]) {
            track.style.transform = `translateX(-${cards[activeIndex].offsetLeft}px)`;
        }

        const totalDots = maxIndex + 1;
        if (dots.children.length !== totalDots) {
            dots.replaceChildren(...Array.from({ length: totalDots }, (_, index) => {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.className = 'slider-dot';
                dot.setAttribute('aria-label', `Show testimonial ${index + 1}`);
                dot.addEventListener('click', () => {
                    activeIndex = index;
                    updateSlider();
                });
                return dot;
            }));
        }

        Array.from(dots.children).forEach((dot, index) => {
            const isActive = index === activeIndex;
            dot.classList.toggle('active', isActive);
            dot.setAttribute('aria-pressed', String(isActive));
        });
    }

    // Touch Swipe Support
    let touchStartX = 0;
    let touchEndX = 0;

    track.addEventListener('touchstart', e => {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    track.addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, { passive: true });

    function handleSwipe() {
        const swipeDistance = touchStartX - touchEndX;
        const isMobileOrTablet = window.matchMedia('(max-width: 980px)').matches;
        const visibleCards = isMobileOrTablet ? 1 : 2;
        const maxIndex = Math.max(0, cards.length - visibleCards);

        if (swipeDistance > 40 && activeIndex < maxIndex) {
            activeIndex++;
            updateSlider();
        } else if (swipeDistance < -40 && activeIndex > 0) {
            activeIndex--;
            updateSlider();
        }
    }

    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(updateSlider, 100);
    });

    updateSlider();
}

/* ==========================================================================
   4. PORTFOLIO FILTER & LIGHTBOX MODAL
   ========================================================================== */
function initPortfolio() {
    const filterNav = document.querySelector('.portfolio-filter-nav');
    const cards = Array.from(document.querySelectorAll('.portfolio-card'));
    const modal = document.getElementById('portfolioModal');

    // 1. Filtering
    if (filterNav && cards.length) {
        const filterBtns = Array.from(filterNav.querySelectorAll('.filter-btn'));

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const targetFilter = btn.getAttribute('data-filter') || 'all';

                filterBtns.forEach(b => {
                    b.classList.remove('active');
                    b.setAttribute('aria-selected', 'false');
                });
                btn.classList.add('active');
                btn.setAttribute('aria-selected', 'true');

                cards.forEach(card => {
                    const cardCategories = (card.getAttribute('data-category') || '').toLowerCase().split(/\s+/);
                    if (targetFilter === 'all' || cardCategories.includes(targetFilter.toLowerCase())) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 20);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(10px)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 250);
                    }
                });
            });
        });
    }

    // 2. Modal Lightbox
    if (cards.length) {
        let activeModal = modal;

        // Auto-create modal if not present in DOM
        if (!activeModal) {
            activeModal = document.createElement('div');
            activeModal.id = 'portfolioModal';
            activeModal.className = 'portfolio-modal';
            activeModal.setAttribute('role', 'dialog');
            activeModal.setAttribute('aria-modal', 'true');
            activeModal.setAttribute('aria-label', 'Project Details');
            activeModal.innerHTML = `
                <div class="modal-backdrop"></div>
                <div class="modal-content">
                    <button type="button" class="modal-close" aria-label="Close modal">&times;</button>
                    <div class="modal-image-wrapper">
                        <img class="modal-image" src="" alt="" />
                    </div>
                    <div class="modal-meta">
                        <span class="modal-cat"></span>
                        <h3 class="modal-title"></h3>
                        <div class="modal-links" style="margin-top:14px; display:flex; gap:12px; justify-content:center;"></div>
                    </div>
                </div>
            `;
            document.body.appendChild(activeModal);
        }

        const modalImg = activeModal.querySelector('.modal-image');
        const modalCat = activeModal.querySelector('.modal-cat');
        const modalTitle = activeModal.querySelector('.modal-title');
        const modalLinks = activeModal.querySelector('.modal-links');
        const modalClose = activeModal.querySelector('.modal-close');
        const modalBackdrop = activeModal.querySelector('.modal-backdrop');

        function openModal(card) {
            const img = card.querySelector('img');
            const title = card.querySelector('.portfolio-title');
            const cat = card.querySelector('.portfolio-cat');
            const projectUrl = card.getAttribute('data-url');
            const githubUrl = card.getAttribute('data-github');

            if (modalImg && img) {
                modalImg.src = img.currentSrc || img.src;
                modalImg.alt = img.alt || 'Project Preview';
            }
            if (modalTitle && title) {
                modalTitle.textContent = title.textContent.trim();
            }
            if (modalCat && cat) {
                modalCat.textContent = cat.textContent.trim();
            }

            if (modalLinks) {
                modalLinks.innerHTML = '';
                if (projectUrl && projectUrl !== '#' && projectUrl !== '') {
                    const linkA = document.createElement('a');
                    linkA.href = projectUrl;
                    linkA.target = '_blank';
                    linkA.rel = 'noopener noreferrer';
                    linkA.className = 'btn-view-project';
                    linkA.textContent = 'View Live Project';
                    modalLinks.appendChild(linkA);
                }
                if (githubUrl && githubUrl !== '#' && githubUrl !== '') {
                    const gitA = document.createElement('a');
                    gitA.href = githubUrl;
                    gitA.target = '_blank';
                    gitA.rel = 'noopener noreferrer';
                    gitA.className = 'btn-github';
                    gitA.textContent = 'GitHub Repo';
                    modalLinks.appendChild(gitA);
                }
            }

            activeModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            activeModal.classList.remove('active');
            document.body.style.overflow = '';
        }

        cards.forEach(card => {
            card.addEventListener('click', () => openModal(card));
            card.addEventListener('keydown', e => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    openModal(card);
                }
            });
        });

        if (modalClose) modalClose.addEventListener('click', closeModal);
        if (modalBackdrop) modalBackdrop.addEventListener('click', closeModal);

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape' && activeModal.classList.contains('active')) {
                closeModal();
            }
        });
    }
}

/* ==========================================================================
   5. SKILLS PROGRESS ANIMATION
   ========================================================================== */
function initSkillsObserver() {
    const skillBars = document.querySelectorAll('.skill-bar');
    if (!skillBars.length) return;

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const bar = entry.target;
                    const percent = bar.getAttribute('data-percent') || bar.style.width || '0%';
                    bar.style.width = percent;
                    obs.unobserve(bar);
                }
            });
        }, { threshold: 0.2 });

        skillBars.forEach(bar => {
            const originalWidth = bar.style.width || '0%';
            bar.setAttribute('data-percent', originalWidth);
            bar.style.width = '0%';
            observer.observe(bar);
        });
    }
}

/* ==========================================================================
   6. CONTACT FORM AJAX & VALIDATION
   ========================================================================== */
function initContactForm() {
    const form = document.querySelector('.contact-form');
    if (!form) return;

    // Insert or locate feedback message element
    let feedback = form.querySelector('.form-feedback');
    if (!feedback) {
        feedback = document.createElement('div');
        feedback.className = 'form-feedback';
        feedback.setAttribute('role', 'alert');
        feedback.setAttribute('aria-live', 'polite');
        form.insertBefore(feedback, form.firstChild);
    }

    const nameInput = form.querySelector('#full-name, input[name="name"]');
    const emailInput = form.querySelector('#email, input[name="email"]');
    const subjectInput = form.querySelector('#subject, input[name="subject"]');
    const messageInput = form.querySelector('#message, textarea[name="message"]');
    const submitBtn = form.querySelector('button[type="submit"]');

    function showFeedback(msg, type = 'error') {
        feedback.textContent = msg;
        feedback.className = `form-feedback ${type}`;
        feedback.style.display = 'block';
    }

    function hideFeedback() {
        feedback.textContent = '';
        feedback.className = 'form-feedback';
        feedback.style.display = 'none';
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    form.addEventListener('submit', async event => {
        event.preventDefault();
        hideFeedback();

        const nameVal = nameInput ? nameInput.value.trim() : '';
        const emailVal = emailInput ? emailInput.value.trim() : '';
        const subjectVal = subjectInput ? subjectInput.value.trim() : '';
        const messageVal = messageInput ? messageInput.value.trim() : '';

        // Validation
        if (!nameVal) {
            showFeedback('Please enter your full name.', 'error');
            nameInput && nameInput.focus();
            return;
        }

        if (!emailVal || !isValidEmail(emailVal)) {
            showFeedback('Please enter a valid email address.', 'error');
            emailInput && emailInput.focus();
            return;
        }

        if (!subjectVal) {
            showFeedback('Please enter a subject.', 'error');
            subjectInput && subjectInput.focus();
            return;
        }

        if (!messageVal) {
            showFeedback('Please enter your message.', 'error');
            messageInput && messageInput.focus();
            return;
        }

        // Loading state
        const originalBtnText = submitBtn ? submitBtn.textContent : 'Send Message';
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';
        }

        const dataConfig = window.sakbaddy_data || {};
        const formMode = dataConfig.form_mode || 'ajax';
        const formspreeUrl = dataConfig.formspree_url || '';

        try {
            if (formMode === 'formspree' && formspreeUrl) {
                // Formspree API submission
                const response = await fetch(formspreeUrl, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: nameVal,
                        email: emailVal,
                        subject: subjectVal,
                        message: messageVal
                    })
                });

                if (response.ok) {
                    showFeedback('Thank you! Your message has been sent successfully.', 'success');
                    form.reset();
                    triggerAnalyticsLead();
                } else {
                    const resJson = await response.json();
                    const errMsg = resJson.errors ? resJson.errors.map(e => e.message).join(', ') : 'Failed to send message. Please try again.';
                    showFeedback(errMsg, 'error');
                }
            } else {
                // WordPress Native AJAX submission
                const formData = new FormData();
                formData.append('action', 'sakbaddy_contact_form');
                formData.append('nonce', dataConfig.nonce || '');
                formData.append('name', nameVal);
                formData.append('email', emailVal);
                formData.append('subject', subjectVal);
                formData.append('message', messageVal);

                const ajaxUrl = dataConfig.ajax_url || '/wp-admin/admin-ajax.php';
                const response = await fetch(ajaxUrl, {
                    method: 'POST',
                    body: formData
                });

                const resJson = await response.json();

                if (resJson.success) {
                    showFeedback(resJson.data && resJson.data.message ? resJson.data.message : 'Thank you! Your message has been sent successfully.', 'success');
                    form.reset();
                    triggerAnalyticsLead();
                } else {
                    const errMsg = resJson.data && resJson.data.message ? resJson.data.message : 'Oops! An error occurred. Please try again later.';
                    showFeedback(errMsg, 'error');
                }
            }
        } catch (err) {
            console.error('Contact Form Error:', err);
            showFeedback('An unexpected network error occurred. Please check your connection and try again.', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = originalBtnText;
            }
        }
    });
}

/* ==========================================================================
   7. GOOGLE ANALYTICS 4 EVENTS
   ========================================================================== */
function triggerAnalyticsLead() {
    if (typeof window.gtag === 'function') {
        window.gtag('event', 'generate_lead', {
            event_category: 'Contact',
            event_label: 'Contact Form Submission'
        });
    }
}

function initAnalyticsEvents() {
    if (typeof window.gtag !== 'function') return;

    // Track CTA button clicks
    document.querySelectorAll('.hero .btn, .site-header .btn-primary, .btn-view-project').forEach(btn => {
        btn.addEventListener('click', () => {
            const text = (btn.textContent || btn.value || '').trim();
            window.gtag('event', 'cta_click', {
                event_category: 'Engagement',
                event_label: text
            });
        });
    });
}
