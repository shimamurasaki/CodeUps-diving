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

<div class="page-contact top-sub-contents">
  <div class="page-contact__inner inner">
    <div class="form">
      <?php echo do_shortcode('[contact-form-7 id="2438d9c" title="お問い合わせ"]'); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>