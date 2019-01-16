var leaver;

$(document).ready(function() {
  $('#pagepiling').pagepiling({
    onLeave: function(index, nextIndex, direction) {
      leaver = '#section' + nextIndex;
      console.log(leaver);
      $(leaver).find('.move').addClass('animated fadeInUp')
      $('.pager').text(nextIndex);
    },
    afterLoad: function(anchorLink, index) {
      $('.pager').text(index);
    }
  });
  $('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });

  var newUrl;
  $('a').click(function() {
    event.preventDefault();
    newUrl = this.href;
    if (newUrl && !newUrl.endsWith('#')) {
      $('html').addClass('fadeSiteOut');
      setTimeout(function() {
        window.location = newUrl;
      }, 1000);
    } else if ($(this).hasClass('remote')) {
      $('.menu-container').removeClass('show-menu');
      window.open('show.php', 'newwindow', 'width=500,height=500');
    } else if ($(this).hasClass('menu-toggle')) {
      $('.menu-container').toggleClass('show-menu');
    } else if ($(this).hasClass('help-toggle')) {
      $('.help-container').toggleClass('show-help');
    }
  });

  clockUpdate();
  setInterval(clockUpdate, 1000);

  $('.paged').text($('.section').length);

  var check;
  var menus;
  var li = $('li.menoo');

  $('html').keydown(function(event) {

    if (event.keyCode == 27) {
      $('html').addClass('fadeSiteOut');
      setTimeout(function() {
        window.location = 'index.php';
      }, 1000);
    } else if (event.keyCode == 82) {
      window.open('show.php', 'newwindow', 'width=500,height=500');
    }

    check = $('.menu-container').hasClass('show-menu');
    console.log(check);

    if (event.keyCode == 37) {
      $('.menu-container').removeClass('show-menu');
    } else if (event.keyCode == 39) {
      $('.menu-container').addClass('show-menu');
    }

    if (event.which === 40) {
      if (menus) {
        menus.removeClass('keys');
        next = menus.next();
        if (next.length > 0) {
          menus = next.addClass('keys');
        } else {
          menus = li.eq(0).addClass('keys');
        }
      } else {
        menus = li.eq(0).addClass('keys');
      }
    } else if (event.which === 38) {
      if (menus) {
        menus.removeClass('keys');
        next = menus.prev();
        if (next.length > 0) {
          menus = next.addClass('keys');
        } else {
          menus = li.last().addClass('keys');
        }
      } else {
        menus = li.last().addClass('keys');
      }
    } else if (event.which === 13) {
      changeSlide = $('.keys').find('a').attr('href');
      $('html').addClass('fadeSiteOut');
      setTimeout(function() {
        window.location = changeSlide;
      }, 1000);
    }

  });



});

function clockUpdate() {
  var date = new Date();

  function addZero(x) {
    if (x < 10) {
      return (x = '0' + x);
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

  $('.digital-clock span').text(h + ':' + m + ':' + s);
}
