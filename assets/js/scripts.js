var leaver;

$(document).ready(function() {
  $('#pagepiling').pagepiling({
    menu: '#menu',
    sectionsColor: ['#111', '#000', '#111', '#000', '#111'],
    onLeave: function(index, nextIndex, direction) {
      leaver = '#section' + nextIndex;
      console.log(leaver);
      $(leaver).find('.move').addClass('animated fadeInUp')

      $('.pager').text(nextIndex);
    },
    afterRender: function() {
      //$('#callbacksDiv').append('<p>afterRender</p>');
    },
    afterLoad: function(anchorLink, index) {
      $('.pager').text(index);
    }
  });
  $('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });



  $('a').each(function() {
    if (location.hostname === this.hostname || !this.hostname.length) {

      var link = $(this).attr("href");

      if (link.match("^#")) {

        $(this).click(function() {
          var target = $(link);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - 70
            }, 1000);
            return false;
          }
        });

      } else if (link.match("^mailto")) {} else {

        $(this).click(function(e) {
          e.preventDefault();
          $('html').addClass('fadeSiteOut');
          setTimeout(function() {
            window.location = link;
          }, 1000);
        });

      }

    }
  });

  clockUpdate();
  setInterval(clockUpdate, 1000);

  $('.paged').text($('.section').length);

});

function clockUpdate() {
  var date = new Date();

  function addZero(x) {
    if (x < 10) {
      return (x = "0" + x);
    } else {
      return x;
    }
  }

  function twelveHour(x) {
    if (x > 24) {
      return (x = x - 24);
    } else if (x == 0) {
      return (x = 24);
    } else {
      return x;
    }
  }

  var h = addZero(twelveHour(date.getHours()));
  var m = addZero(date.getMinutes());
  var s = addZero(date.getSeconds());

  $(".digital-clock").text(h + ":" + m + ":" + s);
}
