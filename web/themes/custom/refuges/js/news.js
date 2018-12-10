/**
 * Created by ubuntu on 20/11/18.
 */

(function ($) {
  Drupal.behaviors.news = {
    attach: function (context, settings) {
      // Actus - Le div Texte doit avoir la même hauteur que le div Image.
      var imageHeight = $('.view-news .field--name-field-media-image').height();
      $('.view-news .text-teaser').each(function() {
        $(this).css('height', imageHeight + 'px');
      });

      // Actus : Contrôle du nombre de lignes de résumé en page d'accueil
      $('.view-news.view-display-id-frontpage_block .field--name-field-summary').ellipsis(
        {
          lines: 7,
          responsive: true
        }
      );
      // Actus : Contrôle du nombre de lignes de résumé dans la rubrique Actualités
      // 
      $('.view-news.view-display-id-list .field--name-field-summary').ellipsis(
        {
          lines: 4,
          responsive: true
        }
      );

      // Agenda : Contrôle du nombre de lignes de résumé en page d'accueil
      // $('.view-events .field--name-field-summary').ellipsis(
      //   {
      //     lines: 4,
      //     responsive: true
      //   }
      // );
    }
  };
})(jQuery);
