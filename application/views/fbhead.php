<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
	<!-- For cacheing offline page in a way that doesn't cache this page -->
	<iframe src="/offline.html" style="display: none;"></iframe>
	
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
		 
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php 
		if(isset($title)){
			echo "<title>" . $title . "</title>";
		} else {
			echo "<title>Tiitel puudub</title>";
		}
		?>
				
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!-- jQuery fallback -->
		<script>window.jQuery || document.write('<script src="js/jquery-3.1.1.min.js"><\/script>')</script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<!-- JavaScript local fallback -->
		<script>if(typeof($.fn.modal) === 'undefined') {document.write('<script src="js/bootstrap.min.js"><\/script>')}</script>
		<!-- Tooltip initialization -->
		<!--<script src="js/tooltip_script.js"></script>-->

		<!-- Bootstrap Date-Picker Plugin -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<!-- Date Picker configuration script-->
		<script src="<?php echo base_url(); ?>js/pickDates.js"></script>
		<!-- lokaliseerimiseks -->
		<!-- <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>-->
		<!-- <script type="text/javascript" src="js/datepicker-et.js"></script>-->


		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
			integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
			crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" 
			href="css/bootstrap.min.css">

		<script src="<?php echo base_url(); ?>js/loadMore.js"></script>
		<script src="<?php echo base_url(); ?>js/loadContacts.js"></script>
		<script type='text/javascript'>var php_OFFERSPRESENTED = <? echo OFFERSPRESENTED ?></script>

	</head>
	<body>
	<!-- Navbar -->
    <nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- V�ikesel ekraanil kaovad navbarilt nupud �ra ja tuleb nupp asemele -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">
					<!-- Hides information from screen readers -->
					<span class="sr-only"></span>
					<!-- Joonistab nupule 3 triipu #aesthetics -->
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="nav navbar-nav">
					<!-- <li><a href="<?php echo base_url(); ?>" class="navbar-brand"><img class="img" alt="Jooksupoiss_logo" src="<?php echo base_url(); ?>/images/logo1-1.jpg"/></a></li> -->
					<li><a href="<?php echo base_url(); ?>" class="navbar-brand">Jooksupoiss</a></li>
					<li class="all"><a href="<?php echo base_url(); ?>"><?php echo lang("MENU_HOME"); ?><span class="sr-only">(current)</span></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url(); ?>User_authentication/index"><?php echo lang("LOGGED_IN_MENU_USER"); ?><span class="sr-only">(current)</span></a></li>
					<li><a href="<?php echo base_url(); ?>User_authentication/logout"><?php echo lang("LOGGED_IN_MENU_LOG_OUT"); ?><span class="sr-only">(current)</span></a></li>
					<li><a href="<?php echo base_url(); ?>index.php/welcome/vahetaKeelt/estonian"><img class="img" alt="estonian flag" src="<?php echo base_url(); ?>images/est.png"/></a></li>
					<li><a href="<?php echo base_url(); ?>index.php/welcome/vahetaKeelt/english"><img class="img" alt="united kingdom flag" src="<?php echo base_url(); ?>images/uk.png"/></a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
    </nav>