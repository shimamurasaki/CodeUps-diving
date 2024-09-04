<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
<section class="sub-mv">
  <div class="sub-mv__inner">
    <div class="sub-mv__img">
      <picture>
        <source srcset="<?php echo esc_url(get_theme_file_uri('/assets/images/common/sub-voice_pc-hero.jpg')); ?>" media="(min-width: 768px)">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/sub-voice_sp-hero.jpg')); ?>" alt="ライセンス講習">
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
        <li class="tab-menu__item current"><a href="<?php echo esc_url(home_url()); ?>">ALL</a></li>
        <?php 
        $args = array(
            'taxonomy' => 'voice_category', // タクソノミー名
            'hide_empty' => false, // 投稿のないタームも取得
        );
        $categories = get_terms($args); // ターム一覧を取得
        if (!is_wp_error($categories) && !empty($categories)) : // タクソノミーが存在する場合のみ表示
            foreach ($categories as $cat) :
                // 現在のタームをチェック
                $is_current = (is_tax('voice_category', $cat->slug)) ? 'current' : '';
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
    <div class="archive-voice__contents top-archive-voice">
      <div class="archive-voice__content">
        <div class="sheet-list">
          <?php 
          // メインクエリに投稿が存在するか確認
          if (have_posts()): 
              while (have_posts()): the_post(); ?>
                  <div class="sheet-list__item">
                      <div class="guest-card">
                          <div class="guest-card__contents">
                              <div class="guest-card__content">
                                  <div class="guest-card__header">
                                      <div class="guest-card__info">
                                      <?php 
                                      // 現在の投稿に紐付けられた'term'を取得
                                      $user_terms = get_the_terms(get_the_ID(), 'user'); 
                                      if ($user_terms && !is_wp_error($user_terms)) :
                                          foreach ($user_terms as $term) : ?>
                                              <p><?php echo esc_html($term->name); ?></p>
                                          <?php endforeach;
                                      else : ?>
                                          <p>ユーザーのタームが見つかりません。</p>
                                      <?php endif; ?>
                                      </div>
                                      <div class="guest-card__tag">
                                      <?php 
                                      // 現在の投稿に紐付けられた'term'を取得
                                      $voice_terms = get_the_terms(get_the_ID(), 'voice_category'); 
                                      if ($voice_terms && !is_wp_error($voice_terms)) :
                                          foreach ($voice_terms as $term) : ?>
                                              <p><?php echo esc_html($term->name); ?></p>
                                          <?php endforeach;
                                      else : ?>
                                          <p>カテゴリーのタームが見つかりません。</p>
                                      <?php endif; ?>
                                      </div>
                                  </div>
                                  <div class="guest-card__title">
                                      <p><?php the_title(); ?></p>
                                  </div>
                              </div>
                              <div class="guest-card__image">
                                <?php if (has_post_thumbnail()) : ?>
                                  <img src="<?php esc_url(the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                                <?php else : ?>
                                  <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/default.jpg')); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                                <?php endif; ?>
                              </div>
                          </div>
                          <div class="guest-card__text">
                              <p><?php the_content(); ?></p>
                          </div>
                      </div>
                  </div>
              <?php endwhile; 
          else : ?>
              <p>現在お客様の声はありません。</p>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- WPページナビゲーション -->
<div class="page-navi">
  <div class="page-navi__inner">
    <?php wp_pagenavi(); ?>
  </div>
</div>

<?php get_footer(); ?>
