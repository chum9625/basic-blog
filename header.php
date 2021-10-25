<?php
/**
 * The header.
 *
 * @package WordPress
 * @subpackage Basic-blog
 * @since Basic-blog
 */

?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no">
	<meta name="descryption" content="ベーシックなオリジナルテーマ">

<?php wp_head(); ?>
</head>

<body>
<header class="header spikes">
	<div class="inner">
		<div class="header-box">
			<div class="header-ttl">
				<a href="<?php echo esc_url( home_url('') ); ?>"><?php bloginfo( 'name' ); ?></a>
			</div>
			<p class="header-catch pc"><?php bloginfo( 'description' ); ?></p>
		</div>

	<?php
		wp_nav_menu(
			array(
				'depth'           => 1,
				'theme_location'  => 'header',
				'container'       => 'nav',
				'container_class' => 'header-nav pc',
				'menu_class'      => 'header-list',
			)
		);
		?>

		<div class="header-icon js-header-icon">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</header>
