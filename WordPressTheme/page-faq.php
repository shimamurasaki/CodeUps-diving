<?php get_header(); ?>
<!-- 下層ページのメインビュー -->
<section class="sub-mv">
  <div class="sub-mv__inner">
    <div class="sub-mv__img">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-faq_pc-hero.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-faq_sp-hero.jpg" alt="シーサー">
      </picture>
    </div>
    <div class="sub-mv__header">
      <h1 class="sub-mv__title--faq">faq</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<div class="breadcrumb top-breadcrumb">
  <div class="breadcrumb__inner inner">
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>
</div>

<div class="page-faq top-sub-contents">
  <div class="page-faq__inner inner">
    <div class="page-faq__accordion faq-boxes">
    <?php $faq = SCF::get('faq'); foreach ($faq as $fields ) { ?>  
      <div class="faq-boxes__item faq-box">
        <h2 class="faq-box__question js-accordion-title"><?php echo esc_html( $fields['faq-question'] ); ?></h2>
        <div class="faq-box__answer js-accordion-content"><?php echo esc_html( $fields['faq-answer'] ); ?></div>
      </div>
    <?php } ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>