<?php get_header(); ?>
<!-- 下層ページのメインビュー -->
<section class="sub-mv">
  <div class="sub-mv__inner">
    <div class="sub-mv__img">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-site_pc-hero.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-site_sp-hero.jpg" alt="サンゴと魚たち">
      </picture>
    </div>
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">site MAP</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<div class="breadcrumb top-breadcrumb">
  <div class="breadcrumb__inner inner">
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>
</div>

<div class="page-siteMAP top-sub-contents">
  <div class="page-siteMAP__inner inner">
    <div class="page-siteMAP__content">
      <div class="nav-contents">
        <div class="nav-contents__box">
          <div class="nav-contents__left page-siteMAP__content-left">
            <div class="nav-contents__items">
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="/campaign/">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/navy_hitode.png" alt="ヒトデ">
                    <p>キャンペーン</p>
                  </a>
                </dt>
                <dd class="nav-contents__text"><a href="/campaign/">ライセンス取得</a></dd>
                <dd class="nav-contents__text"><a href="/campaign/">貸切体験ダイビング</a></dd>
                <dd class="nav-contents__text"><a href="/campaign/">ナイトダイビング</a></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="/about-us/">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/navy_hitode.png" alt="ヒトデ">
                    <p>私たちについて</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
            </div>
            <div class="nav-contents__items">
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="/information/">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/navy_hitode.png" alt="ヒトデ">
                    <p>ダイビング情報</p>
                  </a>
                </dt>
                <dd class="nav-contents__text"><a href="/information/?tab=information1">ライセンス講習</a></dd>
                <dd class="nav-contents__text"><a href="/information/?tab=information2">体験ダイビング</a></dd>
                <dd class="nav-contents__text"><a href="/information/?tab=information3">ファンダイビング</a></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="/blog/">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/navy_hitode.png" alt="ヒトデ">
                    <p>ブログ</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
            </div>
          </div>
          <div class="nav-contents__right page-siteMAP__content-right">
            <div class="nav-contents__items">
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="/voice/">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/navy_hitode.png" alt="ヒトデ">
                    <p>お客様の声</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="/price/">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/navy_hitode.png" alt="ヒトデ">
                    <p>料金一覧</p>
                  </a>
                </dt>
                <dd class="nav-contents__text"><a href="/price/">ライセンス講習</a></dd>
                <dd class="nav-contents__text"><a href="/price/">体験ダイビング</a></dd>
                <dd class="nav-contents__text"><a href="/price/">ファンダイビング</a></dd>
              </dl>
            </div>
            <div class="nav-contents__items">
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="/faq/">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/navy_hitode.png" alt="ヒトデ">
                    <p>よくある質問</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="/site-map/">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/navy_hitode.png" alt="ヒトデ">
                    <p>サイトマップ</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="/privacypolicy/">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/navy_hitode.png" alt="ヒトデ">
                    <p>プライバシー<br class="u-mobile">ポリシー</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="/terms-of-service/">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/navy_hitode.png" alt="ヒトデ">
                    <p>利用規約</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
              <dl class="nav-contents__item">
                <dt class="nav-contents__title">
                  <a href="/contact/">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/navy_hitode.png" alt="ヒトデ">
                    <p>お問い合わせ</p>
                  </a>
                </dt>
                <dd></dd>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>