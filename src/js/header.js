const mainNav = jQuery('.main-navigation');
const hamburger = jQuery('.hamburger');
const main = jQuery('main');

// On hamburger click
jQuery('.hamburger').on('click', () => {
  // If hamburger has class "open"
  if (jQuery(hamburger).hasClass('open')) {
    // Remove class "open"
    hamburger.removeClass('open');

    // Hide main nav
    mainNav.css({transform: 'translateY(-100%)'});

    // Reset main content
    main.css({transform: 'translateY(0)'});
    
  // Otherwise
  } else {
    // Add class "open"
    hamburger.addClass('open');

    // Show main nav
    mainNav.css({transform: 'translateY(0)'});

    // Hide main content
    main.css({transform: 'translateY(100vh)'});
  }
});