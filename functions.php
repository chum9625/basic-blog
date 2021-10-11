<?php
/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage Test Blog
 * @since Test Blog
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
