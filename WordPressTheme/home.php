<?php get_header(); ?>
<!-- 下層ページのメインビュー -->
<section class="sub-mv">
  <div class="sub-mv__inner">
    <div class="sub-mv__img">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-blog_pc-hero.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-blog_sp-hero.jpg" alt="魚の群れ">
    </div>
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">blog</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<div class="breadcrumb top-breadcrumb">
  <div class="breadcrumb__inner inner">
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>
</div>

<div class="sub-blog top-sub-contents">
  <div class="sub-blog__inner inner">
    <div class="sub-blog__content">
      <div class="home-blog__content">
        <div class="card-list card-list--2col">
          <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="card-list__item card-list--2col__item">
              <div class="blog-card">
                <div class="blog-card__image blog-card--home__image">
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                </div>
                <div class="blog-card__content">
                  <div class="blog-card__header">
                    <time datetime="<?php the_time('c'); ?>" class="blog-card__date"><?php the_time('Y.m/d'); ?></time>
                    <p class="blog-card__title"><?php the_title(); ?></p>
                  </div>
                </div>
                <div class="blog-card__text">
                  <p><?php the_excerpt(); ?></p>
                </div>
              </div> 
            </a>
          <?php endwhile; endif; ?>
        </div><!-- blog__item -->

        <!-- WPページナビゲーション -->
        <div class="page-navi">
          <div class="page-navi__inner">
            <?php wp_pagenavi(); ?>
          </div>
        </div>

      </div>

      <!-- サイドバー -->
      <?php get_sidebar(); ?>

    </div>
  </div>
</div>
<?php get_footer(); ?>