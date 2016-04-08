<?php if ($mod==""){
	header('location:../../404.php');
}else{
?>
<!-- 
*******************************************************
	Include Header Template
******************************************************* 
-->
<?php include_once "po-content/$folder/header.php"; ?>


<!-- 
*******************************************************
	Main Content Template
******************************************************* 
-->
        <?php
            $title = $val->validasi($_GET['idp'],'xss');
            $tablepag = new PoTable('pages');
            $currentPag = $tablepag->findByAnd(seotitle, $title, active, 'Y');
            $currentPag = $currentPag->current();
            $idpag = $currentPag->id_pages;
            $content = $currentPag->content;
            $content = html_entity_decode($content);
        ?>
        <?php if ($currentPag != "0"){ ?>
        <div class="page">
            <div class="page_header clearfix page_margin_top">
                <div class="page_header_left">
                    <h1 class="page_title"><?=$currentPag->title;?></h1>
                </div>
                <div class="page_header_right">
                    <ul class="bread_crumb">
                        <li><a title="Beranda" href="<?=$website_url;?>">Beranda</a></li>
                        <li class="separator icon_small_arrow right_gray">&nbsp;</li>
                        <li>Pages</li>
                        <li class="separator icon_small_arrow right_gray">&nbsp;</li>
                        <li><?=$currentPag->title;?></li>
                    </ul>
                </div>
            </div>
            <div class="page_layout clearfix">
                <div class="divider_block clearfix">
                    <hr class="divider first"><hr class="divider subheader_arrow"><hr class="divider last">
                </div>
                <div class="row page_margin_top">
                    <div class="column column_1_2">
                        <img class="responsive pr_preload" src="<?=$website_url;?>/po-content/po-upload/<?=$currentPag->picture;?>" alt="<?=$currentPag->title;?>">
                    </div>
                    <div class="column column_1_2">
                        <h1 class="about_title"><?=$currentPag->title;?></h1>
                        <p class="text padding_top_0 page_margin_top"><?=$content;?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php }else{ ?>
        <div class="page">
            <div class="page_header clearfix page_margin_top">
                <div class="page_header_left">
                    <h1 class="page_title">Error 404</h1>
                </div>
                <div class="page_header_right">
                    <ul class="bread_crumb">
                        <li><a title="Home" href="<?=$website_url;?>">Beranda</a></li>
                        <li class="separator icon_small_arrow right_gray">&nbsp;</li>
                        <li>Error 404</li>
                    </ul>
                </div>
            </div>
            <div class="page_layout clearfix">
                <div class="divider_block clearfix">
                    <hr class="divider first"><hr class="divider subheader_arrow"><hr class="divider last">
                </div>
                <div class="row page_margin_top">
                    <div class="column column_1_1">
                        <div class="item_content clearfix">
                            <span class="features_icon not_found animated_element animation-scale"></span>
                            <div class="text">
                                <h1 class="about_title">Page</h1>
                                <h1 class="about_subtitle">Not Found</h1>
                            </div>
                        </div>
                        <h3 class="page_margin_top">We're sorry but we can't seem find the page you requested.<br>This might be because you have typed the web address incorrectly.</h3>
                        <p class="padding_top_30">In the meantime, try one of options listed below:</p>
                        <h3 class="margin_top_20">Go To Page:</h3>
                        <ul class="list no_border indent spacing">
                            <li class="bullet style_2"><a title="Beranda" href="<?=$website_url;?>">Beranda</a></li>
                            <li class="bullet style_2"><a title="Tentang Kami" href="<?=$website_url;?>/pages/tentang-kami">Tentang Kami</a></li>
                            <li class="bullet style_2"><a title="Kontak" href="<?=$website_url;?>/contact">Kontak</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>


<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>