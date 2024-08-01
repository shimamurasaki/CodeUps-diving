<aside class="sidebar">

  <div class="sidebar__box">
    <h2 class="sidebar__header">
      <span><img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/sidebar_whale.png')); ?>" alt="クジライラスト"></span>人気記事
    </h2>
    <div class="sidebar__content">
      <?php
        // 人気記事をクリック数の多い順に取得するためのクエリ引数を設定
        $args = array(
          'post_type'      => 'post',
          'posts_per_page' => 3, // 3記事表示
          'meta_key'       => 'post_views_count', // クリック数のカスタムフィールド
          'orderby'        => 'meta_value_num', // カスタムフィールドの値で並び替え
          'order'          => 'DESC' // 降順で表示
        );
        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) :
      ?>
      <div class="popularity-blog">
        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="popularity-blog__link">
            <div class="popularity-blog__card">
              <div class="popularity-blog__image">
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
              </div>
              <div class="popularity-blog__title">
                <time datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d'); ?></time>
                <p><?php the_title(); ?></p>
              </div>
            </div>
          </a>
        <?php endwhile; ?>
      </div>
      <?php endif; wp_reset_postdata(); ?>
    </div>
  </div>

  <div class="sidebar__box">
    <h2 class="sidebar__header">
        <span>
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sidebar_whale.png" alt="クジライラスト">
        </span>
        口コミ
    </h2>
    <div class="sidebar__content">
        <?php
        // 投稿を取得するためのパラメータを設定
        $args = array(
            'post_type' => 'voice', // カスタム投稿タイプ名
            'posts_per_page' => 3, // 取得する投稿の件数
            'meta_key' => 'post_views_count', // 閲覧数メタキー
            'orderby' => 'meta_value_num', // 閲覧数で並び替え
            'order' => 'DESC', // 降順
        );
        $my_query = new WP_Query($args);
        ?>
        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <div class="review-card">
            <div class="review-card__image">
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
            </div>
            <div class="review-card__tag">
                <?php
                // 投稿に関連付けられたタクソノミーのタームを取得
                $terms = get_the_terms(get_the_ID(), 'user');
                if ($terms && !is_wp_error($terms)) {
                    // 最初のターム名を取得して表示
                    $term_name = $terms[0]->name;
                    echo '<p class="guest-card__info">' . esc_html($term_name) . '</p>';
                }
                ?>
            </div>
            <div class="review-card__title">
                <p><?php the_title(); ?></p>
            </div>
        </div>
        <?php endwhile; ?>
        <div class="review-card__button">
            <a href="<?php echo esc_url(home_url('/voice/')); ?>" class="common-button">View more<span></span></a>
        </div>
        <?php wp_reset_postdata(); // クエリのリセット ?>
    </div>
  </div>


  <div class="sidebar__box">
    <h2 class="sidebar__header"><span><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sidebar_whale.png" alt="クジライラスト"></span>キャンペーン</h2>
    <div class="sidebar__content">
      <div class="sidebar-campaign">
        <?php
          $args = array(
            'post_type' => 'campaign', //カスタム投稿タイプ名
            'posts_per_page' => 2,// 表示する記事の数
            'orderby'        => 'date', // 日付で並び替え
            'order'          => 'DESC' // 降順で最新の投稿から表示
          );
          $my_query = new WP_Query( $args );
        ?>
        <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
        <div class="campaign-card">
          <div class="campaign-card__image">
          <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
          </div>
          <div class="campaign-card__content">
            <div class="campaign-card__header">
              <div class="campaign-card__title campaign-card--sidebar__title">
                <p><?php the_title(); ?></p>
              </div>
            </div>
            <div class="campaign-card__price-pop campaign-card--sidebar__price-pop">
              <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
              <div class="campaign-card__price-box campaign-card--sidebar__price-box">
                <p class="campaign-card__price-before campaign-card--sidebar__price-before">¥<?php the_field('actual-price'); ?></p>
                <p class="campaign-card__price-after campaign-card--sidebar__price-after">¥<?php the_field('campaign-price'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
      <div class="sidebar-campaign__button">
        <a href="<?php echo esc_url(home_url('/campaign/')); ?>" class="common-button">View more<span></span></a>
      </div>
    </div>
  </div>

  <div class="sidebar__box">
    <h2 class="sidebar__header">
      <span><img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/sidebar_whale.png')); ?>" alt="クジライラスト"></span>アーカイブ
    </h2>
    <div class="sidebar__content">
      <div class="toggle-list">
        <?php
        $archives = get_custom_archives();
        foreach ($archives as $year => $months) :
        ?>
          <p class="toggle-list__title jsToggleTitle"><?php echo $year; ?></p>
          <div class="toggle-list__content">
            <?php foreach ($months as $month_data) : ?>
              <p class="toggle-list__title--child">
                <a href="<?php echo esc_url($month_data['url']); ?>">
                  <?php echo $month_data['month'] . '月'; ?>
                </a>
              </p>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</aside>
