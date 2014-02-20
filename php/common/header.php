<?php
/* Set correct paths for development and for export */
$path = PROJECT_PATH;
if (isset ($export)): $path = ''; endif;
?>
<!doctype html>
<html lang="cs" dir="ltr" class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?php echo PROJECT_NAME ?> | <?php echo $templateName ?></title>
	<link rel="stylesheet" media="all" href="<?php echo $path;?>_ui/css/main.css"<?php if (!isset ($export)):?> id="css"<?php endif; ?>>
	<!--[if lte IE 8]>
  		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>_ui/css/ie8.css">
		<script src="<?php echo $path;?>_ui/js/modules/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $path;?>apple-touch-icon-144x144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $path;?>apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $path;?>apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo $path;?>apple-touch-icon-precomposed.png">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="#">
	<meta property="og:title" content="">
	<meta property="og:url" content="">
	<meta property="og:description" content="">
	<meta property="og:image" content="<?php echo $path;?>apple-touch-icon-144x144-precomposed.png">
	<script src="<?php echo $path;?>_ui/js/modules/modernizr.js"></script>
</head>
<body>

	<div class="container">

		<nav id="accessibility-nav" class="sr-only">
			<ol>
				<li><a href="#navigation">Přejít k navigaci</a></li>
				<li><a href="#content">Přejít na obsah</a></li>
				<li><a href="#sidebar">Přejít k postrannímu sloupci</a></li>
				<li><a href="http://www.ippi.cz/klavesove-zkratky/zakladni.html" accesskey="1">Klávesové zkratky</a>
			</ol>
		</nav>
		<!-- / accessibility-nav -->

		<header id="header">
			<h1 class="site-name">
				<a href="#" rel="home" title="Přejít na úvodní stránku" accesskey="2" role="banner"><img src="<?php echo $path;?>_ui/gfx/logo.png" alt="Site name"></a>
			</h1>
		</header>
		<!-- / header -->

		<a class="btn btn-default toggle-menu">Menu</a>

		<nav id="navigation" role="navigation" aria-label="Hlavní menu">
			<ul>
				<li<?php if($menu === 'uvod'): echo ' class="active"'; endif; ?>><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
			</ul>
		</nav>
		<!-- / navigation -->
