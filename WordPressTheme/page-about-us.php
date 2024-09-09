<?php get_header(); ?>
<!-- 下層ページのメインビュー -->
<section class="sub-mv">
  <div class="sub-mv__inner">
    <div class="sub-mv__img">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-aboutus_pc-hero.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-aboutus_sp-hero.jpg" alt="シーサー">
      </picture>
    </div>
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">about us</h1>
    </div>
  </div>
</section>

<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb'); ?>

<div class="page-aboutus top-sub-contents">
  <div class="page-aboutus__inner inner">
    <div class="about__item page-aboutus__item">
      <div class="about__images page-aboutus__images">
        <div class="about__left u-desktop">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_1.jpg" alt="屋根の上にいるシーサー">
        </div>
        <div class="about__right page-aboutus__right">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about_2.jpg" alt="海の中の色鮮やかな魚たち">
        </div>
      </div>
      <div class="about__contents page-aboutus__contents">
        <div class="about__title page-aboutus__title">
          <p>Dive into<br>the Ocean</p>
        </div>
        <div class="about-content">
          <p class="about__text page-aboutus__text">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
$gallery = SCF::get('gallery'); // SCFからギャラリーのフィールドを取得
// ギャラリーが存在し、かつ画像が存在する場合のみセクションを表示
if ($gallery) :
    $has_image = false; // 画像があるかどうかのフラグ
    foreach ($gallery as $fields) {
        // 各フィールドから画像IDを取得
        $galleryID = $fields['gallery-image'];
        if ($galleryID) { // 画像IDが存在するか確認
            $has_image = true; // 画像があればフラグをtrueに
            break; // 画像が1つでも見つかったらループを抜ける
        }
    }
    // 画像が存在する場合のみセクションを出力
    if ($has_image): ?>
        <section class="gallery top-gallery">
          <div class="gallery__inner inner">
            <div class="gallery__header">
              <div class="section-header">
                <p class="section-header__entitle">Gallery</p>
                <h2 class="section-header__title">フォト</h2>
              </div>
            </div>
            <div class="gallery__contents">
              <?php foreach ($gallery as $fields) :
                // 各フィールドから画像のIDを取得
                $galleryID = $fields['gallery-image'];
                // 画像IDが存在する場合のみimgタグを出力
                if ($galleryID) :
                  $image_url = wp_get_attachment_url($galleryID); ?>
                  <img src="<?php echo esc_url($image_url); ?>" alt="">
                <?php endif; // if ($galleryID) の終了 ?>
              <?php endforeach; // foreachの終了 ?>
            </div>
          </div>
        </section>
    <?php endif; ?>
<?php endif; ?>


<div class="gallery__display"></div>


<?php get_footer(); ?>