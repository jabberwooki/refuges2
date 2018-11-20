/**
 * Created by ubuntu on 20/11/18.
 */

(function ($) {
  Drupal.behaviors.news = {
    attach: function (context, settings) {
      var imageHeight = $('.view-news .field--name-field-media-image').height();
      $('.view-news .text-teaser').each(function() {
        $(this).css('height', imageHeight + 'px');
      });
    }
  };
})(jQuery);
