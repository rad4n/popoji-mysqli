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
        <div class="page">
            <div class="page_header clearfix page_margin_top">
                <div class="page_header_left">
                    <h1 class="page_title">Galeri</h1>
                </div>
                <div class="page_header_right">
                    <ul class="bread_crumb">
                        <li><a title="Beranda" href="<?=$website_url;?>">Beranda</a></li>
                        <li class="separator icon_small_arrow right_gray">&nbsp;</li>
                        <li>Galeri</li>
                    </ul>
                </div>
            </div>
            <div class="page_layout clearfix">
                <div class="divider_block clearfix">
                    <hr class="divider first"><hr class="divider subheader_arrow"><hr class="divider last">
                </div>
                <div class="row">
                    <div class="column column_2_3">
                        <ul class="blog medium">
                        <?php
                            $p = new Paging;
                            $batas = 6;
                            $posisi = $p->cariPosisi($batas);
                            $tablegal = new PoTable('gallery');
                            $gallerys = $tablegal->findAllLimit(id_gallery, "DESC", "$posisi,$batas");
                            foreach($gallerys as $gallery){
                                $idalb = $gallery->id_album;
                                $tablecalb = new PoTable('album');
                                $currentCalb = $tablecalb->findBy(id_album, $idalb);
                                $currentCalb = $currentCalb->current();
                                if ($currentCalb->active == 'Y'){
                        ?>
                            <li class="post">
                                <a class="post_image prettyPhoto" href="<?=$website_url;?>/po-content/po-upload/<?=$gallery->picture;?>" title="<?=$gallery->title;?>">
                                    <img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$gallery->picture;?>" alt="<?=$gallery->title;?>">
                                </a>
                                <h5><a class="post_image prettyPhoto" href="<?=$website_url;?>/po-content/po-upload/<?=$gallery->picture;?>" title="<?=$gallery->title;?>"><?=cuthighlight('title', $gallery->title, '15');?>...</a>
                            </li>
                        <?php
                                }
                            }
                        ?>
                        </ul>
                        <div class="row">
                            <p>&nbsp;</p>
                            <ul class="pagination clearfix page_margin_top_section">
                            <?php
                                $getpage = $val->validasi($_GET['page'],'sql');
                                $jmldata = $tablegal->numRow();
                                $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                                $linkHalaman = $p->navHalaman($getpage, $jmlhalaman, $website_url, "gallery", "page", "1");
                                echo "$linkHalaman";
                            ?>
                            </ul>
                        </div>
                    </div>
                    <?php include_once "po-content/$folder/sidebar.php"; ?>
                </div>
            </div>
        </div>


<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>