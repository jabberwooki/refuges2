/**
 * Created by ubuntu on 02/10/18.
 */

(function ($) {
  Drupal.behaviors.searchBar = {
    attach: function (context, settings) {
      $('.region-top .search-block-form').hide();

      $('span.glyphicon-search').on('click', function(event){
        $('.region-top .search-block-form').slideToggle();
        event.stopImmediatePropagation();
        $('#search-block-form input[type="search"]').focus();
      });

      $('#searchformclose').on('click', function(event){
        $('.region-top .search-block-form').slideToggle();
        event.stopImmediatePropagation();
      });
    }
  };
})(jQuery);
