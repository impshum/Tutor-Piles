var leaver;

$(document).ready(function() {
  $('#pagepiling').pagepiling({
    menu: '#menu',
    sectionsColor: ['#111', '#000', '#111', '#000', '#111'],
    onLeave: function(index, nextIndex, direction) {
      leaver = '#section' + nextIndex;
      console.log(leaver);
      $(leaver).find('.move').addClass('animated fadeInUp')

      $('.page-count span').text(nextIndex);
    },
    afterRender: function() {
      //$('#callbacksDiv').append('<p>afterRender</p>');
    },
    afterLoad: function(anchorLink, index) {
      $('.page-count span').text(index);
    }
  });
  $('pre code').each(function(i, block) {
   hljs.highlightBlock(block);
 });
 //$('#section1').find('.move').addClass('animated fadeInUp')
  $('body').removeClass('fade-out');
});
