<?php
/**
 * The template for displaying sidebar
 *
 * @package WordPress
 * @subpackage Test Blog
 * @since Test Blog
 */

if ( is_active_sidebar( 'sidebar' ) ) {
	dynamic_sidebar( 'sidebar' );
}
