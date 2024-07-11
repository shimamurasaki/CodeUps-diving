<?php get_header(); ?>
<!-- 下層ページのメインビュー -->
<section class="sub-mv">
  <div class="sub-mv__inner">
    <div class="sub-mv__img">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-campaign_pc-hero.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-campaign_sp-hero.jpg" alt="海の中の色鮮やかな魚たち">
      </picture>  
    </div>
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">campaign</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<div class="breadcrumb top-breadcrumb">
  <div class="breadcrumb__inner inner">
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>
</div>


<div class="page-campaign top-sub-contents">
  <div class="page-campaign__inner inner">
    <div class="page-campaign__contents tab-menu">
      <!-- タブメニュー -->
      <ul class="tab-menu__list">
        <li class="tab-menu__item current">ALL</li>
        <li class="tab-menu__item">ライセンス講習</li>
        <li class="tab-menu__item">ファンダイビング</li>
        <li class="tab-menu__item">体験ダイビング</li>
      </ul>
    </div>

    <!-- タブコンテンツ -->
    <div class="page-campaign__contents top-page-campaign">
      <div class="page-campaign__content">
        <div class="page-campaign__card-list">
        <?php 
          // 現在のページ番号を取得。ページが指定されていない場合は1ページ目を表示する
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

          // WP_Queryを使用してカスタムクエリを作成
          $args = array(
            'post_type' => 'campaign',  // カスタム投稿タイプを指定
            'posts_per_page' => 4,  // 表示件数を4に設定
            'paged' => $paged
          );
          $custom_query = new WP_Query($args);

          if ($custom_query->have_posts()): while ($custom_query->have_posts()): $custom_query->the_post(); ?>
          <div class="page-campaign__content-item">
            <div class="page-campaign-card">
              <div class="page-campaign-card__image">
              <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
              </div>
              <div class="page-campaign-card__content">
                <div class="page-campaign-card__content-header">
                  <div class="page-campaign-card__tag">
                  <?php $cat = get_the_category();
                    $cat = $cat[0]->cat_name; ?>
                    <p><?php echo $cat ?></p>
                  </div>
                  <div class="page-campaign-card__content-title">
                    <p><?php the_title(); ?></p>
                  </div>
                </div>
                <div class="page-campaign-card__price-pop">
                  <p class="page-campaign-card__price-text">全部コミコミ(お一人様)</p>
                  <div class="page-campaign-card__price-box">
                    <p class="campaign-card__price-before">¥<?php the_field('actual-price'); ?></p>
                    <p class="page-campaign-card__price-after">¥<?php the_field('campaign-price'); ?></p>
                  </div>
                </div>
                <div class="u-desktop">
                  <div class="page-campaign-card__message">
                    <p><?php the_content(); ?></p>
                  </div>
                  <div class="page-campaign-card__comment">
                    <p class="page-campaign-card__date"><?php the_field('reservation-period__campaign'); ?></p>
                    <p class="page-campaign-card__button-text">ご予約・お問い合わせはコチラ</p>
                  </div>
                  <div class="page-campaign-card__button">
                    <a href="/contact/" class="common-button">Contact us<span></span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
        <!-- リセットポストデータ -->
        <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>

    <!-- WPページナビゲーション -->
    <div class="page-navi">
      <div class="page-navi__inner">
      <?php wp_pagenavi(array('query' => $custom_query)); ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>