// Function to set footer buffer height based on footer height and positioning
const footerBufferHeight = () => {
  const footer = jQuery('.site-footer');
  const footerH = footer.outerHeight(true);
  const footerOffset = parseInt(footer.css('bottom'));
  const footerBuffer = jQuery('.footer-buffer');

  footerBuffer.css({height: `${footerH + (footerOffset * 2.4)}px`});
}

// On doc ready
jQuery($ => {
  // Set footer buffer height
  footerBufferHeight();

  // On window resize
  $(window).on('resize', () => {
    // Set footer buffer height
    footerBufferHeight();
  });
});