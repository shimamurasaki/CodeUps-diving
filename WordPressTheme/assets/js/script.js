"use strict";

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる
  //ドロワーメニュー
  $(document).ready(function () {
    // ウィンドウの幅をチェックしてドロワーメニューを制御
    function checkWidth() {
      var windowWidth = $(window).width();
      if (windowWidth >= 768) {
        // 幅が768px以上の場合（タブレット以上）
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
      $('.header__inner').css('background-color', 'rgba(13, 41, 54, 0.68)');
      $('body').css('overflow', 'scroll');
    } else {
      $('.js-hamburger').addClass("is-active");
      $(".js-sp-nav").fadeIn(300);
      $('.header__inner').css('background-color', '#408F95');
      $('body').css('overflow', 'hidden');
    }
  });
  $(".js-sp-title, .js-sp-text").click(function () {
    if ($('.js-hamburger').hasClass('is-active')) {
      $('.js-hamburger').removeClass("is-active");
      $(".js-sp-nav").fadeOut(300);
      $('body').css('overflow', 'scroll');
    } else {
      $('.js-hamburger').addClass("is-active");
      $(".js-sp-nav").fadeIn(300);
    }
  });

  //mvスワイパー
  var mvSwiper = new Swiper(".js-mv-swiper", {
    loop: true,
    autoplay: {
      delay: 3000
    },
    effect: 'fade'
  });

  //campaignスワイパー
  var campaignSwiper = new Swiper(".js-campaign-swiper", {
    loop: true,
    slidesPerView: 1.2,
    // 2枚目20％だけ表示
    grabCursor: true,
    // カーソルを置いたときに指のカーソルを表示
    navigation: {
      nextEl: ".js-campaign-button-next",
      prevEl: ".js-campaign-button-prev"
    },
    clickable: true
  });

  //背景色の後に画像やテキストが表示されるエフェクト
  //要素の取得とスピードの設定
  var box = $(".js-colorbox"),
    speed = 700;

  //.colorboxの付いた全ての要素に対して下記の処理を行う
  box.each(function () {
    $(this).append('<div class="color"></div>');
    var color = $(this).find($(".color")),
      image = $(this).find("img");
    var counter = 0;
    image.css("opacity", "0");
    color.css("width", "0%");
    //inviewを使って背景色が画面に現れたら処理をする
    color.on("inview", function () {
      if (counter == 0) {
        $(this).delay(200).animate({
          width: "100%"
        }, speed, function () {
          image.css("opacity", "1");
          $(this).css({
            left: "0",
            right: "auto"
          });
          $(this).animate({
            width: "0%"
          }, speed);
        });
        counter = 1;
      }
    });
  });

  // topボタン
  var topBtn = $('.top-up');
  topBtn.hide(); // 初期は非表示
  // ボタンの表示設定
  $(window).scroll(function () {
    var scrollTop = $(this).scrollTop();
    var footerHeight = $('footer').outerHeight(); // フッターの高さを取得
    var windowHeight = $(window).height(); // 画面の高さを取得
    var documentHeight = $(document).height(); // ドキュメント全体の高さを取得
    // 指定px以上のスクロールでボタンを表示
    if (scrollTop > 80) {
      topBtn.fadeIn();
    } else {
      topBtn.fadeOut();
    }
    // フッター手前でボタンを固定する処理
    if (scrollTop + windowHeight > documentHeight - footerHeight) {
      // ボタンがフッターの手前で止まるように設定
      var stopPosition = documentHeight - footerHeight - windowHeight + 20; // フッター手前20pxに配置
      topBtn.css({
        'position': 'absolute',
        'bottom': stopPosition + 'px' // フッター手前で固定
      });
    } else {
      // フッターより上では、画面の下部にボタンを固定
      topBtn.css({
        'position': 'fixed',
        'bottom': '20px' // 通常時の位置
      });
    }
  });

  //モーダル
  $(".gallery__contents img").click(function () {
    $(".gallery__display").html($(this).prop('outerHTML'));
    $(".gallery__display").fadeIn(200);
    // 背景を固定してスクロールさせない
    $('html, body').css('overflow', 'hidden');
  });
  $(".gallery__display, .gallery__display img").click(function () {
    $(".gallery__display").fadeOut(200);
    // 背景の固定を解除する
    $('html, body').removeAttr('style');
  });

  // 下層ページ‐informationタブ
  $('.js-tab-info').on('click', function () {
    //まずは全triggerからclass削除
    $('.js-tab-info').removeClass('is-active');
    //次に全targetからclass削除
    $('.js-tab-box').removeClass('is-active');
    //次にクリックした要素にis-active
    $(this).addClass('is-active');
    //data属性を取得する
    var id = $(this).data("id");
    //data属性値=idが等しいものにclass付与
    $('#' + id).addClass('is-active');
  });

  // クエリパラメータを取得し、デフォルト値を設定
  var params = new URLSearchParams(window.location.search);
  console.log("const params = new URLSearchParams(window.location.search)は何を示してる？ >>> " + params);
  var defaultTab = 'information1';
  var tabParam = params.get('tab') || defaultTab;
  console.log("const tab = params.get('tab')の示している内容 >>> " + tabParam);

  // タブ要素とタブボックス要素の取得
  var tablist = document.querySelectorAll('.js-tab-info');
  console.log("const tablist = document.querySelectorAll('.js-tab-info')の示している内容 >>> " + tablist);
  var tabbox = document.querySelectorAll('.js-tab-box');
  console.log("const tabbox = document.querySelectorAll('.js-tab-box')の示している内容 >>> " + tabbox);

  // 既存のis-activeクラスをリセット
  tablist.forEach(function (tabElement) {
    tabElement.classList.remove('is-active');
  });

  // クエリパラメーターに基づくクラスの追加
  tablist.forEach(function (tabElement) {
    var dataId = tabElement.getAttribute('data-id');
    if (dataId !== null) {
      console.log("dataId >>> " + dataId);
      console.log("tabElement >>> " + tabElement);
      if (tabParam === dataId) {
        tabElement.classList.add('is-active');
      }
    } else {
      console.warn('data-id属性が存在しません:', tabElement);
    }
  });

  // タブボックス要素のクラスリセット
  tabbox.forEach(function (tabElement) {
    tabElement.classList.remove('is-active');
  });

  // クエリパラメーターに基づくクラスの追加
  tabbox.forEach(function (tabElement) {
    var Id = tabElement.getAttribute('id');
    if (Id !== null) {
      console.log("dataId >>> " + Id);
      console.log("tabElement >>> " + tabElement);
      if (tabParam === Id) {
        tabElement.classList.add('is-active');
      }
    } else {
      console.warn('data-id属性が存在しません:', tabElement);
    }
  });

  //サイドバー（トグルリスト）
  $('.toggle-list__content.first').show().prev('.jsToggleTitle').addClass('is-active');
  $(document).ready(function () {
    $('.jsToggleTitle').click(function () {
      $(this).toggleClass('is-active');
      $(this).next('.toggle-list__content').slideToggle();
    });
  });

  // FAQアコーディオン
  $(document).ready(function () {
    $('.js-accordion-content:first').show();
    $('.js-accordion-title').on('click', function () {
      $(this).next().slideToggle();
      $(this).toggleClass('is-active');
    });
  });
});