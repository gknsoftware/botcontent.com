$(function () {
  var baseURL = $('base').attr('href'); //base url

  /*  BOOTSTRAP: All javascript's
  --------------------------------------------------*/
  $('[data-toggle="popover"]').popover();

  /*  CHANGE: Button text
  --------------------------------------------------*/
  $("button")
    .click(function() 
    {
      var $btn = $(this);
      $btn.button('loading');
      // simulating a timeout
      setTimeout(function () {
        $btn.button('reset');
      }, 1000);
    });

  /*  CHANGE: Background pictures
  --------------------------------------------------*/
  var bgs = $('#backgrounds');
  var backgrounds = [
    'url(third/assets/images/login/login_bg5.jpeg)', 
    'url(third/assets/images/login/login_bg2.jpg)',
    'url(third/assets/images/login/login_bg3.jpg)',
    'url(third/assets/images/login/login_bg4.jpg)',
    'url(third/assets/images/login/login_bg.jpg)'
    ];
  var current = 0;

  setTimeout(function nextBackground() {
      bgs.css('background', backgrounds[current = ++current % backgrounds.length]).fadeOut(0).fadeIn('slow');
      setTimeout(nextBackground, 8000);
  }, 8000);
  bgs.css('background', backgrounds[0]); //first background

  if( backgrounds == '' ){ $('#bgfilter').remove(); }

  /*  DROPDOWN: Login information area for small devices
  --------------------------------------------------*/
  $('.showinfo')
    .click(function () 
    {
      var i = 0;
      $('.showinfo ul').slideDown('fast', function () {
        i = 1;
      });

      if(i==1) { $('.showinfo ul').slideUp('fast'); }
    })

  $('.account-form')
    .click(function () 
    {
      $('.showinfo ul').slideUp('fast');
    })

    /*  CHANGE: show/hide element with countdown
    --------------------------------------------------*/
    $('.countdown.callback')
        .countdown({
        date: +(new Date) + 10000,
        render: function(data) {
            $(this.el).text(this.leadingZeros(data.sec, 2) + " sec");
        },
        onEnd: function() {
            $(this.el).addClass('hidden');

            $(this.el).parent().addClass('hidden');
            $(this.el).parent().removeClass('show');

            $('#recode').addClass('show');
            $('#recode').removeClass('hidden');
        }
    });

/* jquery end */ });