/**
 * Created by ubuntu on 30/07/18.
 */

(function ($) {
  Drupal.behaviors.initSlider = {
    attach: function (context, settings) {
      // Frontpage slideshow
      $('.block-views-blockslides-frontpage-slideshow .view-content').slick({
        dots: true,
        speed: 1500,
        autoplay: true,
        arrows: false,
        fade: true
      });

      // Frontpage Agenda slider
      $('.block-views-blockevents-frontpage-block .view-content').slick({
        dots: true,
        speed: 1500,
        autoplay: false,
        arrows: true
      });
    }
  };
})(jQuery);