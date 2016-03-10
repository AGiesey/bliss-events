<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage blissevents
 */
 get_header();
?>
<div class="container main-body reveal-div">
	<div class="row">
		<div class="col-xs-5 reveal-div height-max">
			<?php 
			dynamic_sidebar( 'home_reviews' );
			dynamic_sidebar( 'home_widget_2' ); 
			?>	
		</div>
		<div class="col-xs-7 reveal-div height-max">
			<div class="row" >
				<div class="col-xs-12 text-center reveal-div ">
					<img src="http://www.weddingthingz.com/wp-content/uploads/2016/02/1-8.jpg" alt="" style="max-width:100%; margin:10px inherit">
				</div>
				<div class="col-xs-12 reveal-div">
					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							the_content();

							// If comments are open or we have at least one comment, load up the comment template.
							//if ( comments_open() || get_comments_number() ) {
								//comments_template();
							//}
						endwhile;
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>

