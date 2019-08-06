<?php get_header(); ?>

<div class="wrapper section">

	<div class="section-inner">

		<div class="content">
			<h2>Listing of All Trubox Sites</h2>
			<?php
			// Display subsite listing
			get_template_part( 'template_parts/all-sites-listing' );
			?>

		</div><!-- .content -->

	</div><!-- .section-inner -->

</div><!-- .wrapper -->

<?php get_footer(); ?>
