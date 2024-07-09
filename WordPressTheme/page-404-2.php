<?php get_header(); ?>
<div class="page-404">
  <div class="page-404__inner inner">
    <!-- パンくずリスト -->
    <div class="breadcrumb top-breadcrumb">
      <div class="breadcrumb__inner--white inner">
        <?php get_template_part('parts/breadcrumb'); ?>
      </div>
    </div>

    <div class="page-404__image">
      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/404_whale.png" alt="">
    </div>
    <div class="page-404__content">
      <div class="page-404__box">
        <div class="page-404__title">
          <p>404</p>
        </div>
        <div class="page-404__text">
          <p>申し訳ありません。<br>お探しのページが見つかりません。</p>
        </div>
        <div class="page-404__button">
          <a href="" class="common-button--white">Page TOP<span></span></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>