<?php get_header(); ?>

<main id="site-content" class="section-inner">
<h2>Listing of All Trubox Sites</h2>
	<?php
			// Display related posts
			get_template_part( 'template_parts/all-sites-listing' );
	?>

</main><!-- #site-content -->

<?php get_footer(); ?>