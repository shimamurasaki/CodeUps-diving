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
      <h1 class="sub-mv__title">privacy Policy</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb'); ?>

<div class="page-privacyPolicy top-sub-contents">
  <div class="page-privacyPolicy__inner inner">
    <div class="page-privacyPolicy__content">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
      <div class="sub-info">
        <div class="sub-info__title">
          <p><?php the_title(); ?></p>
        </div>
        <div class="sub-info__text-box first">
          <p><?php the_field('top-text'); ?></p>
        </div>
        <div class="sub-info__text-box">
          <ol>
            <li><?php the_field('privacypolicy__ol1-1'); ?></li>
            <li><?php the_field('privacypolicy__ol1-2'); ?></li>
          </ol>
        </div>
        <div class="sub-info__text-box">
          <p><?php the_field('in-text'); ?></p>
          <ol>
            <li><?php the_field('privacypolicy__ol2'); ?></li>
          </ol>
        </div>
        <div class="sub-info__text-box">
          <p><?php the_field('privacypolicy__li1'); ?></p>
          <ol>
            <li><?php the_field('privacypolicy__ol3'); ?></li>
          </ol>
        </div>
        <div class="sub-info__text-box">
          <p><?php the_field('privacypolicy__li2'); ?></p>
          <ol>
            <li><?php the_field('privacypolicy__ol4-1'); ?></li>
            <li><?php the_field('privacypolicy__ol4-2'); ?></li>
            <li><?php the_field('privacypolicy__ol4-3'); ?></li>
            <li><?php the_field('privacypolicy__ol4-4'); ?></li>
          </ol>
        </div>
        <div class="sub-info__text-box">
          <p><?php the_field('bottom-text'); ?></p>
        </div>
      </div>
    <?php endwhile; endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>