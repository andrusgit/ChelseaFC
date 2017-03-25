<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
		 
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pealeht</title>
				
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!-- jQuery fallback -->
		<script>window.jQuery || document.write('<script src="js/jquery-3.1.1.min.js"><\/script>')</script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<!-- JavaScript local fallback -->
		<script>if(typeof($.fn.modal) === 'undefined') {document.write('<script src="js/bootstrap.min.js"><\/script>')}</script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
			integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
			crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" 
			href="css/bootstrap.min.css">
	</head>
	<body>
	<!-- Navbar -->
    <nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Väikesel ekraanil kaovad navbarilt nupud ära ja tuleb nupp asemele -->
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
					<li class="all"><a href="<?php echo base_url(); ?>">Pealeht<span class="sr-only">(current)</span></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url(); ?>users/registration">Registreeru<span class="sr-only">(current)</span></a></li>
					<li><a href="<?php echo base_url(); ?>users/login">Logi sisse<span class="sr-only">(current)</span></a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
    </nav>