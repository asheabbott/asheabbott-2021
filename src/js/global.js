// If not homepage
if (!jQuery('.home').length) {
  // Function to set main minimum height and page header top padding
  const globalSpacing = () => {
    const header = jQuery('.site-header');
    const headerH = header.outerHeight(true);
    const headerTop = parseInt(header.css('top'));
    const main = jQuery('main');
    const mainMargin = parseInt(main.css('margin-bottom'));
    const pageHeader = jQuery('.page-header');
    const footerBuffer = jQuery('.footer-buffer');
    const footerBufferH = footerBuffer.outerHeight(true);

    const topSpace = headerH + (headerTop * 5);
    const bottomSpace = mainMargin + footerBufferH;

    // Set minimum height on main element
    main.css({minHeight: `calc(100vh - ${bottomSpace}px)`});

    // Set page header top padding
    pageHeader.css({paddingTop: `${topSpace}px`});
  };

  // On doc ready
  jQuery($ => {
    // Set main minimum height and page header top padding
    globalSpacing();

    // On window resize
    $(window).on('resize', () => {
      // Set main minimum height and page header top padding
      globalSpacing();
    });
  });
}