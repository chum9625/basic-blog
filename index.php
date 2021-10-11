<?php
/**
 * The main template file
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
		<!-- 表示する投稿があるかどうかの判定     -->
		<?php if ( have_posts() ) : ?>
		<div class="entry">
			<!-- 表示する記事がある間はループする    -->
			<?php
			while ( have_posts() ) :
				the_post();
				?>
			<article class="entry-card">
				<a href="<?php the_permalink(); ?>" class="entry-link">
				<div class="entry-img">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
					?>
				</div>
				<h1 class="entry-ttl"><?php the_title(); ?></h1><!-- /.entry-ttl -->
				<div class="entry-meta">
					<div class="entry-category">
						<?php
						$category = get_the_category();
						echo esc_html( $category[0]->name );
						?>
					</div>
					<time class="entry-date"><?php the_time( 'Y/n/j' ); ?></time>
				</div>
				<p class="entry-excerpt"><?php the_excerpt(); ?></p>
				</a>
			</article>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>

	<?php if ( paginate_links() ) : ?>
	<div class="pagination">
		<?php
		echo (
			paginate_links(
				array(
					'mid_size'  => 1,
					'prev_text' => '<i class="fas fa-angle-left"></i>',
					'next_text' => '<i class="fas fa-angle-right"></i>',
				)
			)
		);
		?>
	</div>
	<?php endif; ?>
	</main>
	<aside class="aside">
		<?php get_sidebar(); ?>
	</aside>
</div>
</div>

<?php get_footer(); ?>
