<?php
function enqueue_child_theme_styles() {
	$parent_style = 'lovecraft';
  wp_enqueue_style( $parent_style, get_template_directory_uri().'/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style )
	);

}
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);


// Embed template parts for sign-up form. Note: article tag is opened in custom_signup_docs.php
// and is closed in custom_signup_docs_close.php
function custom_signup_docs() {
get_template_part( 'template_parts/custom_signup_docs' );
}
add_action( 'before_signup_form', 'custom_signup_docs' );

function custom_signup_docs_close() {
get_template_part( 'template_parts/custom_signup_docs_close' );
}
add_action( 'after_signup_form', 'custom_signup_docs_close' );
