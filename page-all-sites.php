<?php get_header(); ?>

<script>
    if(document.body.classList.contains("home")) {
        document.body.classList.remove("home");
    }

    if(document.body.classList.contains("page-template-default")) {
        document.body.classList.remove("page-template-default");
    }

    if(!document.body.classList.contains("openetc-all-sites")) {
        document.body.classList.add("openetc-all-sites");
    }

    if(!document.body.classList.contains("page-template-full-width-page-template")) {
        document.body.classList.add("page-template-full-width-page-template");
    }

    if(!document.body.classList.contains("page-template-full-width-page-template-php")) {
        document.body.classList.add("page-template-full-width-page-template-php");
    }

    if(!document.body.classList.contains("page-template")) {
        document.body.classList.add("page-template");
    }
</script>

<div class="wrapper section">

	<div class="section-inner">

		<div class="content">

			<div class="post">
				<div class="post-inner">
					<div class="post-content">

						<h2>Listing of All Opened Sites</h2>
						<?php
						// Display subsite listing
						get_template_part( 'template_parts/all-sites-listing' );
						?>

					</div>
				</div>
			</div>

		</div><!-- .content -->

	</div><!-- .section-inner -->

</div><!-- .wrapper -->

<?php get_footer(); ?>
