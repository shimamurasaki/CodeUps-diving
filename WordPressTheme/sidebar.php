<div class="sidebar">

  <div class="sidebar__box">
    <h2 class="sidebar__header"><span><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sidebar_whale.png" alt="クジライラスト"></span>人気記事</h2>
    <div class="sidebar__content">
      <?php
        $args = array(
          'post_type'      => 'post',
          'posts_per_page' => 3 // 3記事表示
        );
        $my_query = new WP_Query( $args );
        if ( $my_query->have_posts() ) :
      ?>
      <div class="popularity-blog">
      <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
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
    <h2 class="sidebar__header"><span><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sidebar_whale.png" alt="クジライラスト"></span>口コミ</h2>
    <div class="sidebar__content">
      <?php
        $args = array(
          'post_type' => 'voice', //カスタム投稿タイプ名
          'posts_per_page' => 1,//取得する投稿の件数
          'offset' => 4,//4番目の記事
        );
        $my_query = new WP_Query( $args );
      ?>
      <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
      <div class="review-card">
        <div class="review-card__image">
        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
        </div>
        <div class="review-card__tag">
          <p><?php the_tags( '', '', '' ); ?></p>
        </div>
        <div class="review-card__title">
          <p><?php the_title(); ?></p>
        </div>
      </div>
      <?php endwhile; ?>
      <div class="review-card__button">
        <a href="<?php echo esc_url(home_url('/voice/')); ?>" class="common-button">View more<span></span></a>
      </div>
    </div>
  </div>

  <div class="sidebar__box">
    <h2 class="sidebar__header"><span><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sidebar_whale.png" alt="クジライラスト"></span>キャンペーン</h2>
    <div class="sidebar__content">
      <div class="sidebar-campaign">
        <?php
          $args = array(
            'post_type' => 'campaign', //カスタム投稿タイプ名
            'posts_per_page' => 2,//取得する投稿の件数
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
    <h2 class="sidebar__header"><span><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sidebar_whale.png" alt="クジライラスト"></span>アーカイブ</h2>
    <div class="sidebar__content">
      <div class="toggle-list">
        <p class="toggle-list__title jsToggleTitle">2023</p>
        <div class="toggle-list__content">
          <p class="toggle-list__title--child">3月</p>
          <div class="toggle-list__content"></div>
          <p class="toggle-list__title--child">2月</p>
          <div class="toggle-list__content"></div>
          <p class="toggle-list__title--child">1月</p>
          <div class="toggle-list__content"></div>
        </div>
        <p class="toggle-list__title jsToggleTitle">2022</p>
        <div class="toggle-list__content">
          <p class="toggle-list__title--child">3月</p>
          <div class="toggle-list__content"></div>
          <p class="toggle-list__title--child">2月</p>
          <div class="toggle-list__content"></div>
          <p class="toggle-list__title--child">1月</p>
          <div class="toggle-list__content"></div>
        </div>
      </div>
    </div>
  </div>

</div>
