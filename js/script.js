jQuery(document).ready(function($){
  $(".site-header-cart").on('hover', function(){
    $(this).find('.cart-long-list').toggleClass('cart-hover');
  });
});
