
jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる
  //ドロワーメニュー
  $(".js-hamburger").click(function () {
    if ($('.js-hamburger').hasClass('is-active')) {
      $('.js-hamburger').removeClass("is-active");
      // $("html").toggleClass("is-fixed");
      $(".js-sp-nav").fadeOut(300);
    } else {
      $('.js-hamburger').addClass("is-active");
      // $("html").toggleClass("is-fixed");
      $(".js-sp-nav").fadeIn(300);
    }
  });

  $(".nav-contents__title, .nav-contents__text").click(function () {
    if ($('.js-hamburger').hasClass('is-active')) {
        $('.js-hamburger').removeClass("is-active");
        $(".js-sp-nav").fadeOut(300);
    } else {
        $('.js-hamburger').addClass("is-active");
        $(".js-sp-nav").fadeIn(300);
    }
  });

  //mvスワイパー
    let mvSwiper = new Swiper(".js-mv-swiper", {
      loop: true,
      autoplay: {
      delay: 3000,
      },
    });

    //campaignスワイパー
    let campaignSwiper = new Swiper(".js-campaign-swiper", {
      loop: true,
      slidesPerView: 1.2,// 2枚目20％だけ表示
      breakpoints: {
        // スライドの表示枚数：600px以上の場合
        600: {
          slidesPerView: 2.2,
        },
        // スライドの表示枚数：768px以上の場合
        768: {
          slidesPerView: 3.3,
        },
      },
      grabCursor: true, // カーソルを置いたときに指のカーソルを表示
      navigation: {
        nextEl: ".js-campaign-button-next",
        prevEl: ".js-campaign-button-prev",
      },
      clickable: true,
    });

    //背景色の後に画像やテキストが表示されるエフェクト
    //要素の取得とスピードの設定
      var box = $('.colorbox'),
      speed = 700;  

      //.colorboxの付いた全ての要素に対して下記の処理を行う
      box.each(function(){
        $(this).append('<div class="color"></div>')
        var color = $(this).find($('.color')),
        image = $(this).find('img');
        var counter = 0;

        image.css('opacity','0');
        color.css('width','0%');
        //inviewを使って背景色が画面に現れたら処理をする
        color.on('inview', function(){
          if(counter == 0){
            $(this).delay(200).animate({'width':'100%'},speed,function(){
              image.css('opacity','1');
              $(this).css({'left':'0' , 'right':'auto'});
              $(this).animate({'width':'0%'},speed);
            })
            counter = 1;
          }
        });
      });
    

      // ローディング画面
      $(function () {
        function end_loader() {
          $('.loader').fadeOut(800);
        }
        $(window).on('load', function () {
          setTimeout(function () {
            end_loader();
          }, 3000)
        })
      })

});
