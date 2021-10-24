<?php
/**
 * The template for displaying all page posts
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
	<div class="breadclumb">
		<ul class="breadclumb-list">
		<li class="breadclumb-home">
			<a href="<?php echo esc_url( home_url( '' ) ); ?>">HOME</a>
		</li>
		<li>
			<i class="fas fa-angle-right"></i>
		</li>
		<li>
			<?php the_title(); ?>
		</li>
		</ul>
	</div>
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
	<article class="article">
		<div class="article-header">
		<h1 class="article-ttl"><?php the_title(); ?></h1>
		</div>
		<div class="article-body">
			<?php the_content(); ?>
		</div>
	</article>
			<?php
	endwhile;
	endif;
	?>
	</main>
<aside class="aside">
	<?php get_sidebar(); ?>
</aside>
</div>
</div>

<?php get_footer(); ?>
