<?php
/**
 * Coaching Pro Theme
 *
 * This file handles the Blog Archive page for the Coaching Pro theme.
 *
 * @package Coaching Pro Theme
 * @author  thebrandiD
 * @license GPL-2.0+
 * @link    https://buildmybrandid.com/
 */

// Add a body class for the Blog Archive page.
add_filter( 'body_class', 'coaching_pro_blog_archive_body_class' );
function coaching_pro_blog_archive_body_class( $classes ) {
	$classes[] = 'blog-archive';
	return $classes;
}

// Open grid wrapper markup.
add_action( 'genesis_before_while', 'coachingpro_open_grid_wrapper', 1 );
function coachingpro_open_grid_wrapper() {
    genesis_markup( array(
		'open'    => '<div %s>',
		'context' => 'grid-wrapper',
	) );
}

// Close grid wrapper markup.
add_action( 'genesis_after_endwhile', 'coachingpro_close_grid_wrapper', 1 );
function coachingpro_close_grid_wrapper() {
    genesis_markup( array(
		'close'    => '</div>',
		'context' => 'grid-wrapper',
	) );
}

// Reposition Featured Images to display before Post Titles.
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 1 );

// Wrap blog post titles in h2 tags.
add_filter( 'genesis_entry_title_wrap', 'coaching_pro_post_title_wrap' );
function coaching_pro_post_title_wrap( $wrap ) {
	$wrap = 'h2';
	return $wrap;
}

// Customize the post header meta.
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter($post_info) {
	$post_info = '[post_date format="M j, Y"]';
	return $post_info;
}

// Remove the post footer meta.
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

genesis();
