<?php get_header(); ?>
<!-- 下層ページのメインビュー -->
<section class="sub-mv">
  <div class="sub-mv__inner">
    <div class="sub-mv__img">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-voice_pc-hero.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-voice_sp-hero.jpg" alt="ライセンス講習">
      </picture>
    </div>
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">voice</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<div class="breadcrumb top-breadcrumb">
  <div class="breadcrumb__inner inner">
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>
</div>

<div class="archive-voice top-sub-contents">
  <div class="archive-voice__inner inner">
    <div class="archive-voice__contents tab-menu">
      <!-- タブメニュー -->
      <ul class="tab-menu__list">
        <li class="tab-menu__item current">ALL</li>
        <li class="tab-menu__item">ライセンス講習</li>
        <li class="tab-menu__item">ファンダイビング</li>
        <li class="tab-menu__item">体験ダイビング</li>
      </ul>
    </div>

    <!-- タブコンテンツ -->
    <div class="archive-voice__contents top-archive-voice">
      <div class="archive-voice__content">
        <div class="sheet-list">
        <?php 
          // 現在のページ番号を取得。ページが指定されていない場合は1ページ目を表示する
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

          // WP_Queryを使用してカスタムクエリを作成
          $args = array(
            'post_type' => 'voice',  // カスタム投稿タイプを指定
            'posts_per_page' => 6,  // 表示件数を6に設定
            'paged' => $paged
          );
          $custom_query = new WP_Query($args);

          if ($custom_query->have_posts()): while ($custom_query->have_posts()): $custom_query->the_post(); ?>
          <div class="sheet-list__item">
            <div class="guest-card">
              <div class="guest-card__contents">
                <div class="guest-card__content">
                  <div class="guest-card__header">
                    <p class="guest-card__info"><?php the_tags( '', '', '' ); ?></p>
                    <div class="guest-card__tag">
                    <?php $cat = get_the_category();
                    $cat = $cat[0]->cat_name; ?>
                      <p><?php echo $cat ?></p>
                    </div>
                  </div>
                  <div class="guest-card__title">
                    <p><?php the_title(); ?></p>
                  </div>
                </div>
                <div class="guest-card__image">
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                </div>
              </div>
              <div class="guest-card__text">
                <p><?php the_content(); ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
        <!-- リセットポストデータ -->
        <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div> 
  </div>
</div>

<!-- WPページナビゲーション -->
<div class="page-navi">
  <div class="page-navi__inner">
  <?php wp_pagenavi(array('query' => $custom_query)); ?>
  </div>
</div>
<?php get_footer(); ?>