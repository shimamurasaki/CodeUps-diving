<?php get_header(); ?>

<section class="mv">
  <div class="mv__inner">
    <div class="mv__header">
      <h1 class="mv__title">diving</h1>
      <p class="mv__subtitle">into the ocean</p>
    </div>
    <!-- Swiper -->
    <div class="swiper mv__swiper js-mv-swiper">
      <div class="swiper-wrapper mv__images">
        <div class="swiper-slide mv__img">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/pc-hero_1.jpg" media="(min-width: 768px)">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sp-hero_1.jpg" alt="ウミガメ">
          </picture>
        </div>
        <div class="swiper-slide mv__img">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/pc-hero_2.jpg" media="(min-width: 768px)">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sp-hero_2.jpg" alt="ウミガメとの出会い">
          </picture>
        </div>     
        <div class="swiper-slide mv__img">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/pc-hero_3.jpg" media="(min-width: 768px)">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sp-hero_3.jpg" alt="青い空と海">
          </picture>
        </div>
        <div class="swiper-slide mv__img">
          <picture>
            <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/pc-hero_4.jpg" media="(min-width: 768px)">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sp-hero_4.jpg" alt="きれいな砂浜">
          </picture>
        </div>
      </div>
    </div>
    <!-- Swiper -->
  </div>
</section>

