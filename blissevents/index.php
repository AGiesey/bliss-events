<?php get_header(); ?>

<div class="container main-body">
	<div class="row">
		<div class="col-xs-12 reveal-div">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					the_content();

				endwhile;
			?>
		</div>
	</div>		
</div>

<?php get_footer(); ?>