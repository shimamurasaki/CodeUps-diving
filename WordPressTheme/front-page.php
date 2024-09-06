<?php get_header(); ?>

<section class="mv">
  <!-- BEM設計手法に基づくクラス名の使用 -->
  <div class="mv__inner">
    <div class="mv__header">
      <h1 class="mv__title">diving</h1>
      <p class="mv__subtitle">into the ocean</p>
    </div>
    <!-- Swiperコンテナ -->
    <div class="swiper mv__swiper js-mv-swiper">
    <div class="swiper-wrapper mv__images">
      <?php
      // SCF（Smart Custom Fields）からmv-sliderフィールドの値を取得
      $mvSlider = SCF::get('mv-slider');
      // 取得したスライダーのデータをループ処理
      foreach ($mvSlider as $fields) {
        // PCおよびSP用のスライダー画像IDを取得
        $sp_id = $fields['slider-sp'];
        $pc_id = $fields['slider-pc'];
        // 画像IDから画像URLを取得
        $sp_url = wp_get_attachment_url($sp_id);
        $pc_url = wp_get_attachment_url($pc_id);
      ?>
      <div class="swiper-slide mv__img">
        <!-- pictureタグを使用して、レスポンシブ画像を表示 -->
        <picture>
          <!-- 768px以上の幅の画面ではPC用画像を表示 -->
          <source srcset="<?php echo esc_url($pc_url); ?>" media="(min-width: 768px)">
          <!-- デフォルトでSP用画像を表示 -->
          <img src="<?php echo esc_url($sp_url); ?>" alt="Slider Image">
        </picture>
      </div>
      <?php } ?>
    </div> <!-- .swiper-wrapper -->
  </div> <!-- .swiper -->

    <!-- Swiperコンテナ終了 -->
  </div>
</section>


<section class="campaign top-campaign" id="campaign">
  <div class="campaign__inner inner">
    <div class="campaign__header">
      <div class="section-header">
        <p class="section-header__entitle">Campaign</p>
        <h2 class="section-header__title">キャンペーン</h2>
      </div>
    </div>
    <div class="campaign__swiper-btn">
      <div class="js-campaign-button-next campaign__next-btn"><span></span></div>
      <div class="js-campaign-button-prev campaign__prev-btn"><span></span></div>
    </div>
    <!-- Swiper -->
    <div class="swiper campaign__contents js-campaign-swiper">
      <div class="swiper-wrapper">
        <?php
        // カスタム投稿タイプ 'campaign' から投稿を取得
        $args = array(
          'post_type' => 'campaign',
          'posts_per_page' => -1
        );
        $campaign_query = new WP_Query($args);
        // ループの開始
        if ($campaign_query->have_posts()) :
          while ($campaign_query->have_posts()) : $campaign_query->the_post(); ?>
            <div class="swiper-slide campaign__content">
              <div class="campaign-card">
                <div class="campaign-card__image">
                  <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                  <?php endif; ?>
                </div>
                <div class="campaign-card__content">
                  <div class="campaign-card__header">
                    <div class="campaign-card__tag">
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
                    <div class="campaign-card__title">
                      <p><?php the_title(); ?></p>
                    </div>
                  </div>
                  <div class="campaign-card__price-pop">
                    <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                    <div class="campaign-card__price-box">
                      <p class="campaign-card__price-before">¥<?php the_field('actual-price'); ?></p>
                      <p class="campaign-card__price-after">¥<?php the_field('campaign-price'); ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile;
        else : ?>
          <p>現在キャンペーン情報がありません。</p>
        <?php endif;
        // ループの終了
        wp_reset_postdata();
        ?>
      </div>
    </div>
    <!-- Swiper -->
    <div class="campaign__button">
      <a href="<?php echo esc_url(home_url('/campaign/')); ?>" class="common-button">View more<span></span></a>
    </div>
  </div>
</section>


