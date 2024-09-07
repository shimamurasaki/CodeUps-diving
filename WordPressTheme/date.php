<?php get_header(); ?>  <!-- ヘッダー部分のテンプレートを読み込む -->

<!-- 下層ページのメインビュー -->
<section class="sub-mv">
  <div class="sub-mv__inner">
    <div class="sub-mv__img">
      <picture>
        <!-- 768px以上の幅のスクリーンに表示される画像 -->
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-blog_pc-hero.jpg" media="(min-width: 768px)">
        <!-- 768px未満の幅のスクリーンに表示される画像 -->
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-blog_sp-hero.jpg" alt="魚の群れ">
      </picture>
    </div>
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">blog</h1>  <!-- ページのタイトル -->
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb'); ?>

<div class="sub-blog top-sub-contents">
  <div class="sub-blog__inner inner">
    <div class="sub-blog__content">
      <div class="card-list card-list--2col">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="card-list__item card-list--2col__item">
            <div class="blog-card">
              <div class="blog-card__image blog-card--home__image">
                <?php if (has_post_thumbnail()) : ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                <?php else : ?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/default.jpg" alt="<?php the_title(); ?>のアイキャッチ画像">
                <?php endif; ?>
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
        <?php endwhile; else : ?>
          <p>投稿が見つかりませんでした。</p>
        <?php endif; ?>
      </div><!-- .card-list -->

      <!-- WPページナビゲーション -->
      <div class="page-navi">
        <div class="page-navi__inner">
          <?php wp_pagenavi(); ?>
        </div>
      </div>

      <!-- サイドバー -->
      <?php get_sidebar(); ?>  <!-- サイドバー部分のテンプレートを読み込む -->
    </div>
  </div>
</div>

<?php get_footer(); ?>  <!-- フッター部分のテンプレートを読み込む -->
