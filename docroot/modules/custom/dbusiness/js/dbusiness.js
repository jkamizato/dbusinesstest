(function ($, Drupal) {
  Drupal.behaviors.dbusinessSlide = {
    attach: function (context, settings) {
      console.log('asdf');
      $('.field--name-slider').slick({});
    }
  };
})(jQuery, Drupal);
