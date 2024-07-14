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
          <li class="tab-menu__item"><a href="<?php echo home_url();?>/voice/">ALL</a></li>
          <?php 
          $args = array(
              'taxonomy' => 'voice_category', // タクソノミー名
              'hide_empty' => false, // 投稿のないタームも取得
          );
          $categories = get_terms( $args ); // ターム一覧を取得
          if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) : // タクソノミーが存在する場合のみ表示
              foreach ( $categories as $cat ) :
                  // グローバル変数 $term を使用して現在のタームをチェック
                  global $term;
                  $is_current = ( isset( $term ) && $term === $cat->slug ) ? 'current' : '';
          ?>
                  <li class="tab-menu__item <?php echo $is_current; ?>">
                      <a href="<?php echo $is_current ? 'javascript:void(0);' : get_term_link( $cat->slug, 'voice_category' ); ?>">
                          <?php echo $cat->name; ?>
                      </a>
                  </li>
          <?php
              endforeach;
          endif;
          ?>
      </ul>
    </div>

    <!-- タブコンテンツ -->
    <div class="archive-voice__contents top-archive-voice">
      <div class="archive-voice__content">
        <div class="sheet-list">
          <?php 
          // 現在のページ番号を取得。ページが指定されていない場合は1ページ目を表示する
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

          // 現在のタクソノミーのスラッグを取得
          $current_term = get_queried_object();
          $current_slug = $current_term->slug;

          // WP_Queryを使用してカスタムクエリを作成
          $args = array(
              'post_type' => 'voice',
              'tax_query' => array(
                  array(
                      'taxonomy' => 'voice_category',
                      'field'    => 'slug',
                      'terms'    => $current_slug,
                  ),
              ),
              'posts_per_page' => 6,  // 表示件数を4に設定
              'paged' => $paged,
          );
          $custom_query = new WP_Query($args);

          if ($custom_query->have_posts()): while ($custom_query->have_posts()): $custom_query->the_post(); ?>
          <div class="sheet-list__item">
            <div class="guest-card">
              <div class="guest-card__contents">
                <div class="guest-card__content">
                  <div class="guest-card__header">
                    <p class="guest-card__info">
                      <?php 
                        // 投稿に関連付けられたタクソノミーのタームを取得
                        $terms = get_the_terms(get_the_ID(), 'user');
                        if ($terms && !is_wp_error($terms)) {
                            // 最初のターム名を取得して表示
                            $term_name = $terms[0]->name;
                            echo '<p>' . esc_html($term_name) . '</p>';
                        }
                      ?>
                    </p>
                    <div class="guest-card__tag">
                      <?php 
                      // 投稿に関連付けられたタクソノミーのタームを取得
                      $terms = get_the_terms(get_the_ID(), 'voice_category');
                      if ($terms && !is_wp_error($terms)) {
                          // 最初のターム名を取得して表示
                          $term_name = $terms[0]->name;
                          echo '<p>' . esc_html($term_name) . '</p>';
                      }
                      ?>
                    </div>
                  </div>
                  <div class="guest-card__title">
                    <p><?php echo esc_html(get_the_title()); ?></p>
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