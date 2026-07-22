import assert from 'node:assert/strict';
import test from 'node:test';

import { applyAuthenticatedNavigation } from './authenticated-navigation.js';

const navigationLinks = () => ({
    dashboardLinks: [{ hidden: true, href: '' }],
    guestLinks: [{ hidden: false }, { hidden: false }],
});

test('shows dashboard for every authenticated account state', () => {
    for (const accountState of ['pending_email', 'pending_mfa_enrollment', 'active']) {
        const links = navigationLinks();

        const applied = applyAuthenticatedNavigation({
            session: { authenticated: true, user: { accountState } },
            ...links,
            dashboardUrl: 'https://app.sqaudex.test/ro',
        });

        assert.equal(applied, true);
        assert.deepEqual(links.guestLinks.map((link) => link.hidden), [true, true]);
        assert.equal(links.dashboardLinks[0].hidden, false);
        assert.equal(links.dashboardLinks[0].href, 'https://app.sqaudex.test/ro');
    }
});

test('keeps guest navigation when the session is not authenticated', () => {
    const links = navigationLinks();

    const applied = applyAuthenticatedNavigation({
        session: { authenticated: false },
        ...links,
        dashboardUrl: 'https://app.sqaudex.test/ro',
    });

    assert.equal(applied, false);
    assert.deepEqual(links.guestLinks.map((link) => link.hidden), [false, false]);
    assert.equal(links.dashboardLinks[0].hidden, true);
});
