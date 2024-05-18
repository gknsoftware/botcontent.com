<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ooops! | Weboti</title>
	<style type="text/css">
	@edi/* Fonts Imported from Google */
	@import url(http://fonts.googleapis.com/css?family=Open+Sans:600,400);
	@import url(http://fonts.googleapis.com/css?family=Lato:400,900);
	@import url(http://fonts.googleapis.com/css?family=Oswald:400,700);
	@import url(http://fonts.googleapis.com/css?family=Titillium+Web:400,600,700);

	body{
		margin: 0;
		padding: 0;
		color: #000;
		font-family: 'Titillium Web', sans-serif;
	}

	a{
		color: #06f;
		text-decoration: none;
	}

	ul{
		margin: 0;
		padding: 0;
	}

	ul li{
		display: inline-block;
		margin: 0 10px;
	}

	a:hover{
		color: #F2274C;
	}
	
	#container{
		width: 100%;
		padding: 50px 0;
		text-align: center;
	}

	#container h1{
		font-size: 2.8em;
		font-weight: 600;
	}

	#container h3{
		font-size: 2em;
		font-weight: 400;
	}
	</style>
</head>
<body>
	<div id="container">
		<img src="<?php echo get_asset('img', 's-logo.png'); ?>" alt="Logo">
		<h1><?php echo $this->lang->line('lang_err_explink_header'); ?></h1>
		<h3><?php echo $this->lang->line('lang_err_explink_subheader'); ?></h4>

		<ul>
			<li><a href="<?php echo base_url(); ?>">&laquo; <?php echo $this->lang->line('lang_err_explink_backtohome'); ?></a></li>
			<li><a href="<?php echo route('register'); ?>">&#43; <?php echo $this->lang->line('lang_err_explink_register'); ?></a></li>
			<li><a href="<?php echo route('login'); ?>">&#64; <?php echo $this->lang->line('lang_err_explink_login'); ?></a></li>
		</ul>
	<!-- #container --> </div>
</body>
</html>