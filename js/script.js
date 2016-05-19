jQuery(document).ready(function($){
  $(".site-header-cart").on('hover', function(){
    $(this).find('.cart-long-list').toggleClass('cart-hover');
  });

  // Add class to label, if input already has class, except language label
  $('#customer_details .woocommerce-billing-fields p', function(){
    var inputText = $(this).find('input').val();
    if( inputText !== "" ) {
      $(this).find('label').addClass('has-value');
    } else {
      $(this).find('label').removeClass('has-value');
    }
    $(this).find('#billing_country_field label').removeClass('has-value');
  });

  // add class to label when focus on input
  $('#customer_details .woocommerce-billing-fields p input').focus(function(){
    $(this).prev().addClass('has-value');
    $(this).find('#billing_country_field label').removeClass('has-value');
  });

  // Adds class in input has value/text
  $('#customer_details .woocommerce-billing-fields p').focusout(function(){
    var text_val = $(this).find('input').val();
    if(text_val !== "") {
      $(this).find('label').addClass('has-value');
    } else {
      $(this).find('label').removeClass('has-value');
    }
  });

  // Add class to desktop menu, for css effect
  $('.nav-wrapper #menu-primaer > li').addClass('hvr-underline-from-center');

  // Front page Call-To-Action button effect
  $('.btn-wrap').on('mouseenter', function(){
    $(this).find('.right').css({'width':'350px',"right":"-30px"});
    //$(this).find('span').css('transform','scale(1.5,1.5)');
  });
  $('.btn-wrap').on('mouseleave', function(){
    $(this).find('.right').css({'width':'150px',"right":"-40px"});
    //$(this).find('span').css('transform','scale(1,1)');
  });


});

// Hotjar Tracking Code for http://www.artea.dk
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:213082,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
