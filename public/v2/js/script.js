
const menuToggle = document.getElementById('menuToggle');
const mobileNav = document.getElementById('mobileNav');

if (menuToggle && mobileNav) {
    menuToggle.addEventListener('click', () => {
        mobileNav.classList.toggle('open');
    });
}

document.querySelectorAll('.language-switch').forEach((switcher) => {
    const toggle = switcher.querySelector('[data-language-switch-toggle]');
    const menu = switcher.querySelector('[data-language-switch-menu]');
    const options = switcher.querySelectorAll('.language-switch-option');

    if (!toggle || !menu) {
        return;
    }

    const close = () => {
        switcher.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        menu.hidden = true;
    };

    const open = () => {
        switcher.classList.add('open');
        toggle.setAttribute('aria-expanded', 'true');
        menu.hidden = false;
    };

    toggle.addEventListener('click', (event) => {
        event.stopPropagation();
        menu.hidden ? open() : close();
    });

    options.forEach((option) => {
        option.addEventListener('click', () => {
            close();
            window.location.assign(option.dataset.url || window.location.href);
        });
    });

    document.addEventListener('click', (event) => {
        if (!switcher.contains(event.target)) {
            close();
        }
    });

    switcher.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            close();
            toggle.focus();
        }
    });
});

document.querySelectorAll('.standings-select').forEach((select) => {
    const toggle = select.querySelector('[data-standings-select-toggle]');
    const menu = select.querySelector('[data-standings-select-menu]');
    const options = select.querySelectorAll('[data-standings-select-option]');
    const form = select.closest('form');

    if (!toggle || !menu || !form) {
        return;
    }

    const close = () => {
        select.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        menu.hidden = true;
    };

    const open = () => {
        select.classList.add('open');
        toggle.setAttribute('aria-expanded', 'true');
        menu.hidden = false;
    };

    toggle.addEventListener('click', (event) => {
        event.stopPropagation();
        menu.hidden ? open() : close();
    });

    options.forEach((option) => {
        option.addEventListener('click', () => {
            const target = option.dataset.target;

            if (target && form.elements[target]) {
                form.elements[target].value = option.dataset.value || '';
            }

            if (option.dataset.resetLeague === 'true' && form.elements.l) {
                form.elements.l.value = '0';
            }

            if (option.dataset.resetCompetition === 'true' && form.elements.competition) {
                form.elements.competition.value = '';
            }

            close();
            form.submit();
        });
    });

    document.addEventListener('click', (event) => {
        if (!select.contains(event.target)) {
            close();
        }
    });

    select.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            close();
            toggle.focus();
        }
    });
});

document.querySelectorAll('[data-newsletter-form]').forEach((form) => {
    const emailInput = form.querySelector('[data-newsletter-email]');
    const submitButton = form.querySelector('button[type="submit"]');
    const errorMessage = form.querySelector('[data-newsletter-error]');
    const successMessage = form.parentElement?.querySelector('[data-newsletter-success]');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        if (!emailInput || !submitButton || !errorMessage || !successMessage) {
            form.submit();
            return;
        }

        errorMessage.hidden = true;
        errorMessage.textContent = '';
        submitButton.disabled = true;

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: new FormData(form),
            });

            const payload = await response.json().catch(() => ({}));

            if (!response.ok) {
                const emailError = payload?.errors?.email?.[0] || payload?.message || 'Unable to subscribe. Please try again.';
                errorMessage.textContent = emailError;
                errorMessage.hidden = false;
                return;
            }

            successMessage.textContent = payload?.message || 'You have subscribed to the newsletter.';
            successMessage.hidden = false;
            form.hidden = true;
        } catch (error) {
            errorMessage.textContent = 'Unable to subscribe. Please try again.';
            errorMessage.hidden = false;
        } finally {
            submitButton.disabled = false;
        }
    });
});

const tiltCard = document.getElementById('liveMatchCard');

