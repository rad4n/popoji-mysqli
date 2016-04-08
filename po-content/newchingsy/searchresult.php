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
        if ($_GET['search'] == ""){
            $postkata = $_POST['search'];
            header('location:'.$website_url.'/search-result/'.$postkata);
        }else{
            $kata = $val->validasi($_GET['search'],'xss');
            $p = new Paging;
            $batas = 3;
            $posisi = $p->cariPosisi($batas);
            $tablesearch = new PoTable('post');
            $searchposts = $tablesearch->findSearchPost($kata, "$posisi,$batas");
            $numsearchposts = $tablesearch->numRowSearchPost($kata);
            if ($numsearchposts > 0){
        ?>
        <div class="page">
            <div class="page_header clearfix page_margin_top">
                <div class="page_header_left">
                    <h1 class="page_title">'<?=$kata;?>'</h1>
                </div>
                <div class="page_header_right">
                    <ul class="bread_crumb">
                        <li><a title="Beranda" href="<?=$website_url;?>">Beranda</a></li>
                        <li class="separator icon_small_arrow right_gray">&nbsp;</li>
                        <li>Search Result</li>
                    </ul>
                </div>
            </div>
            <div class="page_layout clearfix">
                <div class="divider_block clearfix">
                    <hr class="divider first"><hr class="divider subheader_arrow"><hr class="divider last">
                </div>
                <div class="row page_margin_top">
                    <div class="column column_2_3">
                        <div class="row">
                            <h4 class="box_header">Search Results For '<?=$kata;?>' (<?=$numsearchposts;?>)</h4>
                            <form method="post" action="<?=$website_url;?>/search-result/" class="search_form page_margin_top">
                                <input class="text_input" name="search" type="text" value="<?=$kata;?>" placeholder="Search...">
                                <input type="submit" value="SEARCH" class="more active margin_top_10">
                            </form>
                        </div>
                        <div class="row">
                            <ul class="blog big">
                            <?php
                                foreach($searchposts as $searchpost){
                                    $tabledscom = new PoTable('comment');
                                    $totaldscom = $tabledscom->numRowByAnd(id_post, $searchpost->id_post, active, 'Y');
                                    $tablecatds = new PoTable('category');
                                    $currentCatds = $tablecatds->findBy(id_category, $searchpost->id_category);
                                    $currentCatds = $currentCatds->current();
                                    $tableuser = new PoTable('users');
                                    $currentUser = $tableuser->findBy(id_user, $searchpost->editor);
                                    $currentUser = $currentUser->current();
                            ?>
                                <li class="post">
                                    <a href="<?php echo "$website_url/detailpost/$searchpost->seotitle"; ?>" title="<?=$searchpost->title;?>">
                                        <img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$searchpost->picture;?>" alt="<?=$searchpost->title;?>">
                                    </a>
                                    <div class="post_content">
                                        <h2 class="with_number">
                                            <a href="<?php echo "$website_url/detailpost/$searchpost->seotitle"; ?>" title="<?=$searchpost->title;?>"><?=cuthighlight('title', $searchpost->title, '25');?>...</a>
                                            <a class="comments_number" href="javascript:void(0);" title="<?=$totaldscom;?> Komentar"><?=$totaldscom;?><span class="arrow_comments"></span></a>
                                        </h2>
                                        <ul class="post_details">
											<li class="category"><a href="<?php echo "$website_url/category/$currentCatds->seotitle"; ?>" title="<?=$currentCatds->title;?>"><?=$currentCatds->title;?></a></li>
											<li class="date"><?=tgl_indo($searchpost->date); ?></li>
										</ul>
                                        <p><?=cuthighlight('post', $searchpost->content, '150');?>...</p>
                                        <a class="read_more" href="<?php echo "$website_url/detailpost/$searchpost->seotitle"; ?>" title="Selengkapnya"><span class="arrow"></span><span>SELENGKAPNYA</span></a>
                                    </div>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                        <ul class="pagination clearfix page_margin_top_section">
                        <?php
                            $getpage = $val->validasi($_GET['page'],'sql');
                            $jmldata = $tablesearch->numRowSearchPost($kata);
                            $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                            $linkHalaman = $p->navHalaman($getpage, $jmlhalaman, $website_url, "search-result", $kata, "1");
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
        <?php }?>
        <?php } ?>


<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>