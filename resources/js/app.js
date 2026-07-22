import { applyAuthenticatedNavigation } from './authenticated-navigation';

const initialiseTokenCalculator = () => {
    const calculator = document.querySelector('[data-token-calculator]');

    if (!calculator) {
        return;
    }

    const tokenPrice = Number(calculator.dataset.tokenPrice);
    const paymentInput = calculator.querySelector('#youPayEth');
    const receiveInput = calculator.querySelector('#youReceiveToken');

    if (!paymentInput || !receiveInput || !Number.isFinite(tokenPrice) || tokenPrice <= 0) {
        return;
    }

    paymentInput.addEventListener('change', () => {
        let paymentAmount = Number(paymentInput.value);

        if (!Number.isFinite(paymentAmount) || paymentAmount < tokenPrice) {
            paymentAmount = tokenPrice;
            paymentInput.value = String(tokenPrice);
        }

        receiveInput.value = (paymentAmount / tokenPrice).toFixed(4);
    });

    receiveInput.addEventListener('change', () => {
        let tokenAmount = Number(receiveInput.value);

        if (!Number.isFinite(tokenAmount) || tokenAmount < 1) {
            tokenAmount = 1;
            receiveInput.value = '1';
        }

        paymentInput.value = (tokenAmount * tokenPrice).toFixed(8);
    });
};

const initialiseSectionNavigation = (selector, linkSelector) => {
    const nav = document.querySelector(selector);

    if (!nav) {
        return;
    }

    const links = Array.from(nav.querySelectorAll(linkSelector));
    const sections = links.map((link) => document.querySelector(link.hash)).filter(Boolean);
    const setActiveLink = (id) => links.forEach((link) => {
        const active = link.hash === `#${id}`;
        link.classList.toggle('active', active);
        active ? link.setAttribute('aria-current', 'true') : link.removeAttribute('aria-current');
    });

    links.forEach((link) => link.addEventListener('click', () => setActiveLink(link.hash.slice(1))));

    if (!('IntersectionObserver' in window)) {
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        const visibleEntry = entries
            .filter((entry) => entry.isIntersecting)
            .sort((first, second) => second.intersectionRatio - first.intersectionRatio)[0];

        if (visibleEntry) {
            setActiveLink(visibleEntry.target.id);
        }
    }, { rootMargin: '-35% 0px -50% 0px', threshold: [0.15, 0.35, 0.6] });

    sections.forEach((section) => observer.observe(section));
};

const initialiseClubComparison = () => {
    document.querySelectorAll('[data-club-compare-form]').forEach((form) => {
        const input = form.querySelector('[data-club-compare-input]');
        const options = Array.from(document.querySelectorAll('#clubCompareOptions option'));

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            const selectedOption = options.find((option) => option.value === input?.value);

            if (selectedOption?.dataset.url) {
                window.location.assign(selectedOption.dataset.url);
            }
        });
    });
};

const initialiseAuthenticatedNavigation = async () => {
    const { authSessionUrl, authDashboardUrl } = document.body.dataset;
    const guestLinks = document.querySelectorAll('[data-auth-guest-link]');
    const dashboardLinks = document.querySelectorAll('[data-auth-dashboard-link]');

    if (!authSessionUrl || !authDashboardUrl || guestLinks.length === 0 || dashboardLinks.length === 0) {
        return;
    }

    const controller = new AbortController();
    const timeout = window.setTimeout(() => controller.abort(), 2000);

    try {
        const response = await fetch(authSessionUrl, {
            method: 'GET',
            credentials: 'include',
            cache: 'no-store',
            headers: {
                Accept: 'application/json',
            },
            signal: controller.signal,
        });

        if (!response.ok) {
            return;
        }

        const session = await response.json();

        applyAuthenticatedNavigation({
            session,
            guestLinks,
            dashboardLinks,
            dashboardUrl: authDashboardUrl,
        });
    } catch (error) {
        if (error?.name !== 'AbortError') {
            console.debug('Authenticated navigation check was unavailable.');
        }
    } finally {
        window.clearTimeout(timeout);
    }
};

document.addEventListener('DOMContentLoaded', () => {
    initialiseTokenCalculator();
    initialiseSectionNavigation('[data-faq-nav]', '[data-faq-nav-link]');
    initialiseSectionNavigation('[data-whitepaper-nav]', 'a[href^="#"]');
    initialiseClubComparison();
    void initialiseAuthenticatedNavigation();
});