if (tiltCard) {
    tiltCard.addEventListener('mousemove', (e) => {
        if (window.innerWidth < 1200) return;
        const rect = tiltCard.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width - 0.5) * 8;
        const y = ((e.clientY - rect.top) / rect.height - 0.5) * -8;
        tiltCard.style.transform = `perspective(1200px) rotateX(${y}deg) rotateY(${x}deg)`;
    });

    tiltCard.addEventListener('mouseleave', () => {
        tiltCard.style.transform = '';
    });
}

document.querySelectorAll('[data-results-carousel]').forEach((carousel) => {
    const track = carousel.querySelector('.results-carousel-track');
    const slides = Array.from(carousel.querySelectorAll('[data-results-slide]'));
    const dots = Array.from(carousel.querySelectorAll('[data-results-dot]'));
    const previousButton = carousel.querySelector('[data-results-prev]');
    const nextButton = carousel.querySelector('[data-results-next]');

    if (!track || slides.length <= 1) {
        return;
    }

    let activeIndex = 0;
    let paused = false;

    const showSlide = (index) => {
        activeIndex = (index + slides.length) % slides.length;
        track.style.transform = `translateX(-${activeIndex * 100}%)`;

        dots.forEach((dot, dotIndex) => {
            dot.classList.toggle('active', dotIndex === activeIndex);
        });
    };

    previousButton?.addEventListener('click', () => showSlide(activeIndex - 1));
    nextButton?.addEventListener('click', () => showSlide(activeIndex + 1));

    dots.forEach((dot) => {
        dot.addEventListener('click', () => showSlide(Number(dot.dataset.resultsDot || 0)));
    });

    carousel.addEventListener('mouseenter', () => {
        paused = true;
    });

    carousel.addEventListener('mouseleave', () => {
        paused = false;
    });

    carousel.addEventListener('focusin', () => {
        paused = true;
    });

    carousel.addEventListener('focusout', () => {
        paused = false;
    });

    setInterval(() => {
        if (!paused && document.hasFocus()) {
            showSlide(activeIndex + 1);
        }
    }, 4200);
});



// Project Roadmap interactivity
const roadmapNodes = document.querySelectorAll('.road-node');
const roadmapCards = document.querySelectorAll('.road-card');
const roadmapControls = document.querySelectorAll('.road-control');

function activateRoadmapStep(step) {
    const stepString = String(step);

    roadmapNodes.forEach((node) => {
        node.classList.toggle('active', node.dataset.step === stepString);
    });

    roadmapCards.forEach((card) => {
        card.classList.toggle('active', card.dataset.card === stepString);
    });

    roadmapControls.forEach((control) => {
        control.classList.toggle('active', control.dataset.step === stepString);
    });
}

roadmapNodes.forEach((node) => {
    node.addEventListener('mouseenter', () => activateRoadmapStep(node.dataset.step));
    node.addEventListener('click', () => activateRoadmapStep(node.dataset.step));
});

roadmapCards.forEach((card) => {
    card.addEventListener('mouseenter', () => activateRoadmapStep(card.dataset.card));
    card.addEventListener('click', () => activateRoadmapStep(card.dataset.card));
});

roadmapControls.forEach((control) => {
    control.addEventListener('click', () => activateRoadmapStep(control.dataset.step));
});

// Optional auto-highlight loop. Pause when user hovers the section.
const roadmapSection = document.querySelector('.roadmap-section');
let roadmapIndex = 0;
let roadmapPaused = false;

if (roadmapSection) {
    roadmapSection.addEventListener('mouseenter', () => {
        roadmapPaused = true;
    });

    roadmapSection.addEventListener('mouseleave', () => {
        roadmapPaused = false;
    });

    setInterval(() => {
        if (roadmapPaused || !document.hasFocus()) return;
        roadmapIndex = (roadmapIndex + 1) % roadmapNodes.length;
        activateRoadmapStep(roadmapIndex);
    }, 4200);
}



