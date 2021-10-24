<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Basic-blog
 * @since Basic-blog
 */

get_header(); ?>

<div class="drawer">
<?php
	wp_nav_menu(
		array(
			'depth'           => 1,
			'theme_location'  => 'drawer',
			'container'       => 'nav',
			'container_class' => 'drawer-nav',
			'menu_class'      => 'drawer-list',
		)
	);
	?>
</div>

<div class="content">
<div class="inner">
	<main class="main">
	<div class="error">
		<h1 class="error-ttl">404</h1>
		<p class="error-txt">申し訳ございません。<br>お探しのページは見つかりませんでした。</p>
		<div class="error-btn">
			<a href="<?php echo esc_url( home_url( '' ) ); ?>">HOME</a>
		</div>
	</div>
	</main>
<aside class="aside">
	<?php get_sidebar(); ?>
</aside>
</div>
</div>

<?php get_footer(); ?>
