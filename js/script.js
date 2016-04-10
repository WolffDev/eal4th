jQuery(document).ready(function($){
  $(".site-header-cart").on('mouseenter', function(){
    $(this).find('.cart-long-list').slideDown().addClass('cart-hover');
  });

  $(".site-header-cart").on('mouseleave', function(){
    $(this).find('.cart-long-list').slideUp();
  });
});
