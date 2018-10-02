/**
 * Created by ubuntu on 02/10/18.
 */

(function ($) {
  Drupal.behaviors.hamburgerMenu = {
    attach: function (context, settings) {
      $('.hamburger-close, .overlay').on('click', function () {
        $(this).hide();
        $('.hamburger-open').show();
        $('#sidebar').removeClass('active');
        $('.hbg-overlay').fadeOut();
      });

      $('.hamburger-open').on('click', function () {
        $(this).hide();
        $('.hamburger-close').show();

        // Permet de descendre le menu hamburger sous le header.
        var position = $('.dialog-off-canvas-main-canvas > section:nth-child(1) > div:nth-child(2)').position();
        var bodyMarginTop = $('body').css('margin-top');
        var verticalOffset = Math.round(parseFloat(position.top) + parseFloat(bodyMarginTop));
        $('#sidebar').css('top', verticalOffset + 'px');

        $('#sidebar').addClass('active');
        $('.hbg-overlay').fadeIn();
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });


    }
  };
})(jQuery);
