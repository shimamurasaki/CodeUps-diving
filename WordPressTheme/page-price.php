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

      <div class="price-boxes__item price-box">
        <div class="price-box__header">
          <p>ライセンス講習</p>
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-price_whale.png" alt="">
        </div>
        <table>
          <?php $license = SCF::get('license'); foreach ($license as $fields ) { ?>
            <tr>
              <td class="title"><?php echo esc_html( $fields['license-content'] ); ?></td>
              <td class="money">¥<?php echo esc_html( $fields['license-price'] ); ?></td>
            </tr>
          <?php } ?>
        </table>
      </div>

      <div class="price-boxes__item price-box">
        <div class="price-box__header">
          <p>体験ダイビング</p>
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-price_whale.png" alt="">
        </div>
        <table>
        <?php $trialDiving = SCF::get('trial-diving'); foreach ($trialDiving as $fields ) { ?>
            <tr>
              <td class="title"><?php echo esc_html( $fields['trial-diving-content'] ); ?></td>
              <td class="money">¥<?php echo esc_html( $fields['trial-diving-price'] ); ?></td>
            </tr>
          <?php } ?>
        </table>
      </div>

      <div class="price-boxes__item price-box">
        <div class="price-box__header">
          <p>ファンダイビング</p>
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-price_whale.png" alt="">
        </div>
        <table>
        <?php $funDiving = SCF::get('fun-diving'); foreach ($funDiving as $fields ) { ?>
            <tr>
              <td class="title"><?php echo esc_html( $fields['fun-diving-content'] ); ?></td>
              <td class="money">¥<?php echo esc_html( $fields['fun-diving-price'] ); ?></td>
            </tr>
        <?php } ?>
        </table>
      </div>

      <div class="price-boxes__item price-box">
        <div class="price-box__header">
          <p>スペシャルダイビング</p>
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sub-price_whale.png" alt="">
        </div>
        <table>
        <?php $specialDiving = SCF::get('special-diving'); foreach ($specialDiving as $fields ) { ?>
            <tr>
              <td class="title"><?php echo esc_html( $fields['special-diving-content'] ); ?></td>
              <td class="money">¥<?php echo esc_html( $fields['special-diving-price'] ); ?></td>
            </tr>
        <?php } ?>
        </table>
      </div>
      
    </div>
  </div>
</div>
<?php get_footer(); ?>