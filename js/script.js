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





});
