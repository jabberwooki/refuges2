/**
 * Created by ubuntu on 30/07/18.
 */

(function ($) {
  Drupal.behaviors.initSlider = {
    attach: function (context, settings) {
      console.log('frontpage-slider');
      $('.block-views-blockslides-frontpage-slideshow .view-content').slick({
        dots: true,
        speed: 1500,
        autoplay: true,
        arrows: false,
        fade: true
      });
    }
  };
})(jQuery);