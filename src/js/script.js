
jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる
  //ドロワーメニュー
  $(document).ready(function() {
    // ウィンドウの幅をチェックしてドロワーメニューを制御
    function checkWidth() {
      var windowWidth = $(window).width();
      if (windowWidth >= 768) { // 幅が768px以上の場合（タブレット以上）
        $('.js-hamburger').removeClass('is-active');
        $(".js-sp-nav").hide();
      }
    }
  
    // 初期読み込み時とウィンドウのリサイズ時にチェックを実行
    checkWidth();
    $(window).resize(checkWidth);
  });
  
  $(".js-hamburger").click(function () {
    if ($('.js-hamburger').hasClass('is-active')) {
      $('.js-hamburger').removeClass("is-active");
      $(".js-sp-nav").fadeOut(300);
      $('.header__inner').css('background-color','rgba(13, 41, 54, 0.68)');
      $('body').css('overflow','scroll');
    } else {
      $('.js-hamburger').addClass("is-active");
      $(".js-sp-nav").fadeIn(300);
      $('.header__inner').css('background-color','#408F95');
      $('body').css('overflow','hidden');
    }
  });
  
  $(".js-sp-title, .js-sp-text").click(function () {
    if ($('.js-hamburger').hasClass('is-active')) {
        $('.js-hamburger').removeClass("is-active");
        $(".js-sp-nav").fadeOut(300);
        $('body').css('overflow','scroll');
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
      effect: 'fade',
    });

    //campaignスワイパー
    let campaignSwiper = new Swiper(".js-campaign-swiper", {
      loop: true,
      slidesPerView: 1.2,// 2枚目20％だけ表示
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

      //topボタン
      let topBtn = $('.top-up');
      topBtn.hide();

      // ボタンの表示設定
      $(window).scroll(function () {
        if ($(this).scrollTop() > 80) {
          // 指定px以上のスクロールでボタンを表示
          topBtn.fadeIn();
        } else {
          // 画面が指定pxより上ならボタンを非表示
          topBtn.fadeOut();
        }
      });

      //下層ページ‐タブメニュー
      $('.js-tab-trigger').on('click', function () {
        //まずは全triggerからclass削除
        $('.js-tab-trigger').removeClass('is-active');
        //次に全targetからclass削除
        $('.js-tab-target').removeClass('is-active');
        //次にクリックした要素にis-active
        $(this).addClass('is-active');
        //data属性を取得する
        let id = $(this).data("id");
        //data属性値=idが等しいものにclass付与
        $('#' + id).addClass('is-active')
      });

      //モーダル
      $(".gallery__contents img").click(function () {
        $(".gallery__display").html($(this).prop('outerHTML'));
        $(".gallery__display").fadeIn(200);
      });
      $(".gallery__display, .gallery__display img").click(function () {
          $(".gallery__display").fadeOut(200);
      });

      //サイドバー（トグルリスト）
      $('.jsToggleTitle').each(function(index) {
        var $title = $(this);
        var $content = $title.next();
    
        // 最初のタイトルだけ開いた状態にする
        if (index === 0) {
            $title.addClass('is-active');
            $content.addClass('is-open');
        }
    
        $title.on('click', function() {
            $title.toggleClass('is-active');
            $content.toggleClass('is-open');
        });
    
        $content.find('.jsChildTitle').each(function() {
            var $childTitle = $(this);
            var $childContent = $childTitle.next();
    
            $childTitle.on('click', function() {
                $childTitle.toggleClass('is-active');
                $childContent.toggleClass('is-open');
            });
        });
        });

        // FAQアコーディオン
        $('.jsAccordionTitle').next().addClass('is-open');
        $('.jsAccordionTitle').on('click', function(){
          //nextは次の要素を取得する、今回はクリック要素の次の要素にis-showクラスをつけている
          $(this).next().toggleClass('is-open');
          //クリックした要素自体にもclass付与
          $(this).toggleClass('is-active')
        });
      
    




      
});
