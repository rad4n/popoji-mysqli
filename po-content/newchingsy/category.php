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
            $title = $val->validasi($_GET['idc'],'xss');
            $tabledcat = new PoTable('category');
            $currentDcat = $tabledcat->findByAnd(seotitle, $title, active, 'Y');
            $currentDcat = $currentDcat->current();
            $iddcat = $currentDcat->id_category;
        ?>
        <?php if ($currentDcat != "0"){ ?>
        <div class="page">
            <div class="page_header clearfix page_margin_top">
                <div class="page_header_left">
                    <h1 class="page_title"><?=$currentDcat->title;?></h1>
                </div>
                <div class="page_header_right">
                    <ul class="bread_crumb">
                        <li><a title="Beranda" href="<?=$website_url;?>">Beranda</a></li>
                        <li class="separator icon_small_arrow right_gray">&nbsp;</li>
                        <li><?=$currentDcat->title;?></li>
                    </ul>
                </div>
            </div>
            <div class="page_layout clearfix">
                <div class="divider_block clearfix">
                    <hr class="divider first"><hr class="divider subheader_arrow"><hr class="divider last">
                </div>
                <div class="row">
                    <div class="column column_2_3">
                        <div class="row">
                            <ul class="blog big">
                            <?php
                                $p = new Paging;
                                $batas = 3;
                                $posisi = $p->cariPosisi($batas);
                                $tabledcpost = new PoTable('post');
                                $dcposts = $tabledcpost->findAllLimitByAnd(id_post, id_category, active, "$iddcat", "Y", "DESC", "$posisi,$batas");
                                foreach($dcposts as $dcpost){
                                    $tabledccom = new PoTable('comment');
                                    $totaldccom = $tabledccom->numRowByAnd(id_post, $dcpost->id_post, active, 'Y');
                                    $tableuser = new PoTable('users');
                                    $currentUser = $tableuser->findBy(id_user, $dcpost->editor);
                                    $currentUser = $currentUser->current();
                            ?>
                                <li class="post">
                                    <a href="<?php echo "$website_url/detailpost/$dcpost->seotitle"; ?>" title="<?=$dcpost->title;?>">
                                        <img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$dcpost->picture;?>" alt="<?=$dcpost->title;?>">
                                    </a>
                                    <div class="post_content">
                                        <h2 class="with_number">
                                            <a href="<?php echo "$website_url/detailpost/$dcpost->seotitle"; ?>" title="<?=$dcpost->title;?>"><?=cuthighlight('title', $dcpost->title, '25');?>...</a>
                                            <a class="comments_number" href="javascript:void(0);" title="<?=$totaldccom;?> Komentar"><?=$totaldccom;?><span class="arrow_comments"></span></a>
                                        </h2>
                                        <div style="width:100%; height:50px;">&nbsp;</div>
                                        <p><i><?=tgl_indo($dcpost->date);?></i> - <?=cuthighlight('post', $dcpost->content, '150');?>...</p>
                                        <a class="read_more" href="<?php echo "$website_url/detailpost/$dcpost->seotitle"; ?>" title="Selengkapnya"><span class="arrow"></span><span>SELENGKAPNYA</span></a>
                                    </div>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                        <ul class="pagination clearfix page_margin_top_section">
                        <?php
                            $getpage = $val->validasi($_GET['page'],'sql');
                            $jmldata = $tabledcpost->numRowByAnd(id_category, "$iddcat", active, "Y");
                            $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                            $linkHalaman = $p->navHalaman($getpage, $jmlhalaman, $website_url, "category", $currentDcat->seotitle, "1");
                            echo "$linkHalaman";
                        ?>
                        </ul>
                    </div>
                    <?php include_once "po-content/$folder/sidebar.php"; ?>
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