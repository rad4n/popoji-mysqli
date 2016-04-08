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
            <div class="page_layout clearfix">
                <div class="row page_margin_top">
                    <div class="column column_2_3">
                        <ul class="small_slider">
                        <?php
                            $tableslider = new PoTable('post');
                            $sliders = $tableslider->findAllLimitByAnd(id_post, active, headline, 'Y', 'Y', DESC, '3');
                            foreach($sliders as $slider){
                                $tablecatsl = new PoTable('category');
                                $currentCatsl = $tablecatsl->findBy(id_category, $slider->id_category);
                                $currentCatsl = $currentCatsl->current();
                        ?>
                            <li class="slide">
                                <a href="<?php echo "$website_url/detailpost/$slider->seotitle"; ?>" title="<?=$slider->title;?>">
                                    <img src="<?=$website_url;?>/po-content/po-upload/<?=$slider->picture;?>" alt="<?=$slider->title;?>">
                                </a>
                                <div class="slider_content_box">
                                    <ul class="post_details simple">
                                        <li class="category"><a href="<?php echo "$website_url/category/$currentCatsl->seotitle"; ?>" title="<?=$currentCatsl->title;?>"><?=$currentCatsl->title;?></a></li>
                                        <li class="date"><?=tgl_indo($slider->date);?></li>
                                    </ul>
                                    <h2><a href="<?php echo "$website_url/detailpost/$slider->seotitle"; ?>" title="<?=$slider->title;?>"><?=cuthighlight('title', $slider->title, '35');?>...</a></h2>
                                    <p class="clearfix"><?=cuthighlight('post', $slider->content, '100');?>...</p>
                                </div>
                            </li>
                        <?php } ?>
                        </ul>
                        <!--<div class="slider_posts_list_container"></div>-->

                        <div class="row page_margin_top_section">
                            <h4 class="box_header">Indonesiaku</h4>
                            <div class="row">
                                <ul class="blog column column_1_2">
                                <?php
                                    $tablecona = new PoTable('post');
                                    $conas = $tablecona->findAllLimitByAnd(id_post, id_category, active, '1', 'Y', DESC, '1');
                                    foreach($conas as $cona){
                                ?>
                                    <li class="post">
                                        <a href="<?php echo "$website_url/detailpost/$cona->seotitle"; ?>" title="<?=$cona->title;?>">
                                            <img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$cona->picture;?>" alt="<?=$cona->title;?>">
                                        </a>
                                        <h2><a href="<?php echo "$website_url/detailpost/$cona->seotitle"; ?>" title="<?=$cona->title;?>"><?=cuthighlight('title', $cona->title, '35');?>...</a></h2>
                                        <ul class="post_details">
                                            <li class="category"><a href="<?php echo "$website_url/category/indonesiaku"; ?>" title="INDONESIAKU">INDONESIAKU</a></li>
                                            <li class="date"><?=tgl_indo($cona->date);?></li>
                                        </ul>
                                        <p><?=cuthighlight('post', $cona->content, '150');?>...</p>
                                        <a class="read_more" href="<?php echo "$website_url/detailpost/$cona->seotitle"; ?>" title="Read more"><span class="arrow"></span><span>BACA SELENGKAPNYA</span></a>
                                    </li>
                                <?php } ?>
                                </ul>
                                <div class="column column_1_2">
                                    <ul class="blog small clearfix">
                                    <?php
                                        $tableconb = new PoTable('post');
                                        $conbs = $tableconb->findAllLimitByAnd(id_post, id_category, active, '1', 'Y', DESC, '1,4');
                                        foreach($conbs as $conb){
                                    ?>
                                        <li class="post">
                                            <a href="<?php echo "$website_url/detailpost/$conb->seotitle"; ?>" title="<?=$conb->title;?>">
                                                <img src="<?=$website_url;?>/po-content/po-thumbs/<?=$conb->picture;?>" alt="<?=$conb->title;?>" style="width:100px; height:auto;">
                                            </a>
                                            <div class="post_content">
                                                <h5><a href="<?php echo "$website_url/detailpost/$conb->seotitle"; ?>" title="<?=$conb->title;?>"><?=cuthighlight('title', $conb->title, '35');?>...</a></h5>
                                                <ul class="post_details simple">
                                                    <li class="category"><a href="<?php echo "$website_url/category/indonesiaku"; ?>" title="INDONESIAKU">INDONESIAKU</a></li>
                                                    <li class="date"><?=tgl_indo($conb->date);?></li>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    </ul>
                                    <a class="more page_margin_top" href="<?php echo "$website_url/category/indonesiaku"; ?>">INDEX INDONESIAKU</a>
                                </div>
                            </div>
                        </div>

                        <div class="row page_margin_top_section">
                            <div class="column column_1_2">
                                <h4 class="box_header">Motivasi</h4>
                                <ul class="blog small clearfix">
                                <?php
                                    $tableconc = new PoTable('post');
                                    $concs = $tableconc->findAllLimitByAnd(id_post, id_category, active, '2', 'Y', DESC, '3');
                                    foreach($concs as $conc){
                                ?>
                                    <li class="post">
                                        <a href="<?php echo "$website_url/detailpost/$conc->seotitle"; ?>" title="<?=$conc->title;?>">
                                            <img src="<?=$website_url;?>/po-content/po-thumbs/<?=$conc->picture;?>" alt="<?=$conc->title;?>" style="width:100px;">
                                        </a>
                                        <div class="post_content">
                                            <h5><a href="<?php echo "$website_url/detailpost/$conc->seotitle"; ?>" title="<?=$conc->title;?>"><?=cuthighlight('title', $conc->title, '35');?>...</a></h5>
                                            <ul class="post_details simple">
                                                <li class="category"><a href="<?php echo "$website_url/category/motivasi"; ?>" title="Motivasi">MOTIVASI</a></li>
                                                <li class="date"><?=tgl_indo($conc->date);?></li>
                                            </ul>
                                        </div>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>

                            <div class="column column_1_2">
                                <h4 class="box_header">Sukses</h4>
                                <ul class="blog small clearfix">
                                <?php
                                    $tablecone = new PoTable('post');
                                    $cones = $tablecone->findAllLimitByAnd(id_post, id_category, active, '4', 'Y', DESC, '3');
                                    foreach($cones as $cone){
                                ?>
                                    <li class="post">
                                        <a href="<?php echo "$website_url/detailpost/$cone->seotitle"; ?>" title="<?=$cone->title;?>">
                                            <img src="<?=$website_url;?>/po-content/po-thumbs/<?=$cone->picture;?>" alt="<?=$cone->title;?>" style="width:100px;">
                                        </a>
                                        <div class="post_content">
                                            <h5><a href="<?php echo "$website_url/detailpost/$cone->seotitle"; ?>" title="<?=$cone->title;?>"><?=cuthighlight('title', $cone->title, '35');?>...</a></h5>
                                            <ul class="post_details simple">
                                                <li class="category"><a href="<?php echo "$website_url/category/sukses"; ?>" title="Sukses">SUKSES</a></li>
                                                <li class="date"><?=tgl_indo($cone->date);?></li>
                                            </ul>
                                        </div>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <h4 class="box_header page_margin_top_section">Hubungan</h4>
                        <div class="row">
                            <ul class="blog big">
                            <?php
                                $tablecond = new PoTable('post');
                                $conds = $tablecond->findAllLimitByAnd(id_post, id_category, active, '3', 'Y', DESC, '3');
                                foreach($conds as $cond){
                            ?>
                                <li class="post">
                                    <a href="<?php echo "$website_url/detailpost/$cond->seotitle"; ?>" title="<?=$cond->title;?>">
                                        <img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$cond->picture;?>" alt="<?=$cond->title;?>">
                                    </a>
                                    <div class="post_content">
                                        <h2><a href="<?php echo "$website_url/detailpost/$cond->seotitle"; ?>" title="<?=$cond->title;?>"><?=cuthighlight('title', $cond->title, '35');?>...</a></h2>
                                        <ul class="post_details">
                                            <li class="category"><a href="<?php echo "$website_url/category/hubungan"; ?>" title="Hubungan">HUBUNGAN</a></li>
                                            <li class="date"><?=tgl_indo($cond->date);?></li>
                                        </ul>
                                        <p><?=cuthighlight('post', $cond->content, '150');?>...</p>
                                        <a class="read_more" href="<?php echo "$website_url/detailpost/$cond->seotitle"; ?>" title="Read more"><span class="arrow"></span><span>BACA SELENGKAPNYA</span></a>
                                    </div>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php include_once "po-content/$folder/sidebar.php"; ?>
                </div>

                <div class="row page_margin_top_section">
                    <div class="column column_1_1">
                        <h4 class="box_header">Galeri</h4>
                        <div class="horizontal_carousel_container page_margin_top">
                            <ul class="blog horizontal_carousel page_margin_top autoplay-0 visible-4 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
                            <?php
                                $nogal = 1;
                                $tablegallery = new PoTable('gallery');
                                $gallerys = $tablegallery->findAllLimit(id_gallery, DESC, '8');
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
                                    <h5><span class="number"><?=$nogal;?>.</span><a class="post_image prettyPhoto" href="<?=$website_url;?>/po-content/po-upload/<?=$gallery->picture;?>" title="<?=$gallery->title;?>"><?=$gallery->title;?></a></h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="javascript:void(0);" title="<?=$currentCalb->title;?>"><?=$currentCalb->title;?></a></li>
                                    </ul>
                                </li>
                            <?php
                                    }
                                    $nogal++;
                                } 
                            ?>
                            </ul>
                        </div>
                    </div>
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