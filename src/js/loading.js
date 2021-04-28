const WindowLoad = () => {
  // Add "loaded" class to body
  jQuery('body').addClass('loaded');

  // Hide loading screen
  jQuery('.loading').fadeOut(150);
};

// If IE, run on doc ready
if (window.document.documentMode) {
  WindowLoad();
}

// Everyone else run on window load
jQuery(window).on('load', () => {
  WindowLoad();
});

