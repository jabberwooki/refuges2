/**
 * Created by ubuntu on 02/10/18.
 */

(function ($) {
  Drupal.behaviors.hamburgerMenu = {
    attach: function (context, settings) {
      $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.hbg-overlay').fadeOut();
      });

      $('#sidebarCollapse').on('click', function () {
        // C.Espiau - Ajoute un padding top au menu hamburger si user connecté
        // pour que la barre d'admin ne cache pas le haut du menu hamburger.
        //if ($('#toolbar-administration').length) {
        //  var paddingTop = $('#toolbar-administration .toolbar-bar').height() + $('.toolbar-tray').height();
        //  $('#sidebar').css('padding-top', paddingTop + 'px');
        //  $('#dismiss').css('top', paddingTop + 'px');
        //}

        //console.log($('div.hamburger').parent().height());
        //$('#sidebar').css('top', $('div.hamburger').parent().height() + 'px');
        var position = $('.dialog-off-canvas-main-canvas > section:nth-child(1) > div:nth-child(2)').position();
        var bodyMarginTop = $('body').css('margin-top');
        var verticalOffset = Math.round(parseFloat(position.top) + parseFloat(bodyMarginTop));

        console.log(position.top);
        console.log(bodyMarginTop);
        console.log(verticalOffset);
        $('#sidebar').css('top', verticalOffset + 'px');

        $('#sidebar').addClass('active');
        $('.hbg-overlay').fadeIn();
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });


    }
  };
})(jQuery);
