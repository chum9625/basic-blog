<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Test Blog
 * @since Test Blog
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
				<?php
				$category = get_the_category();
				echo '<a href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '">' . esc_html( $category[0]->name ) . '</a>';
				?>
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
		<div class="article-meta">
			<time class="article-published"><?php the_time( 'Y/n/j' ); ?></time>
			<?php if ( get_the_date() !== get_the_modified_date() ) : ?>
			<time class="article-updated"><?php the_modified_date( 'Y/n/j' ); ?></time>
			<?php endif; ?>
		</div>
		<div class="article-img">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			?>
		</div>
		</div>
		<div class="article-body">
			<?php the_content(); ?>
		</div>
	</article>
			<?php
	endwhile;
	endif;
	?>
	<?php
	the_post_navigation(
		array(
			'prev_text' => '前の記事',
			'next_text' => '次の記事',
		)
	);
	?>

	</main>
<aside class="aside">
	<?php get_sidebar(); ?>
</aside>
</div>
</div>

<?php get_footer(); ?>
