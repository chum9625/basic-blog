<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage Basic-blog
 * @since Basic-blog
 */

?>
<footer class="footer">
<div class="inner">
<?php
	wp_nav_menu(
		array(
			'depth'           => 1,
			'theme_location'  => 'footer',
			'container'       => 'nav',
			'container_class' => 'footer-nav',
			'menu_class'      => 'footer-list',
		)
	);
	?>
	<p class="footer-copy">&copy;ちゃむてっく</p>
</div>
</footer>

<div class="scroll js-scroll">
	<i class="fas fa-angle-up"></i>
</div>

<?php wp_footer(); ?>
</body>
</html>
