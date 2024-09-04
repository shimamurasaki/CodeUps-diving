<div class="breadcrumb top-breadcrumb">
  <div class="<?php echo is_404() ? 'breadcrumb__inner--white' : 'breadcrumb__inner'; ?> inner">
    <?php
      // 404ページの場合
      if (is_404()) {
        if (function_exists('bcn_display')){
          bcn_display();
        }
      } else {
        // それ以外のページの場合
        get_template_part('parts/breadcrumb');
      }
    ?>
  </div>
</div>