<section class="campaign top-campaign" id="campaign">
  <div class="campaign__inner inner">
    <div class="campaign__header">
      <div class="section-header">
        <p class="section-header__entitle">Campaign</p>
        <h2 class="section-header__title">キャンペーン</h2>
      </div>
    </div>
    <div class="campaign__swiper-btn">
      <div class="js-campaign-button-next campaign__next-btn"><span></span></div>
      <div class="js-campaign-button-prev campaign__prev-btn"><span></span></div>
    </div>
    <!-- Swiper -->
    <div class="swiper campaign__contents js-campaign-swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide campaign__content">
          <div class="campaign-card">
            <div class="campaign-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_1.jpg" alt="海の中の色鮮やかな魚たち">
            </div>
            <div class="campaign-card__content">
              <div class="campaign-card__header">
                <div class="campaign-card__tag">
                  <p>ライセンス講習</p>
                </div>
                <div class="campaign-card__title">
                  <p>ライセンス取得</p>
                </div>
              </div>
              <div class="campaign-card__price-pop">
                <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                <div class="campaign-card__price-box">
                  <p class="campaign-card__price-before">¥56,000</p>
                  <p class="campaign-card__price-after">¥46,000</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- swiper-slideここまで -->
        <div class="swiper-slide campaign__content">
          <div class="campaign-card">
            <div class="campaign-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_2.jpg" alt="透き通った海とそこに浮かぶ船">
            </div>
            <div class="campaign-card__content">
              <div class="campaign-card__header">
                <div class="campaign-card__tag">
                  <p>体験ダイビング</p>
                </div>
                <div class="campaign-card__title">
                  <p>貸切体験ダイビング</p>
                </div>
              </div>
              <div class="campaign-card__price-pop">
                <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                <div class="campaign-card__price-box">
                  <p class="campaign-card__price-before">¥24,000</p>
                  <p class="campaign-card__price-after">¥18,000</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- swiper-slideここまで -->
        <div class="swiper-slide campaign__content">
          <div class="campaign-card">
            <div class="campaign-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_3.jpg" alt="夜の海中を泳ぐクラゲ">
            </div>
            <div class="campaign-card__content">
              <div class="campaign-card__header">
                <div class="campaign-card__tag">
                  <p>体験ダイビング</p>
                </div>
                <div class="campaign-card__title">
                  <p>ナイトダイビング</p>
                </div>
              </div>
              <div class="campaign-card__price-pop">
                <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                <div class="campaign-card__price-box">
                  <p class="campaign-card__price-before">¥10,000</p>
                  <p class="campaign-card__price-after">¥8,000</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- swiper-slideここまで -->
        <div class="swiper-slide campaign__content">
          <div class="campaign-card">
            <div class="campaign-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_4.jpg" alt="ダイビング体験">
            </div>
            <div class="campaign-card__content">
              <div class="campaign-card__header">
                <div class="campaign-card__tag">
                  <p>ファンダイビング</p>
                </div>
                <div class="campaign-card__title">
                  <p>貸切ファンダイビング</p>
                </div>
              </div>
              <div class="campaign-card__price-pop">
                <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                <div class="campaign-card__price-box">
                  <p class="campaign-card__price-before">¥20,000</p>
                  <p class="campaign-card__price-after">¥16,000</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide campaign__content">
          <div class="campaign-card">
            <div class="campaign-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_1.jpg" alt="海の中の色鮮やかな魚たち">
            </div>
            <div class="campaign-card__content">
              <div class="campaign-card__header">
                <div class="campaign-card__tag">
                  <p>ライセンス講習</p>
                </div>
                <div class="campaign-card__title">
                  <p>ライセンス取得</p>
                </div>
              </div>
              <div class="campaign-card__price-pop">
                <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                <div class="campaign-card__price-box">
                  <p class="campaign-card__price-before">¥56,000</p>
                  <p class="campaign-card__price-after">¥46,000</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- swiper-slideここまで -->
        <div class="swiper-slide campaign__content">
          <div class="campaign-card">
            <div class="campaign-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_2.jpg" alt="透き通った海とそこに浮かぶ船">
            </div>
            <div class="campaign-card__content">
              <div class="campaign-card__header">
                <div class="campaign-card__tag">
                  <p>体験ダイビング</p>
                </div>
                <div class="campaign-card__title">
                  <p>貸切体験ダイビング</p>
                </div>
              </div>
              <div class="campaign-card__price-pop">
                <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                <div class="campaign-card__price-box">
                  <p class="campaign-card__price-before">¥24,000</p>
                  <p class="campaign-card__price-after">¥18,000</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- swiper-slideここまで -->
        <div class="swiper-slide campaign__content">
          <div class="campaign-card">
            <div class="campaign-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_3.jpg" alt="夜の海中を泳ぐクラゲ">
            </div>
            <div class="campaign-card__content">
              <div class="campaign-card__header">
                <div class="campaign-card__tag">
                  <p>体験ダイビング</p>
                </div>
                <div class="campaign-card__title">
                  <p>ナイトダイビング</p>
                </div>
              </div>
              <div class="campaign-card__price-pop">
                <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                <div class="campaign-card__price-box">
                  <p class="campaign-card__price-before">¥10,000</p>
                  <p class="campaign-card__price-after">¥8,000</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- swiper-slideここまで -->
        <div class="swiper-slide campaign__content">
          <div class="campaign-card">
            <div class="campaign-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign_4.jpg" alt="ダイビング体験">
            </div>
            <div class="campaign-card__content">
              <div class="campaign-card__header">
                <div class="campaign-card__tag">
                  <p>ファンダイビング</p>
                </div>
                <div class="campaign-card__title">
                  <p>貸切ファンダイビング</p>
                </div>
              </div>
              <div class="campaign-card__price-pop">
                <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                <div class="campaign-card__price-box">
                  <p class="campaign-card__price-before">¥20,000</p>
                  <p class="campaign-card__price-after">¥16,000</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Swiper -->
    <div class="campaign__button">
      <a href="./page-campaign.html" class="common-button">View more<span></span></a>
    </div>
  </div>
</section>

