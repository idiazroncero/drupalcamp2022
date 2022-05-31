(function ($, Drupal) {
  Drupal.behaviors.quote = {
    attach: function (context, settings) {
      alert('El behavior quote ha sido ejecutado');
      var $quotes = $('.paragraph--type--quote', context);
      alert('Hay ' + $quotes.length + ' nuevos quotes en la página');

      $('.paragraph--type--quote', context).once('quote').on('click', function(){
        alert('Alguien me ha clicado y ahora ocurrirán maravillosas interacciones en javascript')
      });
    }
  };
}(jQuery, Drupal));

