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
function openetc_update_adminbar($wp_adminbar) {

	// add OpenETC main node
	$wp_adminbar->add_node([
		'id' => 'openetc',
		'title' => 'OpenETC',
		'href' => '',
		'meta' => [
			'target' => 'sitepoint'
		]
	]);

	// add sub-menu item: All Sites
	$wp_adminbar->add_node([
		'id' => 'openetc-all-sites',
		'title' => 'All Sites Listing',
		'parent' => 'openetc',
		'href' => 'https://opened.ca/openetc-sites-directory/all-sites/',
		'meta' => [
			'target' => 'openetc'
		]
	]);

	// Clone Zone menu and subs

	// add Clone Zone group
	$wp_adminbar->add_group([
		'id' => 'openetc-clonezone-group',
		'parent' => 'openetc',
	]);

	// add sub-menu item: Clone zone
	$wp_adminbar->add_node([
		'id' => 'openetc-clonezone',
		'title' => 'Clone Zone',
		'parent' => 'openetc-clonezone-group',
		'href' => 'https://opened.ca/clone-zone/',
		'meta' => [
			'target' => 'openetc'
		]
	]);

	// add sub-menu item: Clone Zone Templates
	$wp_adminbar->add_node([
		'id' => 'openetc-clone-templates',
		'title' => 'Clone Zone Templates',
		'parent' => 'openetc-clonezone-group',
		'href' => 'https://opened.ca/clone/',
		'meta' => [
			'target' => 'openetc'
		]
	]);

	// Docs area

	// add Docs group
	$wp_adminbar->add_group([
		'id' => 'openetc-docs-group',
		'parent' => 'openetc',
	]);

	// add sub-menu item: User Onboarding
	$wp_adminbar->add_node([
		'id' => 'openetc-user-onboarding',
		'title' => 'User Onboarding',
		'parent' => 'openetc-docs-group',
		'href' => 'https://opened.ca/admin-docs/user-onboarding-options/',
		'meta' => [
			'target' => 'openetc'
		]
	]);

	// add sub-menu item: Development
	$wp_adminbar->add_node([
		'id' => 'openetc-dev',
		'title' => 'Development',
		'parent' => 'openetc',
		'href' => 'https://opened.ca/admin-docs/in-development/',
		'meta' => [
			'target' => 'openetc'
		]
	]);
}

// ltig_admin_bar_menu hook
add_action('admin_bar_menu', 'openetc_update_adminbar', 999);

