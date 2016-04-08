<?php if ($mod==""){
	header('location:../../404.php');
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<!-- Your Basic Site Informations -->
	<title><?php include "title.php"; ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="<?php include "meta-desc.php"; ?>" />
    <meta name="keywords" content="<?php include "meta-key.php"; ?>" />
    <meta http-equiv="Copyright" content="popojicms" />
    <meta name="author" content="Dwira Survivor" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="language" content="Indonesia" />
    <meta name="revisit-after" content="7" />
    <meta name="webcrawlers" content="all" />
    <meta name="rating" content="general" />
    <meta name="spiders" content="all" />

    <!-- Social Media Meta -->
    <?php include "meta-social.php"; ?>

    <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width" />

    <!-- Stylesheets -->
	<link rel="stylesheet" href="<?=$website_url;?>/po-content/<?=$folder;?>/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?=$website_url;?>/po-content/<?=$folder;?>/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="<?=$website_url;?>/po-content/<?=$folder;?>/assets/css/neon.css">

	<script src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/jquery-1.11.0.min.js"></script>

	<!--[if lt IE 9]><script src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

    <!-- Favicons -->
	<link rel="shortcut icon" href="<?=$website_url;?>/<?=$favicon;?>" />

	<script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
	<div class="wrap">
		<!-- Logo and Navigation -->
		<div class="site-header-container container">
			<div class="row">
				<div class="col-md-12">
					<header class="site-header">
						<section class="site-logo">
							<a href="<?=$website_url;?>"><img src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/images/logo@2x.png" width="120" /></a>
						</section>
						<nav class="site-nav">
							<ul class="main-menu hidden-xs" id="main-menu">
								<li class="search">
									<a href="#"><i class="entypo-search"></i></a>
									<form method="post" class="search-form" action="<?=$website_url;?>/search-result/" enctype="application/x-www-form-urlencoded">
										<input type="text" class="form-control" name="search" placeholder="Type to search..." />
									</form>
								</li>
							</ul>
							<?php
								$instance = new PoController;
								$menu = $instance->popoji_menu(2, 'class="main-menu hidden-xs" id=""main-menu"', '');
							?>
							<?php echo $menu; ?>
							<div class="visible-xs">
								<a href="#" class="menu-trigger"><i class="entypo-menu"></i></a>
							</div>
						</nav>
					</header>
				</div>
			</div>
		</div>
<?php } ?>