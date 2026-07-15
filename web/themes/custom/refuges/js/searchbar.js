/**
 * Created by ubuntu on 02/10/18.
 */

(function ($) {
  Drupal.behaviors.searchBar = {
    attach: function (context, settings) {
      $('.region-highlighted .block-search-form-block').hide();

      $('span.glyphicon-search').on('click', function(event){
        $('.region-highlighted .block-search-form-block').slideToggle();
        event.stopImmediatePropagation();
        $('.region-highlighted input[type="search"]').focus();
      });

      $('#searchformclose').on('click', function(event){
        $('.region-highlighted .block-search-form-block').slideToggle();
        event.stopImmediatePropagation();
      });
    }
  };
})(jQuery);
