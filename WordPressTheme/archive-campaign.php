<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
<section class="sub-mv">
  <div class="sub-mv__inner">
    <div class="sub-mv__img">
      <picture>
        <source srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/sub-campaign_pc-hero.jpg')); ?>" media="(min-width: 768px)">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/sub-campaign_sp-hero.jpg')); ?>" alt="海の中の色鮮やかな魚たち">
      </picture>  
    </div>
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">campaign</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb'); ?>

<div class="page-campaign top-sub-contents">
  <div class="page-campaign__inner inner">
    <div class="page-campaign__contents tab-menu">
      <!-- タブメニュー -->
      <ul class="tab-menu__list">
        <li class="tab-menu__item current"><a href="<?php echo esc_url(home_url()); ?>">ALL</a></li>
        <?php 
        $args = array(
            'taxonomy' => 'campaign_category', // タクソノミー名
            'hide_empty' => false, // 投稿のないタームも取得
        );
        $categories = get_terms($args); // ターム一覧を取得
        if (!is_wp_error($categories) && !empty($categories)) : // タクソノミーが存在する場合のみ表示
            foreach ($categories as $cat) :
                // 現在のタームをチェック
                $is_current = (is_tax('campaign_category', $cat->slug)) ? 'current' : '';
        ?>
                <li class="tab-menu__item <?php echo esc_attr($is_current); ?>">
                    <a href="<?php echo esc_url(get_term_link($cat)); ?>">
                        <?php echo esc_html($cat->name); ?>
                    </a>
                </li>
        <?php endforeach; endif; ?>

      </ul>
    </div>

    <!-- タブコンテンツ -->
    <div class="page-campaign__contents top-page-campaign">
      <div class="page-campaign__content">
        <div class="page-campaign__card-list">
            <?php 
            // メインクエリに投稿が存在するか確認
            if (have_posts()): 
                while (have_posts()): the_post(); ?>
                    <div class="page-campaign__content-item">
                        <div class="page-campaign-card">
                            <div class="page-campaign-card__image">
                              <img src="<?php esc_url(the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                            </div>
                            <div class="page-campaign-card__content">
                              <div class="page-campaign-card__content-header">
                                <div class="page-campaign-card__tag">
                                  <?php 
                                  $terms = the_terms(get_the_ID(), 'campaign_category');
                                  if ($terms && !is_wp_error($terms)) : ?>
                                      <p><?php echo esc_html($terms[0]->name); ?></p>
                                  <?php endif; ?>
                                </div>
                                <div class="page-campaign-card__content-title">
                                  <p><?php the_title(); ?></p>
                                </div>
                              </div>
                              <div class="page-campaign-card__price-pop">
                                <p class="page-campaign-card__price-text">全部コミコミ(お一人様)</p>
                                <div class="page-campaign-card__price-box">
                                  <p class="page-campaign-card__price-before">¥<?php echo esc_html(get_field('actual-price')); ?></p>
                                  <p class="page-campaign-card__price-after">¥<?php echo esc_html(get_field('campaign-price')); ?></p>
                                </div>
                              </div>
                                <div class="u-desktop">
                                  <div class="page-campaign-card__message">
                                      <p><?php the_content(); ?></p>
                                  </div>
                                  <div class="page-campaign-card__comment">
                                      <p class="page-campaign-card__date"><?php echo esc_html(get_field('reservation-period__campaign')); ?></p>
                                      <p class="page-campaign-card__button-text">ご予約・お問い合わせはコチラ</p>
                                  </div>
                                  <div class="page-campaign-card__button">
                                      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="common-button">Contact us<span></span></a>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif;?>
        </div>
      </div>
    </div>

    <!-- WPページナビゲーション -->
    <div class="page-navi">
      <div class="page-navi__inner">
        <?php wp_pagenavi(); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