<section class="about top-about" id="about">
  <div class="about__inner inner">
    <div class="about__header">
      <div class="section-header">
        <p class="section-header__entitle">About us</p>
        <h2 class="section-header__title">私たちについて</h2>
      </div>
    </div>
    <div class="about__item top-about__item">
      <div class="about__images">
        <div class="about__left">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_1.jpg" alt="屋根の上にいるシーサー">
        </div>
        <div class="about__right">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_2.jpg" alt="海の中の色鮮やかな魚たち">
        </div>
      </div>
      <div class="about__contents">
        <div class="about__title">
          <p>Dive into<br>the Ocean</p>
        </div>
        <div class="about-content">
          <p class="about__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。</p>
          <div class="about__button">
            <a href="./page-aboutus.html" class="common-button">View more<span></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="information top-information" id="information">
  <div class="information__inner inner">
    <div class="information__header">
      <div class="section-header">
        <p class="section-header__entitle">Information</p>
        <h2 class="section-header__title">ダイビング情報</h2>
      </div>
    </div>
    <div class="information__contents">
      <div class="information__image colorbox">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information.jpg" alt="海の中を泳ぐ魚たち">
      </div>
      <div class="information__content">
        <div class="information__info">
          <p class="information__title">ライセンス講習</p>
          <p class="information__text">当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。</p>
        </div>
        <div class="information__button">
          <a href="./page-information.html" class="common-button">View more<span></span></a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="blog blog-bg" id="blog">
  <div class="blog__inner inner">
    <div class="blog__header">
      <div class="section-header">
        <p class="section-header__entitle--white">Blog</p>
        <h2 class="section-header__title--white">ブログ</h2>
      </div>
    </div>
    <div class="blog__items">
      <div class="card-list">
        <a class="card-list__item">
          <div class="blog-card">
            <div class="blog-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog_1.jpg" alt="">
            </div>
            <div class="blog-card__content">
              <div class="blog-card__header">
                <time datetime="2023-11-17" class="blog-card__date">2023.11/17</time>
                <p class="blog-card__title">ライセンス取得</p>
              </div>
            </div>
            <div class="blog-card__text">
              <p>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
            </div>
          </div> 
        </a>
        <a class="card-list__item">
          <div class="blog-card">
            <div class="blog-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog_2.jpg" alt="">
            </div>
            <div class="blog-card__content">
              <div class="blog-card__header">
                <time datetime="2023-11-17" class="blog-card__date">2023.11/17</time>
                <p class="blog-card__title">ウミガメと泳ぐ</p>
              </div>
            </div>
            <div class="blog-card__text">
              <p>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
            </div>
          </div>
        </a>
        <a class="card-list__item">
          <div class="blog-card">
            <div class="blog-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog_3.jpg" alt="">
            </div>
            <div class="blog-card__content">
              <div class="blog-card__header">
                <time datetime="2023-11-17" class="blog-card__date">2023.11/17</time>
                <p class="blog-card__title">カクレクマノミ</p>
              </div>
            </div>
            <div class="blog-card__text">
              <p>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
            </div>
          </div>
        </a>
      </div><!-- blog__item -->
    </div><!-- blog__list -->
    <div class="blog__button">
      <a href="./home-blog.html" class="common-button">View more<span></span></a>
    </div>
  </div>
</section>

<section class="voice top-voice" id="voice">
  <div class="voice__inner inner">
    <div class="voice__header">
      <div class="section-header">
        <p class="section-header__entitle">Voice</p>
        <h2 class="section-header__title">お客様の声</h2>
      </div>
    </div>
    <div class="voice__items">
      <div class="sheet-list">
        <div class="sheet-list__item">
          <div class="guest-card">
            <div class="guest-card__contents">
              <div class="guest-card__content">
                <div class="guest-card__header">
                  <p class="guest-card__info">20代(女性)</p>
                  <div class="guest-card__tag">
                    <p>ライセンス講習</p>
                  </div>
                </div>
                <div class="guest-card__title">
                  <p>ここにタイトルが入ります。ここにタイトル</p>
                </div>
              </div>
              <div class="guest-card__image  colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice_1.jpg" alt="女性のお客様">
              </div>
            </div>
            <div class="guest-card__text">
              <p>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。</p>
            </div>
          </div>
        </div><!-- sheet-list__item -->
        <div class="sheet-list__item">
          <div class="guest-card">
            <div class="guest-card__contents">
              <div class="guest-card__content">
                <div class="guest-card__header">
                  <p class="guest-card__info">30代(男性)</p>
                  <div class="guest-card__tag">
                    <p>ファンダイビング</p>
                  </div>
                </div>
                <div class="guest-card__title">
                  <p>ここにタイトルが入ります。ここにタイトル</p>
                </div>
              </div>
              <div class="guest-card__image  colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice_2.jpg" alt="男性のお客様">
              </div>
            </div>
            <div class="guest-card__text">
              <p>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。</p>
            </div>
          </div>
        </div><!-- sheet-list__item -->
      </div><!-- sheet-list -->
    </div><!-- voice__items -->
    <div class="voice__button">
      <a href="./archive-voice.html" class="common-button">View more<span></span></a>
    </div>
  </div>
