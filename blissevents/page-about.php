<?php
/**
 * Template Name: About Page
 *
 * @package WordPress
 * @subpackage blissevents
 */
 get_header();
?>
<div class="container main-body reveal-div">
	<div class="row">
		<div class="col-xs-6 reveal-div height-max">
			<?php
				// check if the post has a Post Thumbnail assigned to it.
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('', array( 'class' => 'team-photo' ));
				} 
			?>
			<h2 class="text-center">About Bliss Events</h2>
			<p>Chadra-fan ben conan kiffar lumiya seerdon dooku vebb cordé. Djo nadd codru-ji isolder. Md-5 falleen shadda lars djo charal tarkin offee. Bel melodie -1b lars cassio moff sola defel watto. Whill bibble tyranus zam dat kyle naboo dexter. Joruus frozarns rattataki ree-yees wat tibor yarael. Lobot medon ansuroer desann lyn tibor abyssin ranat braxant.</p>
		</div>
		<div class="col-xs-6 reveal-div height-max">
			<h2 class="text-center">Manifesto</h2>
			<p>Lucas ipsum dolor sit amet gizka jamillia skywalker anakin rancisis zabrak bail t'landa zorba neimoidian. Chadra-fan ben conan kiffar lumiya seerdon dooku vebb cordé. Djo nadd codru-ji isolder. Md-5 falleen shadda lars djo charal tarkin offee. Bel melodie -1b lars cassio moff sola defel watto. Whill bibble tyranus zam dat kyle naboo dexter. Joruus frozarns rattataki ree-yees wat tibor yarael. Lobot medon ansuroer desann lyn tibor abyssin ranat braxant. Gamorrean frozarns secura chommell. Kenobi sifo-dyas jerec dexter roonan.

            Ralter axmis tusken raider braxant skywalker conan. Rakata fel kalarba klatooinian chagrian mara jan. Quinlan md-5 arcona vor. Jawa cathar darklighter klivian logray jeremoch. Yowza jamillia maul polis var paaerduag pau'an wookiee shaak. Zabrak darpa lando xizor codru-ji mayagil antemeridian dak vagaari. Kitonak shadda tund tib kel. Alderaan ti bespin fel owen firrerreo bib tchuukthai windu. Tiin gand gamorr togorian. Halla kal hutt irek halla bria chirrpa dantooine dantooine. Darth piett jabba ruurian.</p>
		</div>
	</div>
	<div class="row reveal-div">
		<div class="col-xs-12">	
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
<?php get_footer(); ?>