<section class="about top-about" id="about">
  <div class="about__inner inner">
    <div class="about__header">
      <div class="section-header">
        <p class="section-header__entitle">About us</p>
        <h2 class="section-header__title">私たちについて</h2>
      </div>
    </div>
    <div class="about__item top-about__item">
      <div class="about__images">
        <div class="about__left">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/common/about_1.jpg' ); ?>" alt="屋根の上にいるシーサー">
        </div>
        <div class="about__right">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/common/about_2.jpg' ); ?>" alt="海の中の色鮮やかな魚たち">
        </div>
      </div>
      <div class="about__contents">
        <div class="about__title">
          <p>Dive into<br>the Ocean</p>
        </div>
        <div class="about-content">
          <p class="about__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。</p>
          <div class="about__button">
            <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="common-button">View more<span></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="information top-information" id="information">
  <div class="information__inner inner">
    <div class="information__header">
      <div class="section-header">
        <p class="section-header__entitle">Information</p>
        <h2 class="section-header__title">ダイビング情報</h2>
      </div>
    </div>
    <div class="information__contents">
      <div class="information__image colorbox js-colorbox">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/common/information.jpg' ); ?>" alt="海の中を泳ぐ魚たち">
      </div>
      <div class="information__content">
        <div class="information__info">
          <p class="information__title">ライセンス講習</p>
          <p class="information__text">当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。</p>
        </div>
        <div class="information__button">
          <a href="<?php echo esc_url(home_url('/information/')); ?>" class="common-button">View more<span></span></a>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="blog blog-bg" id="blog">
  <div class="blog__inner inner">
    <div class="blog__header">
      <div class="section-header">
        <p class="section-header__entitle--white">Blog</p>
        <h2 class="section-header__title--white">ブログ</h2>
      </div>
    </div>
    <div class="blog__items">
      <div class="card-list">
        <?php
        // ブログ記事を取得
        $args = array(
          'posts_per_page' => 3  // 表示する記事数
        );
        $blog_query = new WP_Query($args);

        // ループの開始
        if ($blog_query->have_posts()) :
          while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="card-list__item">
              <div class="blog-card">
                <div class="blog-card__image">
                  <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                  <?php else : ?>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/default.jpg" alt="No image available">
                  <?php endif; ?>
                </div>
                <div class="blog-card__content">
                  <div class="blog-card__header">
                    <time datetime="<?php the_time('c'); ?>" class="blog-card__date"><?php the_time('Y.m/d'); ?></time>
                    <p class="blog-card__title"><?php the_title(); ?></p>
                  </div>
                </div>
                <div class="blog-card__text">
                  <p><?php echo wp_trim_words(get_the_content(), 86, ''); ?></p>
                </div>
              </div>
            </a>
          <?php endwhile;
        else : ?>
          <p>現在ブログ記事はありません。</p>
        <?php endif;
        // ループの終了
        wp_reset_postdata();
        ?>
      </div><!-- card-list -->
    </div><!-- blog__items -->
    <div class="blog__button">
      <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="common-button">View more<span></span></a>
    </div>
  </div>
</section>


