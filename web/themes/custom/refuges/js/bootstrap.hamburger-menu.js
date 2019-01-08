/**
 * Created by ubuntu on 02/10/18.
 */

(function ($) {
  Drupal.behaviors.hamburgerMenu = {
    attach: function (context, settings) {
      // Permet de descendre le menu hamburger sous le header.
      var hamburgerMenuOffset = $('.top.row').height() + $('.region-header .row').height();
      if ($('#toolbar-bar').length) { // Si le visiteur est connecté
        hamburgerMenuOffset += $('#toolbar-bar').height() + $('#toolbar-item-administration-tray').height();
      }
      $('#sidebar').css('top', hamburgerMenuOffset + 'px');

      // Referme le menu hamburger si l'on clique n'importe ou dans le document
      // sauf sur le menu lui-même ou le picto menu.
      $(document).click(function(e) {
        if ($(e.target).closest("#sidebar").length === 0 && $(e.target).closest("#sidebarCollapse").length === 0) {
          $('.hamburger-close').hide();
          $('.hamburger-open').show();
          $('#sidebar').removeClass('active');
          $('.hbg-overlay').fadeOut();
        }
      });

      $('.hamburger-close, .overlay').on('click', function () {
        $(this).hide();
        $('.hamburger-open').show();
        $('#sidebar').removeClass('active');
        $('.hbg-overlay').fadeOut();
      });

      $('.hamburger-open').on('click', function () {
        $(this).hide();
        $('.hamburger-close').show();
        $('#sidebar').addClass('active');
        $('.hbg-overlay').fadeIn();
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    }
  };
})(jQuery);
