export const applyAuthenticatedNavigation = ({
    session,
    guestLinks,
    dashboardLinks,
    dashboardUrl,
}) => {
    if (session?.authenticated !== true || !session?.user) {
        return false;
    }

    guestLinks.forEach((link) => {
        link.hidden = true;
    });
    dashboardLinks.forEach((link) => {
        link.href = dashboardUrl;
        link.hidden = false;
    });

    return true;
};
