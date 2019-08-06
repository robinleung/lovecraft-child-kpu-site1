<?php // Site listing
$args = array (
	'count' => false,
	'number' => 700,
);

$subsites = get_sites($args);
if ( ! empty( $subsites )) {
	echo '<p>Site ID/Name (linked)</p>';
	echo '<ul class="all-sites">';
	foreach ( $subsites as $subsite ) {
		$subsite_id   = get_object_vars( $subsite )["blog_id"];
		$subsite_name = get_blog_details( $subsite_id )->blogname;
		$subsite_link = get_blog_details( $subsite_id )->siteurl;
		echo '<li class="site-' . $subsite_id . '">' . $subsite_id . ' / ' . '<a href="' . $subsite_link . '">' . $subsite_name . '</a></li>';
	}
	echo '</ul>';
}
?>