// Dashboard + Live Match Centre
document.querySelectorAll('.dash-nav-item').forEach((item)=>{
    item.addEventListener('click',()=>{
        document.querySelectorAll('.dash-nav-item').forEach((nav)=>nav.classList.remove('active'));
        item.classList.add('active');
    });
});

const ratingRing=document.querySelector('.rating-ring');
if(ratingRing){
    const target=Number(ratingRing.dataset.rating||'82');
    let current=0;
    const animateRating=()=>{
        const timer=setInterval(()=>{
            current+=1;
            ratingRing.style.setProperty('--value',current);
            const value=ratingRing.querySelector('strong');
            if(value)value.textContent=current;
            if(current>=target)clearInterval(timer);
        },14);
    };
    const observer=new IntersectionObserver((entries)=>{
        if(entries.some((entry)=>entry.isIntersecting)){
            animateRating(); observer.disconnect();
        }
    },{threshold:.35});
    observer.observe(ratingRing);
}

const possessionBars=document.querySelectorAll('.possession-bar span');
if(possessionBars.length){
    const animateBars=()=>{
        possessionBars.forEach((bar)=>{
            const originalStyle=bar.getAttribute('style')||'';
            const match=originalStyle.match(/width:\s*([^;]+)/);
            const finalWidth=match?match[1]:'50%';
            bar.style.width='0';
            setTimeout(()=>{bar.style.width=finalWidth;},140);
        });
    };
    const livePanel=document.querySelector('.live-command-panel');
    const observer=new IntersectionObserver((entries)=>{
        if(entries.some((entry)=>entry.isIntersecting)){
            animateBars(); observer.disconnect();
        }
    },{threshold:.25});
    if(livePanel)observer.observe(livePanel);
}

// Token section
const tokenStat = document.querySelector('.token-stat');
if (tokenStat) {
    const formatNumber = (num) => num.toLocaleString('en-GB');
    const target = Number(tokenStat.dataset.target || '1000000000');
    const tokenName = tokenStat.dataset.tokenName || 'token';
    let current = 0;

    const animateTokenStat = () => {
        const duration = 1600;
        const steps = 70;
        const increment = target / steps;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            tokenStat.textContent = `${formatNumber(Math.round(current))} ${tokenName}`;
        }, duration / steps);
    };

    const observer = new IntersectionObserver((entries) => {
        if (entries.some((entry) => entry.isIntersecting)) {
            animateTokenStat();
            observer.disconnect();
        }
    }, { threshold: 0.35 });

    observer.observe(tokenStat);
}

// Footer / CTA interactions
const footerNewsletterForm = document.getElementById('footerNewsletterForm');

if (footerNewsletterForm) {
    footerNewsletterForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const input = footerNewsletterForm.querySelector('input');
        const email = input ? input.value.trim() : '';

        showFooterToast(email ? `Subscribed: ${email}` : 'Subscribed successfully.');

        if (input) input.value = '';
    });
}

function showFooterToast(message) {
    let toast = document.querySelector('.footer-toast');

    if (!toast) {
        toast = document.createElement('div');
        toast.className = 'footer-toast';
        document.body.appendChild(toast);

        const style = document.createElement('style');
        style.textContent = `
      .footer-toast {
        position: fixed;
        right: 24px;
        bottom: 24px;
        z-index: 9999;
        padding: 14px 18px;
        border-radius: 12px;
        background: rgba(4,10,19,.96);
        border: 1px solid rgba(149,245,61,.32);
        color: #fff;
        box-shadow: 0 0 30px rgba(149,245,61,.14);
        opacity: 0;
        transform: translateY(12px);
        transition: .2s ease;
        font-weight: 800;
      }
      .footer-toast.show {
        opacity: 1;
        transform: translateY(0);
      }
    `;
        document.head.appendChild(style);
    }

    toast.textContent = message;
    toast.classList.add('show');

    clearTimeout(window.__footerToastTimer);
    window.__footerToastTimer = setTimeout(() => {
        toast.classList.remove('show');
    }, 2600);
}
