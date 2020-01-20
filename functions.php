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


// Put items on admin toolbar
function kpu_update_adminbar($wp_adminbar) {

	// add OpenETC-admin main node
	$wp_adminbar->add_node([
		'id' => 'kpu-admin',
		'title' => 'kpu-admin',
		'href' => '',
		'meta' => [
			'target' => 'sitepoint'
		]
	]);

	// add sub-menu item: All Sites
	$wp_adminbar->add_node([
		'id' => 'kpu-all-sites',
		'title' => 'All Sites Listing',
		'parent' => 'kpu-admin',
		'href' => 'https://wordpress.kpu.ca/all-sites/',
		'meta' => [
			'target' => 'kpu'
		]
	]);

	// Clone Zone menu and subs

	// add Clone Zone group
	$wp_adminbar->add_group([
		'id' => 'kpu-clonezone-group',
		'parent' => 'kpu-admin',
	]);

	// add sub-menu item: Clone zone
	$wp_adminbar->add_node([
		'id' => 'kpu-clonezone',
		'title' => 'Clone Zone',
		'parent' => 'kpu-clonezone-group',
		'href' => 'https://wordpress.kpu.ca/clone-zone/',
		'meta' => [
			'target' => 'kpu'
		]
	]);

	// add sub-menu item: Clone Zone Templates
	$wp_adminbar->add_node([
		'id' => 'kpu-clone-templates',
		'title' => 'Clone Zone Templates',
		'parent' => 'kpu-clonezone-group',
		'href' => 'https://wordpress.kpu.ca/clone/',
		'meta' => [
			'target' => 'kpu'
		]
	]);

	// Docs area

	// add Docs group
	$wp_adminbar->add_group([
		'id' => 'kpu-docs-group',
		'parent' => 'kpu-admin',
	]);

	// add sub-menu item: User Onboarding
	$wp_adminbar->add_node([
		'id' => 'kpu-user-onboarding',
		'title' => 'User Onboarding',
		'parent' => 'kpu-docs-group',
		'href' => 'https://wordpress.kpu.ca/admin-docs/user-onboarding-options/',
		'meta' => [
			'target' => 'kpu'
		]
	]);

	// add sub-menu item: Development
	$wp_adminbar->add_node([
		'id' => 'kpu-dev',
		'title' => 'Development',
		'parent' => 'kpu-admin',
		'href' => 'https://wordpress.kpu.ca/admin-docs/in-development/',
		'meta' => [
			'target' => 'kpu'
		]
	]);
}

// ltig_admin_bar_menu hook
add_action('admin_bar_menu', 'kpu_update_adminbar', 999);

