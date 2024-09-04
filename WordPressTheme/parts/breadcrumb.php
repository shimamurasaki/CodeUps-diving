<div class="breadcrumb top-breadcrumb">
  <?php
  // 404ページの場合
  if (is_404()) {
    // breadcrumb__inner--white クラスを使用する
    echo '<div class="breadcrumb__inner--white inner">';
    if (function_exists('bcn_display')){
      bcn_display(); // パンくずリストを表示
    }
    echo '</div>';
  } else {
    // それ以外のページの場合
    echo '<div class="breadcrumb__inner inner">';
    if (function_exists('bcn_display')){
      bcn_display(); // パンくずリストを表示
    }
    echo '</div>';
  }
  ?>
</div>