</section>

<section class="price top-price" id="price">
  <div class="price__inner inner">
    <div class="price__header">
      <div class="section-header">
        <p class="section-header__entitle">Price</p>
        <h2 class="section-header__title">料金一覧</h2>
      </div>
    </div>
    <div class="price__contents">
      <div class="price__image colorbox">
        <picture>
          <source media="(min-width: 768px)" srcset="/assets/images/common/price-pc.jpg">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-sp.jpg" alt="海中のウミガメ">
        </picture>
      </div>
      <div class="price__content">
        <div class="price__list">
          <div class="price__list-items">
            <p class="price__list-title">ライセンス講習</p>
            <ul class="price__list-item">
              <li>オープンウォーターダイバーコース</li>
              <li class="price__money">¥50,000</li>
            </ul>
            <ul class="price__list-item">
              <li>アドバンスドオープンウォーターコース</li>
              <li class="price__money">¥60,000</li>
            </ul>
            <ul class="price__list-item">
              <li>レスキュー＋EFRコース</li>
              <li class="price__money">¥70,000</li>
            </ul>
          </div>
        </div>
        <div class="price__list">
          <div class="price__list-items">
            <p class="price__list-title">体験ダイビング</p>
            <ul class="price__list-item">
              <li>ビーチ体験ダイビング(半日)</li>
              <li class="price__money">¥7,000</li>
            </ul>
            <ul class="price__list-item">
              <li>ビーチ体験ダイビング(1日)</li>
              <li class="price__money">¥14,000</li>
            </ul>
            <ul class="price__list-item">
              <li>ボート体験ダイビング(半日)</li>
              <li class="price__money">¥10,000</li>
            </ul>
            <ul class="price__list-item">
              <li>ボート体験ダイビング(1日)</li>
              <li class="price__money">¥18,000</li>
            </ul>
          </div>
        </div>
        <div class="price__list">
          <div class="price__list-items">
            <p class="price__list-title">ファンダイビング</p>
            <ul class="price__list-item">
              <li>ビーチダイビング(2ダイブ)</li>
              <li class="price__money">¥14,000</li>
            </ul>
            <ul class="price__list-item">
              <li>ボートダイビング(2ダイブ)</li>
              <li class="price__money">¥18,000</li>
            </ul>
            <ul class="price__list-item">
              <li>スペシャルダイビング(2ダイブ)</li>
              <li class="price__money">¥24,000</li>
            </ul>
            <ul class="price__list-item">
              <li>ナイトダイビング(1ダイブ)</li>
              <li class="price__money">¥10,000</li>
            </ul>
          </div>
        </div>
        <div class="price__list">
          <div class="price__list-items">
            <p class="price__list-title">スペシャルダイビング</p>
            <ul class="price__list-item">
              <li>貸切ダイビング(2ダイブ)</li>
              <li class="price__money">¥24,000</li>
            </ul>
            <ul class="price__list-item">
              <li>1日ダイビング(3ダイブ)</li>
              <li class="price__money">¥32,000</li>
            </ul>
          </div>
        </div>
      </div><!-- price__content -->
    </div><!-- price__contents -->
    <div class="price__button">
      <a href="./page-price.html" class="common-button">View more<span></span></a>
    </div>
  </div>
</section>

<?php get_footer(); ?>