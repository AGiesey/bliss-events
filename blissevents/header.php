<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php wp_head(); ?>
</head>
<body>
	<header class="navbar-static-top">
		<div class="container-fluid reveal-div">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-xs-4 reveal-div height-200">
							
						</div>
						<div class="col-xs-4 reveal-div height-200 text-center">
							<h1>LOGO</h1>
						</div>
						<div class="col-xs-4 reveal-div height-200 text-right">
							<p>Contact us xxx-xxx-xxxx</p>
							<p>info@oooo.com</p>
						</div>
					</div>
					<div class="row reveal-div">
						<div class="col-xs-12">
							<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'header_nav' ) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
