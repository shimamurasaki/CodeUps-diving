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
<div class="breadcrumb top-breadcrumb">
  <div class="breadcrumb__inner inner">
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>
</div>

<div class="sub-blog top-sub-contents">
  <div class="sub-blog__inner inner">
    <div class="sub-blog__content">
      <?php if (have_posts()): while (have_posts()): the_post();
      if( !is_user_logged_in() && !is_bot() ) { //クローラーとログイン時のアクセスを閲覧数カウントから除外
        setPostViews( get_the_ID() );
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
          $prev = get_previous_post();
          $prev_url = get_permalink($prev -> ID);
          $next = get_next_post();
          $next_url = get_permalink($next -> ID);
         ?>
        <div class="page-navi inner">
          <div class="wp-pagenavi">
            <div class="wp-pagenavi__prev">
              <?php if($prev): ?>
              <a class="page smaller" href="#"></a>
              <?php endif; ?>
            </div>
            <div class="wp-pagenavi__next">
              <?php if($next): ?>
              <a class="page smaller" href="#"></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endwhile; endif; ?>

      </div>

      <!-- サイドバー -->
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>