<section class="voice top-voice" id="voice">
  <div class="voice__inner inner">
    <div class="voice__header">
      <div class="section-header">
        <p class="section-header__entitle">Voice</p>
        <h2 class="section-header__title">お客様の声</h2>
      </div>
    </div>
    <div class="voice__items">
      <div class="sheet-list">
        <?php
        // カスタム投稿タイプ 'voice' から投稿を取得
        $args = array(
          'post_type' => 'voice', // 投稿タイプを指定
          'posts_per_page' => 2  // 表示する記事数
        );
        $voice_query = new WP_Query($args);

        // ループの開始
        if ($voice_query->have_posts()) :
          while ($voice_query->have_posts()) : $voice_query->the_post(); ?>
            <div class="sheet-list__item">
              <div class="guest-card">
                <div class="guest-card__contents">
                  <div class="guest-card__content">
                    <div class="guest-card__header">
                      <div class="guest-card__info">
                        <?php 
                        // 現在の投稿に紐付けられた'term'を取得
                        $terms = get_the_terms(get_the_ID(), 'user'); 
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
                      <div class="guest-card__tag">
                        <?php 
                        // 現在の投稿に紐付けられた'term'を取得
                        $terms = get_the_terms(get_the_ID(), 'voice_category'); 
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
                    </div>
                    <div class="guest-card__title">
                      <p><?php the_title(); ?></p>
                    </div>
                  </div>
                  <div class="guest-card__image colorbox js-colorbox">
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                    <?php else : ?>
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/default.jpg" alt="お客様の写真">
                    <?php endif; ?>
                  </div>
                </div>
                <div class="guest-card__text">
                  <p><?php echo wp_trim_words(get_the_content(), 170, ''); ?></p>
                </div>
              </div>
            </div><!-- sheet-list__item -->
          <?php endwhile;
        else : ?>
          <p>現在お客様の声はありません。</p>
        <?php endif;
        // ループの終了
        wp_reset_postdata();
        ?>
      </div><!-- sheet-list -->
    </div><!-- voice__items -->
    <div class="voice__button">
      <a href="<?php echo esc_url(home_url('/voice/')); ?>" class="common-button">View more<span></span></a>
    </div>
  </div>
</section>


<section class="price top-price" id="price">
  <div class="price__inner inner">
    <div class="price__header">
      <div class="section-header">
        <p class="section-header__entitle">Price</p>
        <h2 class="section-header__title">料金一覧</h2>
      </div>
    </div>
    <div class="price__contents">
      <div class="price__image colorbox js-colorbox">
        <picture>
          <source media="(min-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-pc.jpg">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-sp.jpg" alt="海中のウミガメ">
        </picture>
      </div>
      <div class="price__content">
        <div class="price__list">
          <div class="price__list-items">
            <p class="price__list-title">ライセンス講習</p>
            <?php $license = SCF::get('license' , 11); foreach ($license as $fields ) { ?>
            <ul class="price__list-item">
              <li><?php echo esc_html( $fields['license-content'] ); ?></li>
              <li class="price__money">¥<?php echo esc_html( $fields['license-price'] ); ?></li>
            </ul>
            <?php } ?>
          </div>
        </div>
        <div class="price__list">
          <div class="price__list-items">
            <p class="price__list-title">体験ダイビング</p>
            <?php $trialDiving = SCF::get('trial-diving' , 11); foreach ($trialDiving as $fields ) { ?>
            <ul class="price__list-item">
              <li><?php echo esc_html( $fields['trial-diving-content'] ); ?></li>
              <li class="price__money">¥<?php echo esc_html( $fields['trial-diving-price'] ); ?></li>
            </ul>
            <?php } ?>
          </div>
        </div>
        <div class="price__list">
          <div class="price__list-items">
            <p class="price__list-title">ファンダイビング</p>
            <?php $funDiving = SCF::get('fun-diving' , 11); foreach ($funDiving as $fields ) { ?>
            <ul class="price__list-item">
              <li><?php echo esc_html( $fields['fun-diving-content'] ); ?></li>
              <li class="price__money">¥<?php echo esc_html( $fields['fun-diving-price'] ); ?></li>
            </ul>
            <?php } ?>
          </div>
        </div>
        <div class="price__list">
          <div class="price__list-items">
            <p class="price__list-title">スペシャルダイビング</p>
            <?php $specialDiving = SCF::get('special-diving' , 11); foreach ($specialDiving as $fields ) { ?>
            <ul class="price__list-item">
              <li><?php echo esc_html( $fields['special-diving-content'] ); ?></li>
              <li class="price__money">¥<?php echo esc_html( $fields['special-diving-price'] ); ?></li>
            </ul>
            <?php } ?>
          </div>
        </div>
      </div><!-- price__content -->
    </div><!-- price__contents -->
    <div class="price__button">
      <a href="<?php echo esc_url(home_url('/price/')); ?>" class="common-button">View more<span></span></a>
    </div>
  </div>
</section>

<?php get_footer(); ?>