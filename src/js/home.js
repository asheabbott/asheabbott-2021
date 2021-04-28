if (jQuery('.home').length) {
  const homeLogoBuffer = jQuery('.home-logo-buffer');
  const header = jQuery('.site-header');
  const hamburger = jQuery('.hamburger');
  const footer = jQuery('.site-footer');

  // Function to set header position
  const framePosition = (onScroll = false) => {
    const scrollTop = jQuery(window).scrollTop();
    const homeLogoBufferH = homeLogoBuffer.outerHeight(true);
    const headerH = header.outerHeight(true);
    const footerH = footer.outerHeight(true);
    const footerOffset = parseInt(footer.css('bottom'));

    if (onScroll === false || (onScroll === true && !hamburger.hasClass('open'))) {
      // If frame should be visible
      if (scrollTop > homeLogoBufferH) {
        // Set visible position
        header.css({transform: 'translateY(0)'});
        footer.css({transform: 'translateY(0)'});
      
      // Otherwise
      } else {
        // Set non-visible position
        header.css({transform: `translateY(-${(homeLogoBufferH - 1) + headerH}px)`});
        footer.css({transform: `translateY(${footerH + footerOffset}px)`});
      }
    }
  };

  // On doc ready
  jQuery($ => {
    framePosition();
  });

  // On scroll
  jQuery(window).on('scroll', () => {
    framePosition(true);
  });
}