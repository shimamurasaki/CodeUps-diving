
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
    let id = $(this).data("id");
    //data属性値=idが等しいものにclass付与
    $('#' + id).addClass('is-active')
  });

  // クエリパラメータを取得し、デフォルト値を設定
  const params = new URLSearchParams(window.location.search);
  console.log("const params = new URLSearchParams(window.location.search)は何を示してる？ >>> " + params);

  const defaultTab = 'information1';
  const tabParam = params.get('tab') || defaultTab;
  console.log("const tab = params.get('tab')の示している内容 >>> " + tabParam);

  // タブ要素とタブボックス要素の取得
  const tablist = document.querySelectorAll('.js-tab-info');
  console.log("const tablist = document.querySelectorAll('.js-tab-info')の示している内容 >>> " + tablist);

  const tabbox = document.querySelectorAll('.js-tab-box');
  console.log("const tabbox = document.querySelectorAll('.js-tab-box')の示している内容 >>> " + tabbox);

  // 既存のis-activeクラスをリセット
  tablist.forEach(function (tabElement) {
    tabElement.classList.remove('is-active');
  });

  // クエリパラメーターに基づくクラスの追加
  tablist.forEach(function (tabElement) {
    const dataId = tabElement.getAttribute('data-id');
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
    const Id = tabElement.getAttribute('id');
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
  $(document).ready(function() {
    $('.jsToggleTitle').click(function() {
      $(this).toggleClass('is-active');
      $(this).next('.toggle-list__content').slideToggle();
    });
  });


  // FAQアコーディオン
  $(document).ready(function(){
    $('.js-accordion-content:first').show();
    $('.js-accordion-title').on('click', function(){
      $(this).next().slideToggle();
      $(this).toggleClass('is-active');
    });
  });

  // お問い合わせフォームエラーメッセージ
  $("#form").click(function () {
    $(".form__error").toggleClass('is-active');
  });

  //お問い合わせフォームエラー
  $(document).ready(function() {
    $('#js-submit').click(function(event) {
      event.preventDefault(); // フォームの送信を防止

      // 必須フィールドを取得
      var nameField = $('#name');
      var emailField = $('#email');
      var telField = $('#tel');
      var messageField = $('textarea[name="contents"]');
      var privacyCheck = $('#privacyCheck');

      // エラーメッセージ要素を取得
      var nameError = $('#name-error');
      var emailError = $('#email-error');
      var telError = $('#tel-error');
      var messageError = $('#message-error');
      var privacyError = $('#privacy-error');

      // 全てのエラーメッセージを一旦非表示にする
      $('.form__error').hide();

      // 入力フィールドのエラースタイルをリセット
      resetErrorStyles();

      // バリデーションフラグ
      var isValid = true;

      // バリデーションチェック
      if (!nameField.val().trim()) {
          setErrorStyle(nameField.closest('.form__input'));
          nameError.show();
          isValid = false;
      }

      if (!emailField.val().trim()) {
          setErrorStyle(emailField.closest('.form__input'));
          emailError.show();
          isValid = false;
      }

      if (!telField.val().trim()) {
          setErrorStyle(telField.closest('.form__input'));
          telError.show();
          isValid = false;
      }

      if (!messageField.val().trim()) {
          setErrorStyle(messageField.closest('.form__textarea'));
          messageError.show();
          isValid = false;
      }

      if (!privacyCheck.is(':checked')) {
          setErrorStyle(privacyCheck.closest('.form__privacyCheck'));
          privacyError.show();
          isValid = false;
      }

      // エラーがあればエラーメッセージを表示
      if (!isValid) {
          $('.form__error').css('display', 'flex');
      } else {
          // フォームを送信する処理をここに追加
          // ここではデモとしてアラートを表示します
          alert('フォームの送信が完了しました！');
          // リダイレクト先のURL
          var redirectUrl = './page-thanks.html';
          // ページをリダイレクトする
          window.location.href = redirectUrl;
          // フォームの実際の送信処理を追加する場合はここに記述
          // $('#form').submit();
      }
    });
    
    function setErrorStyle(element) {
        element.addClass('error');
    }

    function resetErrorStyles() {
        $('.form__input.error, .form__textarea.error, .form__checkbox.error, .form__privacyCheck.error').removeClass('error');
    }
  });
    
    



      
});

