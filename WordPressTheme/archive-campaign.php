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
        <li class="tab-menu__item current">
          <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>">ALL</a>
        </li>
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
                                // 現在の投稿に紐付けられた'term'を取得
                                $terms = get_the_terms(get_the_ID(), 'campaign_category'); 
                                // デバッグ用に取得したタームを出力
                                error_log(print_r($terms, true));
                                if ($terms && !is_wp_error($terms)) :
                                    foreach ($terms as $term) : ?>
                                        <p><?php echo esc_html($term->name); ?></p>
                                    <?php endforeach;
                                else :
                                    echo '<p>タームが見つかりません。</p>';
                                endif; ?>
                                </div>
                                <div class="page-campaign-card__content-title">
                                  <p><?php the_title(); ?></p>
                                </div>
                              </div>

                              <?php 
                              $actual_price = get_field('actual-price');
                              $campaign_price = get_field('campaign-price');
                              // 値が空でないことを確認し、数値にキャストする
                              if (!empty($actual_price) && !empty($campaign_price)):
                                  // 数値にキャスト
                                  $actual_price = (float) $actual_price;
                                  $campaign_price = (float) $campaign_price;
                              ?>
                                  <div class="page-campaign-card__price-pop">
                                      <p class="page-campaign-card__price-text">全部コミコミ(お一人様)</p>
                                      <div class="page-campaign-card__price-box">
                                          <p class="page-campaign-card__price-before">¥<?php echo esc_html(number_format($actual_price)); ?></p>
                                          <p class="page-campaign-card__price-after">¥<?php echo esc_html(number_format($campaign_price)); ?></p>
                                      </div>
                                  </div>
                              <?php endif; ?>
                              
                                <div class="u-desktop">
                                <div class="page-campaign-card__message">
                                  <?php
                                  // ACFフィールドからデータを取得
                                  $campaignExplanation = get_field('campaign-explanation');
                                  // 170文字でトリム（マルチバイト文字対応）
                                  if ($campaignExplanation) :
                                      // 日本語対応のため、mb_strimwidthを使って文字数をトリム
                                      $trimmed_content = mb_strimwidth($campaignExplanation, 0, 400, '...');
                                      echo '<p>' . esc_html($trimmed_content) . '</p>';
                                  else :
                                      echo '<p>お客様の声がありません。</p>';
                                  endif;
                                  ?>
                                </div>

                                  <div class="page-campaign-card__comment">
                                  <p class="page-campaign-card__date">
  <?php
  // ACFで 'reservation-period__box' グループ内のデータを取得
  $reservationPeriodBox = get_field('reservation-period__box') ?: [];
  // reservation-period__start と reservation-period__end の値を取得
  $reservationStart = $reservationPeriodBox['reservation-period__start'] ?? '';
  $reservationEnd = $reservationPeriodBox['reservation-period__end'] ?? '';
  // ACFの日付が d/m/Y 形式で保存されていると仮定
  $dateFormat = 'd/m/Y';

  // 日付が存在する場合にフォーマットして表示
  if ($reservationStart && $reservationEnd) :
      // 日付を指定のフォーマットでパース
      $startDate = DateTime::createFromFormat($dateFormat, $reservationStart);
      $endDate = DateTime::createFromFormat($dateFormat, $reservationEnd);

      // 日付が正しくパースできたか確認
      if ($startDate && $endDate) :
          // 同じ年かどうかをチェック
          $startYear = $startDate->format('Y');
          $endYear = $endDate->format('Y');

          if ($startYear === $endYear) :
              // 年が同じ場合、終了日の年を表示しない
              echo '<time datetime="' . esc_attr($startDate->format('Y-m-d')) . '">' . esc_html($startDate->format('Y/n/j')) . '</time> - ';
              echo '<time datetime="' . esc_attr($endDate->format('Y-m-d')) . '">' . esc_html($endDate->format('n/j')) . '</time>';
          else :
              // 年が異なる場合、両方の年を表示
              echo '<time datetime="' . esc_attr($startDate->format('Y-m-d')) . '">' . esc_html($startDate->format('Y/n/j')) . '</time> - ';
              echo '<time datetime="' . esc_attr($endDate->format('Y-m-d')) . '">' . esc_html($endDate->format('Y/n/j')) . '</time>';
          endif;
      else :
          // パースできなかった場合のエラーメッセージ
          echo '日付形式が不正です。';
      endif;
  else :
      // データがない場合のメッセージ
      echo '予約期間が設定されていません。';
  endif;
  ?>
</p>

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
