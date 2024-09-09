<?php get_header(); ?>
<!-- 下層ページのメインビュー -->
<section class="sub-mv">
  <div class="sub-mv__inner">
    <div class="sub-mv__img">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-price_pc-hero.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-price_sp-hero.jpg" alt="ダイバー">
      </picture>
    </div>
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">price</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb'); ?>

<div class="page-price top-sub-contents">
  <div class="page-price__inner inner">
    <div class="page-price__contents price-boxes">

    <?php
      // SCFから'license'フィールドを取得
      $license = SCF::get('license');
      $has_valid_data = false; // 有効なデータがあるかを示すフラグ
      // 'license'データが存在するかチェック
      if (!empty($license)) {
          foreach ($license as $fields) {
              // 'license-content'と'license-price'の両方が存在するか確認
              if (!empty($fields['license-content']) && !empty($fields['license-price'])) {
                  $has_valid_data = true; // 有効なデータが見つかったらフラグをtrueに
                  break; // 有効なデータが見つかったらループを抜ける
              }
          }
      }
      // 有効なデータがある場合のみセクションを表示
      if ($has_valid_data) : ?>
          <div class="price-boxes__item price-box">
              <div class="price-box__header">
                <p>ライセンス講習</p>
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-price_whale.png" alt="">
              </div>
              <table>
              <?php foreach ($license as $fields) :
                  // 'license-content'と'license-price'の両方が存在する場合のみ行を表示
                  if ($fields['license-content'] && $fields['license-price']) : ?>
                  <tr>
                    <td class="title"><?php echo esc_html($fields['license-content']); ?></td>
                    <td class="money">¥<?php echo esc_html($fields['license-price']); ?></td>
                  </tr>
                  <?php endif; ?>
              <?php endforeach; ?>
              </table>
          </div>
      <?php endif; ?>


      <?php
      // SCFから'trial-diving'フィールドを取得
      $trialDiving = SCF::get('trial-diving');
      $has_valid_data = false; // 有効なデータがあるかどうかを示すフラグ
      // 'trial-diving'データが存在する場合、データを確認
      if (!empty($trialDiving)) {
          foreach ($trialDiving as $fields) {
              // 'trial-diving-content'と'trial-diving-price'の両方が存在するか確認
              if (!empty($fields['trial-diving-content']) && !empty($fields['trial-diving-price'])) {
                  $has_valid_data = true; // 有効なデータが見つかったらフラグをtrueに
                  break; // 有効なデータが見つかったらループを抜ける
              }
          }
      }
      // 有効なデータがある場合のみセクションを表示
      if ($has_valid_data) : ?>
          <div class="price-boxes__item price-box">
              <div class="price-box__header">
                <p>体験ダイビング</p>
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-price_whale.png" alt="">
              </div>
              <table>
              <?php foreach ($trialDiving as $fields) :
                  // 'trial-diving-content'と'trial-diving-price'の両方が存在する場合のみ行を表示
                  if ($fields['trial-diving-content'] && $fields['trial-diving-price']) : ?>
                  <tr>
                    <td class="title"><?php echo esc_html($fields['trial-diving-content']); ?></td>
                    <td class="money">¥<?php echo esc_html($fields['trial-diving-price']); ?></td>
                  </tr>
                  <?php endif; ?>
              <?php endforeach; ?>
              </table>
          </div>
      <?php endif; ?>


      <?php
      // SCFから'fun-diving'フィールドを取得
      $funDiving = SCF::get('fun-diving');
      // 表示するデータがあるかをチェックするフラグ
      $has_valid_data = false;
      // 'fun-diving'データが存在する場合、データの確認を行う
      if ($funDiving) {
          foreach ($funDiving as $fields) {
              // 'fun-diving-content'と'fun-diving-price'の両方が存在するか確認
              if ($fields['fun-diving-content'] && $fields['fun-diving-price']) {
                  $has_valid_data = true; // 有効なデータが見つかったらフラグをtrueに
                  break; // データが1つでも見つかればループを抜ける
              }
          }
      }
      // 有効なデータがあった場合のみセクションを表示
      if ($has_valid_data) : ?>
          <div class="price-boxes__item price-box">
              <div class="price-box__header">
                <p>ファンダイビング</p>
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-price_whale.png" alt="">
              </div>
              <table>
              <?php foreach ($funDiving as $fields) :
                  // 'fun-diving-content'と'fun-diving-price'の両方が存在する場合のみ行を表示
                  if ($fields['fun-diving-content'] && $fields['fun-diving-price']) : ?>
                  <tr>
                    <td class="title"><?php echo esc_html( $fields['fun-diving-content'] ); ?></td>
                    <td class="money">¥<?php echo esc_html( $fields['fun-diving-price'] ); ?></td>
                  </tr>
                  <?php endif; ?>
              <?php endforeach; ?>
              </table>
          </div>
      <?php endif; // if ($has_valid_data) ?>


      <?php
      // SCFから'special-diving'フィールドを取得
      $specialDiving = SCF::get('special-diving');
      // 表示するデータがあるかをチェックするフラグ
      $has_valid_data = false;
      // 'special-diving'データが存在する場合、データの確認を行う
      if ($specialDiving) {
          foreach ($specialDiving as $fields) {
              // 'special-diving-content'と'special-diving-price'の両方が存在するか確認
              if ($fields['special-diving-content'] && $fields['special-diving-price']) {
                  $has_valid_data = true; // 有効なデータが見つかったらフラグをtrueに
                  break; // データが1つでも見つかればループを抜ける
              }
          }
      }
      // 有効なデータがあった場合のみセクションを表示
      if ($has_valid_data) : ?>
          <div class="price-boxes__item price-box">
              <div class="price-box__header">
                <p>スペシャルダイビング</p>
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-price_whale.png" alt="">
              </div>
              <table>
              <?php foreach ($specialDiving as $fields) :
                  // 'special-diving-content'と'special-diving-price'の両方が存在する場合のみ行を表示
                  if ($fields['special-diving-content'] && $fields['special-diving-price']) : ?>
                  <tr>
                    <td class="title"><?php echo esc_html( $fields['special-diving-content'] ); ?></td>
                    <td class="money">¥<?php echo esc_html( $fields['special-diving-price'] ); ?></td>
                  </tr>
                  <?php endif; ?>
              <?php endforeach;  ?>
              </table>
          </div>
      <?php endif; // if ($has_valid_data) ?>

      
    </div>
  </div>
</div>
<?php get_footer(); ?>