<?php get_header(); ?>
<!-- 下層ページのメインビュー -->

<section class="sub-mv">
  <div class="sub-mv__inner">
    <div class="sub-mv__img">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-blog_pc-hero.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-blog_sp-hero.jpg" alt="魚の群れ">
      </picture>
    </div>
    <div class="sub-mv__header">
      <p class="sub-mv__title">blog</p>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb'); ?>

<div class="sub-blog top-sub-contents">
  <div class="sub-blog__inner inner">
    <div class="sub-blog__contents">
      <div class="sub-blog__content">
        <?php if (have_posts()): while (have_posts()): the_post();
        if( !is_user_logged_in() && !is_bot() ) { //クローラーとログイン時のアクセスを閲覧数カウントから除外
          setPostViews( get_the_ID() );
          $views = get_post_meta(get_the_ID(), 'post_views_count', true);
        }
        ?>
        <div class="single-blog">
          <div class="single-blog__header">
            <time datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d'); ?></time>
            <h1 class="single-blog__title"><?php the_title(); ?></h1>
          </div>
          <div class="single-blog__image">
            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
          </div>
          <div class="single-blog__entry">
            <?php the_content(); ?>
          </div>
          <!-- WPページナビゲーション -->
          <?php
              // 前の投稿を取得
              $prev = get_previous_post();
              // 前の投稿のパーマリンクを取得（前の投稿が存在する場合）
              $prev_url = $prev ? get_permalink($prev->ID) : '#';
              // 次の投稿を取得
              $next = get_next_post();
              // 次の投稿のパーマリンクを取得（次の投稿が存在する場合）
              $next_url = $next ? get_permalink($next->ID) : '#';
          ?>
          <div class="page-navi">
            <div class="page-navi__inner inner">
              <div class="page-navi__prev">
                <!-- 前の投稿が存在する場合リンクを表示 -->
                <?php if($prev): ?>
                  <a class="previouspostslink" href="<?php echo esc_url($prev_url); ?>"></a>
                <?php endif; ?>
              </div>
              <div class="page-navi__next">
                <!-- 次の投稿が存在する場合リンクを表示 -->
                <?php if($next): ?>
                  <a class="nextpostslink" href="<?php echo esc_url($next_url); ?>"></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php endwhile; endif; ?>
        </div>
      </div>
      <!-- サイドバー -->
      <div class="sub-blog__sidebar">
          <?php get_sidebar(); ?>  <!-- サイドバー部分のテンプレートを読み込む -->
        </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>

