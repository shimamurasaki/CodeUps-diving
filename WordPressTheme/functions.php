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


// 閲覧数セット
function setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);

	if($count==""){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// クローラーカウントしない場合は追加
function is_bot() {
	$ua = $_SERVER['HTTP_USER_AGENT'];
	
	$bot = array(
		'Googlebot',
		'Yahoo! Slurp',
		'Mediapartners-Google',
		'msnbot',
		'bingbot',
		'MJ12bot',
		'Ezooms',
		'pirst; MSIE 8.0;',
		'Google Web Preview',
		'ia_archiver',
		'Sogou web spider',
		'Googlebot-Mobile',
		'AhrefsBot',
		'YandexBot',
		'Purebot',
		'Baiduspider',
		'UnwindFetchor',
		'TweetmemeBot',
		'MetaURI',
		'PaperLiBot',
		'Showyoubot',
		'JS-Kit',
		'PostRank',
		'Crowsnest',
		'PycURL',
		'bitlybot',
		'Hatena',
		'facebookexternalhit',
		'NINJA bot',
		'YahooCacheSystem',
		'NHN Corp.',
		'Steeler',
		'DoCoMo',
	);

	foreach( $bot as $bot ) {
		if (stripos( $ua, $bot ) !== false){
			return true;
		}
	}
	
	return false;	
}

// 閲覧数取得
function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);

	if($count==""){ //カウントがなければ0をセット
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 View";
	}

	return $count.' Views';
}

// 管理画面に閲覧数項目を追加する
function count_add_column( $columns ) {
    $columns['views'] = '閲覧数';
    return $columns;
}
add_filter( 'manage_posts_columns', 'count_add_column' ); // 投稿ページに追加




// 管理画面カスタマイズ -------------------------------------------------------------------------------------------------------------

// ダッシュボードに追加
function announce_add_dashboard_widgets() {
    wp_add_dashboard_widget(
      'announce_dashboard_widget',
      'READ ME',
      'announce_dashboard_widget_function'
    );
  }
  function announce_dashboard_widget_function() {
    echo '
    <h2>注意事項</h2>
    <p>パーマリンクは英語表記でお願いします。</p>
    <hr>
    <h2>更新マニュアル</h2>
    <p>HTMLタグで自由な内容を書けます。ここにpdfファイルへのリンクを貼ることもできます。</p>
    ';
  }
  add_action('wp_dashboard_setup', 'announce_add_dashboard_widgets');


  // メニュー非表示
  function remove_menus() {

    // remove_menu_page( 'index.php' ); // ダッシュボード.
    // remove_menu_page( 'edit.php' ); // 投稿.
    remove_menu_page( 'upload.php' ); // メディア.
    // remove_menu_page( 'edit.php?post_type=page' ); // 固定.
    remove_menu_page( 'edit-comments.php' ); // コメント.
    remove_menu_page( 'themes.php' ); // 外観.
    remove_menu_page( 'plugins.php' ); // プラグイン.
    remove_menu_page( 'users.php' ); // ユーザー.
    remove_menu_page( 'tools.php' ); // ツール.
    remove_menu_page( 'options-general.php' ); // 設定.
    }
    add_action( 'admin_menu', 'remove_menus', 999 );


    // 表示名変更
    add_action( 'admin_menu', 'customize_admin_menu_label', 9999 );
    function customize_admin_menu_label(){
    global $menu;
    //print_r($menu);
    $menu[2][0] = '管理画面TOP';
    // $menu[5][0] = 'とうこう';
    // $menu[10][0] = 'めでぃあ';
    // $menu[20][0] = 'こていぺーじ';
    // $menu[25][0] = 'こめんと';
    // $menu[60][0] = 'がいかん';
    // $menu[65][0] = 'ぷらぐいん';
    // $menu[70][0] = 'ゆーざー';
    // $menu[75][0] = 'つーる';
    // $menu[80][0] = 'せってい';
    }


    // 管理バーの更新通知
    add_action( 'wp_before_admin_bar_render', 'hide_before_admin_bar_render' ); 
    function hide_before_admin_bar_render() { 
    global $wp_admin_bar; $wp_admin_bar->remove_menu( 'updates' ); 
    }


    // WordPress本体のバージョンアップ通知
    add_filter('pre_site_transient_update_core', '__return_zero'); // 
    remove_action('wp_version_check', 'wp_version_check'); // 
    remove_action('admin_init', '_maybe_update_core');


    // プラグインアップデートの数値を消す
    add_action('admin_menu', 'remove_counts'); 
    function remove_counts(){ 
    global $menu,$submenu; $menu[65][0] = 'プラグイン'; $submenu['index.php'][10][0] = 'Updates'; 
    }


    // カスタムメニュー追加
    function add_page_to_admin_menu() {
    add_menu_page( 'ギャラリー画像', 'ギャラリー画像', 'manage_options', 'post.php?post=70&action=edit', '', 'dashicons-format-gallery', 7);
    add_menu_page( '料金一覧', '料金一覧', 'manage_options', 'post.php?post=11&action=edit', '', 'dashicons-money-alt', 8);
    add_menu_page( 'よくある質問', 'よくある質問', 'manage_options', 'post.php?post=784&action=edit', '', 'dashicons-admin-users', 9);
    }
    add_action( 'admin_menu', 'add_page_to_admin_menu' );


    // 投稿ページの本文入力できないようにする
    add_action( 'init' , 'my_remove_post_support' );
    function my_remove_post_support() {
        remove_post_type_support('campaign','editor'); 
        remove_post_type_support('voice','editor'); 
        remove_post_type_support('about-us','editor'); 
        remove_post_type_support('about-us','editor'); 
        remove_post_type_support('about-us','editor'); 
    }


    // 固定ページの本文入力できないようにする
    add_filter('use_block_editor_for_post',function($use_block_editor,$post){
        if($post->post_type==='page'){
            if(in_array($post->post_name,['top','about-us','price','faq','sidebar','thanks','contact','sitemap','information','blog'])){ 
                remove_post_type_support('page','editor');
                return false;
            }
        }
        return $use_block_editor;
    },10,2);