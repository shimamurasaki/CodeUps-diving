<?php

function custom_enqueue_scripts() {
    // Google Fonts
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '<link href="https://fonts.googleapis.com/css2?family=Gotu&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP&display=swap" rel="stylesheet">';
    
    // Swiper CSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    
    // Custom CSS
    wp_enqueue_style('custom-style', get_theme_file_uri('/assets/css/style.css'));

    // jQuery
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), null, true);
    
    // jQuery inView Plugin
    wp_enqueue_script('jquery-inview', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.inview/1.0.0/jquery.inview.min.js', array('jquery'), null, true);
    
    // Swiper JS
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    
    // Custom JS
    wp_enqueue_script('custom-script', get_theme_file_uri('/assets/js/script.js'), array(), null, true);
}
add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');


function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
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
add_action( 'after_setup_theme', 'my_setup' );


//アーカイブの表示件数変更
function change_posts_per_page($query) {
    if ( is_admin() || ! $query->is_main_query() )
        return;
    if ( $query->is_archive('voice') ) { //カスタム投稿タイプを指定
        $query->set( 'posts_per_page', '8' ); //表示件数を指定
    }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );


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
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}

