<?php get_header(); ?>
<!-- 下層ページのメインビュー -->
<section class="sub-mv">
  <div class="sub-mv__inner">
    <div class="sub-mv__img">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-information_pc-hero.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-information_sp-hero.jpg" alt="ダイビング">
      </picture>
    </div>
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Information</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb'); ?>

<div class="page-information top-sub-contents">
  <div class="page-information__inner inner">
    <div class="page-information__contents tab-info">
      <!-- タブメニュー -->
      <ul class="tab-info__items">
        <li class="tab-info__list">
          <span class="tab-info__header js-tab-info is-active" data-id="information1"><span class="whale"></span>ライセンス<br class="u-mobile">講習</span>
        </li>
        <li class="tab-info__list">
          <span class="tab-info__header js-tab-info" data-id="information2"><span class="shark"></span>ファン<br class="u-mobile">ダイビング</span>
        </li>
        <li class="tab-info__list">
          <span class="tab-info__header js-tab-info" data-id="information3"><span class="small-fish"></span>体験<br class="u-mobile">ダイビング</span>
        </li>
      </ul>
      <!-- タブコンテンツ -->
      <div class="tab-info__contents top-tab-info">
        <div class="tab-info__content js-tab-box is-active" id="information1">
          <div class="tab-info__text">
            <div class="tab-info__title">
              <p>ライセンス講習</p>
            </div>
            <div class="tab-info__message">
              <p>泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！</p>
            </div>
          </div>
          <div class="tab-info__image">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/license.jpg" alt="ライセンス講習">
          </div>
        </div>
        <div class="tab-info__content js-tab-box" id="information2">
          <div class="tab-info__text">
            <div class="tab-info__title">
              <p>ファンダイビング</p>
            </div>
            <div class="tab-info__message">
              <p>ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！</p>
            </div>
          </div>
          <div class="tab-info__image">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/fundiving.jpg" alt="ファンダイビング">
          </div>
        </div>
        <div class="tab-info__content js-tab-box" id="information3">
          <div class="tab-info__text">
            <div class="tab-info__title">
              <p>体験ダイビング</p>
            </div>
            <div class="tab-info__message">
              <p>ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！</p>
            </div>
          </div>
          <div class="tab-info__image">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/diving.jpg" alt="体験ダイビング">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>