(function($){
  $(function(){

    $(".dropdown-button").dropdown({
      inDuration: 300,
      outDuration: 225,
      hover: false,
      belowOrigin: true,
      alignment: 'right'
      }
    );

    // smooth scroll on same page
    $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 2000);
          return false;
        }
      }
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space
