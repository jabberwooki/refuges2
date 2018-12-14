/**
 * Created by ubuntu on 13/12/18.
 */

(function ($) {
  Drupal.behaviors.OtherRefuges = {
    attach: function (context, settings) {
      $('#dropdown-refuges').on('click', function(event){
        $('#other-refuges ul').slideToggle();
        event.stopImmediatePropagation();
      });

      $(document).click(function(e) {
        if ($(e.target).closest("#dropdown-refuges").length === 0 && $(e.target).closest(".other-refuges-links").length === 0) {
          $('.other-refuges-links').hide();
        }
      });
    }
  };
})(jQuery);