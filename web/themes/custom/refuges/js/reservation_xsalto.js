
(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.xsalto = {
    attach: function (context, settings) {
      if (BK_widget.target === null) {
        const urlQueryString = window.location.search;
        const urlParams = new URLSearchParams(urlQueryString);
        var BK_opts = {
          target: 'booking',
          apporigin: 'VANOISE',
          mode: 'FORM',
          id: urlParams.get('id'),
          structure: settings.xsalto_data.structure,
          action: '',
          lang: settings.xsalto_data.structure,
          css: 'https://refugit.refuges-vanoise.com/css/widget-resa/vanoise/widget-resa.css',
        };

        BK_widget.init(BK_opts);
        $('#if_booking').height('100%');

        document.head.prepend('<meta http-equiv="refresh"content="3600">');
      }
    }
  };
})(jQuery, Drupal, drupalSettings);

