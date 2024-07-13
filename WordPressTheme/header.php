<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-2RBDQX6LR6"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-2RBDQX6LR6');
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="robots" content="noindex">
  <?php wp_head(); ?>
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <div class="header__logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logoLink">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo.svg" alt="CodeUps">
        </a>
      </div>
      <div class="header__drawer hamburger js-hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <nav class="header__pc-nav pc-nav">
        <ul class="pc-nav__items">
          <li class="pc-nav__item"><a href="<?php echo esc_url(home_url('/campaign/')); ?>">Campaign<span>キャンペーン</span></a></li>
          <li class="pc-nav__item"><a href="<?php echo esc_url(home_url('/about-us/')); ?>">About us<span>私たちについて</span></a></li>
          <li class="pc-nav__item"><a href="<?php echo esc_url(home_url('/information/')); ?>">Information<span>ダイビング情報</span></a></li>
          <li class="pc-nav__item"><a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog<span>ブログ</span></a></li>
          <li class="pc-nav__item"><a href="<?php echo esc_url(home_url('/voice/')); ?>">Voice<span>お客様の声</span></a></li>
          <li class="pc-nav__item"><a href="<?php echo esc_url(home_url('/price/')); ?>">Price<span>料金一覧</span></a></li>
          <li class="pc-nav__item"><a href="<?php echo esc_url(home_url('/faq/')); ?>">FAQ<span>よくある質問</span></a></li>
          <li class="pc-nav__item"><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact<span>お問い合わせ</span></a></li>
        </ul>
      </nav>
    </div>
    <nav class="header__sp-nav sp-nav js-sp-nav">
      <div class="sp-nav__item nav-contents inner">
        <div class="nav-contents__box">
          <div class="nav-contents__left">
            <div class="nav-contents__items">
              <dl class="nav-contents__item">
                <dt class="nav-contents__title js-sp-title">
                  <a href="<?php echo esc_url(home_url('/campaign/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>キャンペーン</p>
                  </a>
                </dt>
                <dd class="nav-contents__text js-sp-text"><a href="<?php echo esc_url(home_url('/campaign/')); ?>">ライセンス取得</a></dd>
                <dd class="nav-contents__text js-sp-text"><a href="<?php echo esc_url(home_url('/campaign/')); ?>">貸切体験ダイビング</a></dd>
                <dd class="nav-contents__text js-sp-text"><a href="<?php echo esc_url(home_url('/campaign/')); ?>">ナイトダイビング</a></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title js-sp-title">
                  <a href="<?php echo esc_url(home_url('/about-us/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>私たちについて</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
            </div>
            <div class="nav-contents__items">
              <dl class="nav-contents__item">
                <dt class="nav-contents__title js-sp-title">
                  <a href="<?php echo esc_url(home_url('/information/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>ダイビング情報</p>
                  </a>
                </dt>
                <dd class="nav-contents__text js-sp-text"><a href="<?php echo esc_url(home_url('/information/')); ?>?tab=information1">ライセンス講習</a></dd>
                <dd class="nav-contents__text js-sp-text"><a href="<?php echo esc_url(home_url('/information/')); ?>information/?tab=information2">ファンダイビング</a></dd>
                <dd class="nav-contents__text js-sp-text"><a href="<?php echo esc_url(home_url('/information/')); ?>information/?tab=information3">体験ダイビング</a></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title js-sp-title">
                  <a href="<?php echo esc_url(home_url('/blog/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>ブログ</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
            </div>
          </div>
          <div class="nav-contents__right">
            <div class="nav-contents__items">
              <dl class="nav-contents__item">
                <dt class="nav-contents__title js-sp-title">
                  <a href="<?php echo esc_url(home_url('/voice/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>お客様の声</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title js-sp-title">
                  <a href="<?php echo esc_url(home_url('/price/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>料金一覧</p>
                  </a>
                </dt>
                <dd class="nav-contents__text js-sp-text"><a href="<?php echo esc_url(home_url('/price/')); ?>">ライセンス講習</a></dd>
                <dd class="nav-contents__text js-sp-text"><a href="<?php echo esc_url(home_url('/price/')); ?>">ファンダイビング</a></dd>
                <dd class="nav-contents__text js-sp-text"><a href="<?php echo esc_url(home_url('/price/')); ?>">体験ダイビング</a></dd>
              </dl>
            </div>
            <div class="nav-contents__items">
              <dl class="nav-contents__item">
                <dt class="nav-contents__title js-sp-title">
                  <a href="<?php echo esc_url(home_url('/faq/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>よくある質問</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title js-sp-title">
                  <a href="<?php echo esc_url(home_url('/sitemap/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>サイトマップ</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title js-sp-title">
                  <a href="<?php echo esc_url(home_url('/privacypolicy/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>プライバシー<br>ポリシー</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title js-sp-title">
                  <a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>利用規約</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title js-sp-title">
                  <a href="<?php echo esc_url(home_url('/contact/')); ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hitode.png" alt="ヒトデ">
                    <p>お問い合わせ</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main>