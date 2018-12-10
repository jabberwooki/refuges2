/**
 * Created by ubuntu on 07/11/18.
 */

(function ($) {
  Drupal.behaviors.reservation = {
    attach: function (context, settings) {
      $('.widget-resa-1').hide();

      $('button.btn-resa').on('click', function(event){
        $('.widget-resa-1').slideToggle();
        event.stopImmediatePropagation();
      });
    }
  };
})(jQuery);
