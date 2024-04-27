
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


});
