<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package preschool
 */
?>

<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php wp_head(); ?>
	</head>

	<body>

		<!-- navbar top -->
		<nav class="navbar navbar-top">
			<div class="container pad-out">
				<div class="row">
					<div class="col-md-2">
						<a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
					</div>
					<div class="col-md-3 col-md-offset-7">
						<form class="form-inline pull-right">
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" id="exampleInputAmount" placeholder="Search...">
									<div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</nav>
		<!-- /.navbar top -->

		<!-- header -->
		<header class="container">
			<h1 class="text-center">Pattashi Janakalyan Secondary School &amp; College</h1>
			<h4 class="text-center">EIIN: 131209</h4>
			<h4 class="text-center">School Code: 2526</h4>
		</header>
		<!-- /.header -->

		<!-- navbar main -->
		<div class="container pad-out">
			<nav class="navbar navbar-default" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> <!-- /.navbar-header -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-main">
					<?php preschool_header_menu(); ?> <!-- main navigation -->
				</div> <!-- /.navbar-collapse -->
			</nav>
		</div>
		<!-- /.navbar main -->
