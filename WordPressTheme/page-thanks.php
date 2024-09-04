<?php get_header(); ?>
<!-- 下層ページのメインビュー -->
<section class="sub-mv">
  <div class="sub-mv__inner">
    <div class="sub-mv__img">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-contact_pc-hero.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-contact_sp-hero.jpg" alt="波打ち際">
      </picture>
    </div>
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">contact</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb'); ?>

<div class="page-thanks top-sub-contents">
  <div class="page-thanks__inner inner">
    <div class="page-thanks__content">
      <p class="page-thanks__title">お問い合わせ内容を送信完了しました。</p>
      <p class="page-thanks__messege">このたびは、お問い合わせ頂き<br class="u-mobile">誠にありがとうございます。<br>お送り頂きました内容を確認の上、<br class="u-mobile">3営業日以内に折り返しご連絡させて頂きます。<br>また、ご記入頂いたメールアドレスへ、<br class="u-mobile">自動返信の確認メールをお送りしております。</p>
    </div>
  </div>
</div>
<?php get_footer(); ?>