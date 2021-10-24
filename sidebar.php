<?php
/**
 * The template for displaying sidebar
 *
 * @package WordPress
 * @subpackage Basic-blog
 * @since Basic-blog
 */

if ( is_active_sidebar( 'sidebar' ) ) {
	dynamic_sidebar( 'sidebar' );
}
