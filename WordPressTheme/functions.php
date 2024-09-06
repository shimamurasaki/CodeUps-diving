<?php

function custom_enqueue_scripts() {
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP&display=swap', array(), null);

    // Swiper CSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');

    // Custom CSS
    wp_enqueue_style('custom-style', get_theme_file_uri('/assets/css/style.css'));

    // jQuery
    wp_enqueue_script( 'jquery-js', '//code.jquery.com/jquery-3.6.0.js', array(), '1.1.1', true );

    // jQuery inView Plugin
    wp_enqueue_script( 'inview-js', get_template_directory_uri() . '/assets/js/jquery.inview.min.js', array( 'jquery' ), '1.1.1', true );

    // Swiper JS
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);

    // Custom JS
    wp_enqueue_script('custom-script', get_theme_file_uri('/assets/js/script.js'), array(), null, true);
}
add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');

function my_setup() {
    add_theme_support('post-thumbnails'); /* アイキャッチ */
    add_theme_support('automatic-feed-links'); /* RSSフィード */
    add_theme_support('title-tag'); /* タイトルタグ自動生成 */
    add_theme_support(
        'html5',
        array( /* HTML5のタグで出力 */
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );
}
add_action('after_setup_theme', 'my_setup');

// アーカイブの表示件数変更
function change_posts_per_page($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    if ($query->is_archive('voice')) { // カスタム投稿タイプを指定
        $query->set('posts_per_page', '8'); // 表示件数を指定
    }
}
add_action('pre_get_posts', 'change_posts_per_page');

// 管理画面のメニュー「投稿」を「ブログ」に変更する
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'ブログ'; // メニュー項目「投稿」を「ブログ」に変更
    $submenu['edit.php'][5][0] = 'ブログ一覧'; // サブメニュー「投稿一覧」を「ブログ一覧」に変更
    $submenu['edit.php'][10][0] = '新しいブログ'; // サブメニュー「新規追加」を「新しいブログ」に変更
}
add_action('admin_menu', 'change_post_menu_label');

// 管理画面の「投稿」ページのタイトルを変更する
function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'ブログ';
    $labels->singular_name = 'ブログ';
    $labels->add_new = '新しいブログ';
    $labels->add_new_item = '新しいブログを追加';
    $labels->edit_item = 'ブログを編集';
    $labels->new_item = '新しいブログ';
    $labels->view_item = 'ブログを表示';
    $labels->search_items = 'ブログを検索';
    $labels->not_found = 'ブログが見つかりません';
    $labels->not_found_in_trash = 'ゴミ箱にブログが見つかりません';
}
add_action('init', 'change_post_object_label');

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', '__return_false');

// Contact Form 7にキャンペーンのタイトルを挿入
add_filter('wpcf7_form_tag_data_option', 'custom_campaign_select_values', 10, 3);
function custom_campaign_select_values($values, $options, $args) {
    if (in_array('campaignSelect', $options)) {
        // キャンペーンの投稿タイトルを取得
        $args = array(
            'post_type' => 'campaign',  // キャンペーン投稿タイプ
            'posts_per_page' => -1,     // 全ての投稿を取得
            'fields' => 'ids',          // IDのみを取得
        );

        $query = new WP_Query($args);

        $titles = array();
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $title = get_the_title();
                $titles[get_the_ID()] = $title; // IDをキーにしてタイトルを保存
            }
        }
        wp_reset_postdata();

        // 重複を排除してタイトルの配列を作成
        $unique_titles = array_unique($titles);

        // タイトルの配列を値として設定
        $values = array_combine(array_values($unique_titles), array_values($unique_titles)); // キーと値が同じ配列を作成
    }

    return $values;
}

// campaignとvoiceの投稿件数を制御
function custom_campaign_posts_query($query) {
    // メインクエリのみを対象とする
    if ($query->is_main_query() && !is_admin()) {
        // 特定の投稿タイプやタクソノミーに対して条件を追加
        if (is_post_type_archive('campaign') || is_tax('campaign_category')) {
            // 表示する投稿件数を設定
            $query->set('posts_per_page', 4); // 表示する件数を設定
        }
        if (is_post_type_archive('voice') || is_tax('voice_category')) {
            // 表示する投稿件数を設定
            $query->set('posts_per_page', 6); // 表示する件数を設定
        }
    }
}
add_action('pre_get_posts', 'custom_campaign_posts_query');

// 記事閲覧数を取得する
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

// 記事閲覧数を保存する
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// headに出力されるタグを削除(閲覧数を重複してカウントするのを防止するため)
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// クローラーのアクセス判別
function is_bot() {
    // ボットのユーザーエージェントリストを定義
    $bots = [
        'Googlebot', 'Bingbot', 'Slurp', 'DuckDuckBot', 'Baiduspider', 'YandexBot', 'Sogou',
        'Exabot', 'facebot', 'ia_archiver'
    ];

    // ユーザーエージェントがボットリストに含まれているかチェック
    foreach ($bots as $bot) {
        if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false) {
            return true;
        }
    }
    return false;
}

// 年と月を分けて取り出し、階層的に表示する
function get_custom_archives() {
    global $wpdb;
    $results = $wpdb->get_results("
        SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, COUNT(ID) as post_count
        FROM $wpdb->posts
        WHERE post_status = 'publish' AND post_type = 'post'
        GROUP BY year, month
        ORDER BY post_date DESC
    ");

    $archives = [];
    foreach ($results as $result) {
        $year = $result->year;
        $month = $result->month;

        if (!isset($archives[$year])) {
            $archives[$year] = [];
        }

        $archives[$year][] = [
            'month' => $month,
            'post_count' => $result->post_count,
            'url' => get_month_link($year, $month)
        ];
    }

    return $archives;
}

