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
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2" />

    <!-- Stylesheets -->
    <link href='//fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?=$website_url;?>/po-content/<?=$folder;?>/style/reset.css">
    <link rel="stylesheet" type="text/css" href="<?=$website_url;?>/po-content/<?=$folder;?>/style/superfish.css">
    <link rel="stylesheet" type="text/css" href="<?=$website_url;?>/po-content/<?=$folder;?>/style/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="<?=$website_url;?>/po-content/<?=$folder;?>/style/jquery.qtip.css">
    <link rel="stylesheet" type="text/css" href="<?=$website_url;?>/po-content/<?=$folder;?>/style/style.css">
    <link rel="stylesheet" type="text/css" href="<?=$website_url;?>/po-content/<?=$folder;?>/style/menu_styles.css">
    <link rel="stylesheet" type="text/css" href="<?=$website_url;?>/po-content/<?=$folder;?>/style/animations.css">
    <link rel="stylesheet" type="text/css" href="<?=$website_url;?>/po-content/<?=$folder;?>/style/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?=$website_url;?>/po-content/<?=$folder;?>/style/odometer-theme-default.css">

    <!-- Favicons -->
	<link rel="shortcut icon" href="<?=$website_url;?>/<?=$favicon;?>" />

	<script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <div class="site_container">
        <div class="header_top_bar_container clearfix">
            <div class="header_top_bar">
                <form class="search" method="post" action="<?=$website_url;?>/search-result/">
                    <input type="text" name="search" placeholder="Search..." value="Search..." class="search_input hint">
                    <input type="submit" class="search_submit" value="">
                </form>
                <ul class="social_icons clearfix">
                    <li><a target="_blank" href="javascript:void(0);" class="social_icon facebook" title="facebook">&nbsp;</a></li>
                    <li><a target="_blank" href="javascript:void(0);" class="social_icon twitter" title="twitter">&nbsp;</a></li>
                    <li><a href="javascript:void(0);" class="social_icon mail" title="mail">&nbsp;</a></li>
                </ul>
                <div class="latest_news_scrolling_list_container">
                    <ul>
                        <li class="category">INFO</li>
                        <li class="left"><a href="javascript:void(0);"></a></li>
                        <li class="right"><a href="javascript:void(0);"></a></li>
                        <li class="posts">
                            <ul class="latest_news_scrolling_list">
                                <li><a href="javascript:void(0);" title="">Buatlah Website Kreatif dan Inovatif Sekarang dengan PopojiCMS</a></li>
                                <li><a href="javascript:void(0);" title="">Dengan PopojiCMS Kini Semua Orang Bisa Punya Website Keren</a></li>
                                <li><a href="javascript:void(0);" title="">Kami Berusaha untuk Selalu Ada Menghadirkan Sesuatu yang Baru</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header_container">
            <div class="header clearfix">
                <div class="logo">
                    <h1><a href="<?=$website_url;?>" title="Pressroom">Pressroom</a></h1>
                    <h4>Buat Sendiri Rasa Webmu dengan PopojiCMS</h4>
                </div>
                <div class="placeholder">728 x 90</div>
            </div>
        </div>
        <div class="menu_container clearfix">
            <nav>
                <?php 
                    $instance = new PoController;
                    $menu = $instance->popoji_menu(1, 'class="sf-menu"', 'class="submenu"');
                ?>
                <?php echo $menu; ?>
            </nav>
            <div class="mobile_menu_container">
                <a href="#" class="mobile-menu-switch"><span class="line"></span><span class="line"></span><span class="line"></span></a>
                <div class="mobile-menu-divider"></div>
                <nav>
                     <?php 
                        $menu2 = $instance->popoji_menu(1, 'class="mobile-menu"', 'class="submenu"');
                    ?>
                    <?php echo $menu2; ?>
                </nav>
            </div>
        </div>	
<?php } ?>