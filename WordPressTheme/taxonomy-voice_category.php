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
<?php get_template_part('parts/breadcrumb'); ?>

<div class="archive-voice top-sub-contents">
  <div class="archive-voice__inner inner">
    <div class="archive-voice__contents tab-menu">
      <!-- タブメニュー -->
      <ul class="tab-menu__list">
        <li class="tab-menu__item">
        <a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>">ALL</a>
        </li>
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
                                      // ACFでvoice-infoグループ内のデータを取得
                                      $voiceInfo = get_field('voice-info');
                                      // voice-ageとvoice-sexの値を取得
                                      $voiceAge = isset($voiceInfo['voice-age']) ? $voiceInfo['voice-age'] : '';
                                      $voiceSex = isset($voiceInfo['voice-sex']) ? $voiceInfo['voice-sex'] : '';
                                      // 年齢と性別を続けて表示
                                      if ($voiceAge || $voiceSex) {
                                          echo '<p>' . esc_html($voiceAge . '代 ' . '(' . $voiceSex. ')') . '</p>';
                                      } else {
                                          echo '<p>年齢や性別の情報がありません。</p>';
                                      }
                                      ?>
                                      </div>
                                      <div class="guest-card__tag">
                                      <?php 
                                      // 現在の投稿に紐付けられた'term'を取得
                                      $voice_terms = the_terms(get_the_ID(), 'voice_category'); 
                                      if ($voice_terms && !is_wp_error($voice_terms)) :
                                          foreach ($voice_terms as $term) : ?>
                                              <p><?php echo esc_html($term->name); ?></p>
                                          <?php endforeach;?>
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
                                  <img src="<?php esc_url(theme_file_uri('/assets/images/common/default.jpg')); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                                <?php endif; ?>
                              </div>
                          </div>
                          <div class="guest-card__text">
                            <?php
                            // ACFフィールドからデータを取得
                            $voiceText = get_field('voice-text');
                            // 170文字でトリム（マルチバイト文字対応）
                            if ($voiceText) :
                                // 日本語対応のため、mb_strimwidthを使って文字数をトリム
                                $trimmed_content = mb_strimwidth($voiceText, 0, 400, '...');
                                echo '<p>' . esc_html($trimmed_content) . '</p>';
                            else :
                                echo '<p>お客様の声がありません。</p>';
                            endif;
                            ?>
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
