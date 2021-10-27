<?php
/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage Basic-blog
 * @since Basic-blog
 */

?>

<?
function theme_setup() {
	// アイキャッチの有効化--!
	add_theme_support( 'post-thumbnails' );

	// RSSフィードリンクを自動生成する--!
	add_theme_support( 'automatic-feed-links' );

	// titleタグを自動生成する--!
	add_theme_support( 'title-tag' );

	// HTML5によるマークアップを行う--!
	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'theme_setup' );

function script_init() {
	//Font Awesomeの読み込み
	wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css');

	//CSSの読み込み
	wp_enqueue_style('my_style', get_theme_file_uri('/assets/css/style.css'));

	//JavaScriptの読み込み
	wp_enqueue_script('my_script', get_theme_file_uri('/assets/js/main.js'), array('jquery'));
}
add_action('wp_enqueue_scripts', 'script_init');

function menu_init() {
	//メニューを有効化する
	register_nav_menus(array(
		'header' => 'ヘッダーメニュー',
		'footer' => 'フッターメニュー',
		'drawer' => 'ドロワーメニュー',
		)
	);
}
add_action('after_setup_theme', 'menu_init');

function theme_widget_init() {
	//ウィジェットの有効化
	register_sidebar(array(
		'name' => 'サイドバー',
		'id' => 'sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
		)
	);
}
add_action('widgets_init', 'theme_widget_init');


function announce_add_dashboard_widgets() {
	//ダッシュボードにお知らせ追加
  wp_add_dashboard_widget(
    'announce_dashboard_widget',
    'お読みください',
    'announce_dashboard_widget_function'
  );
}
function announce_dashboard_widget_function() {
  echo '
  <h2>注意事項</h2>
  <p>スラッグは英語表記でお願いします。</p>
  <hr>
  <h2>駒猫：アクセス解析レポート</h2>
	<p><a href="https://datastudio.google.com/s/hCSJPtIbPy0" target="_blank" rel="noopener noreferrer">こちらをクリック</a>
	</p>
  ';
}
add_action('wp_dashboard_setup', 'announce_add_dashboard_widgets');

function remove_menus () {
	//管理者以外のユーザーは左メニュー以下の項目を非表示
	if (!current_user_can('administrator')) {
	remove_menu_page('wpcf7'); //Contact Form 7
		remove_menu_page( 'upload.php' );                 // メディア
		remove_menu_page( 'edit-comments.php' );          // コメント
		remove_menu_page( 'themes.php' ); // 外観
		remove_menu_page( 'users.php' ); // ユーザー
		remove_menu_page( 'profile.php' );                // プロフィール
		remove_menu_page( 'tools.php' );                  // ツール
		}
	}
	add_action('admin_menu', 'remove_menus');

	function wpqw_remove_dashboard_widget() {
		//ダッシュボードウィジェットを管理者以外全て非表示にする
		if ( ! current_user_can( 'administrator' ) ) {
			remove_action( 'welcome_panel', 'wp_welcome_panel' );
			remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
			remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
			remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
			remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		}
	}
	add_action( 'wp_dashboard_setup', 'wpqw_remove_dashboard_widget' );
