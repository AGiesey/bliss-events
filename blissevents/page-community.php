<?php
/**
 * Template Name: Community
 *
 * @package WordPress
 * @subpackage blissevents
 */
 get_header();
?>

<div class="container main-body">
	<div class="row">
		<div class="col-xs-12 reveal-div text-center">
			<img src="http://warmheartedmatchmaking.com/images/collage.jpg" alt="page-community.php" style="max-width:100%; margin-top:10px;">
		</div>
	</div>
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