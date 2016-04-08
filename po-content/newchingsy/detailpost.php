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
            $title = $val->validasi($_GET['id'],'xss');
            $detail = new PoTable();
            $currentDetail = $detail->findManualQuery($tabel = "post,users,category", $field = "", $condition = "WHERE users.id_user = post.editor AND category.id_category = post.id_category AND category.active = 'Y' AND post.active = 'Y' AND post.seotitle = '".$title."'");
            $currentDetail = $currentDetail->current();
            $idpost = $currentDetail->id_post;

            if ($currentDetail > 0){
            $tabledpost = new PoTable('post');
            $currentDpost = $tabledpost->findByPost(id_post, $idpost);
            $currentDpost = $currentDpost->current();

            $contentdet = html_entity_decode($currentDetail->content);
            $biodet = html_entity_decode($currentDetail->bio);

            $tabledcat = new PoTable('category');
            $currentDcat = $tabledcat->findBy(id_category, $currentDetail->id_category);
            $currentDcat = $currentDcat->current();

            $p = new Paging;
            $batas = 5;
            $posisi = $p->cariPosisi($batas);
            $tabledcom = new PoTable('comment');
            $composts = $tabledcom->findAllLimitByAnd(id_comment, id_post, active, "$idpost", "Y", "ASC", "$posisi,$batas");
            $totaldcom = $tabledcom->numRowByAnd(id_post, $idpost, active, 'Y');

            mysqli_query("UPDATE post SET hits = $currentDetail->hits+1 WHERE id_post = '".$idpost."'");
        ?>
        <div class="page">
            <div class="row page_margin_top">
				<div class="column column_2_3">
				    <div class="row">
                        <div class="post single">
                            <h1 class="post_title"><?=$currentDpost->title;?></h1>
                            <ul class="post_details clearfix">
                                <li class="detail category">Di <a href="<?php echo "$website_url/category/$currentDcat->seotitle"; ?>" title="<?=$currentDcat->title;?>"><?=$currentDcat->title;?></a></li>
                                <li class="detail date"><?=$currentDetail->time;?>, <?=tgl_indo($currentDetail->date);?></li>
                                <li class="detail author">By <a href="javascript:void(0);" title="<?=$currentDetail->nama_lengkap;?>"><?=$currentDetail->nama_lengkap;?></a></li>
                                <li class="detail views"><?=$currentDetail->hits;?> Views</li>
                                <li class="detail comments"><a href="#comment-box" class="scroll_to_comments" title="<?=$totaldcom;?> Komentar"><?=$totaldcom;?> Komentar</a></li>
                            </ul>
                            <a href="images/samples/690x450/image_10.jpg" class="post_image page_margin_top prettyPhoto" title="<?=$currentDpost->title;?>">
                                <img src="<?=$website_url;?>/po-content/po-upload/<?=$currentDetail->picture;?>" alt="<?=$currentDpost->title;?>">
                            </a>
                            <div class="sentence">
                                <span class="text"><?=$currentDpost->title;?></span>
                            </div>
                            <div class="post_content page_margin_top_section clearfix">
                                <div class="content_box"><?=$contentdet;?></div>
                                <div class="author_box animated_element">
                                    <div class="author">
                                        <a title="<?=$currentDetail->nama_lengkap;?>" href="javascript:void(0);" class="thumb">
                                        <?php
                                        $filename = "$website_url/po-content/po-upload/user-$currentDetail->id_user.jpg";
                                        if (file_exists("$filename")){
                                            echo "<img src='$website_url/po-content/po-upload/user-$currentDetail->id_user.jpg' alt='$currentDetail->nama_lengkap' style='width:100px; height:100px;' />";
                                        }else{
                                            echo "<img src='$website_url/po-content/po-upload/user-editor.jpg' alt='$currentDetail->nama_lengkap' style='width:100px; height:100px;' />";
                                        }
                                        ?>
                                        </a>
                                        <div class="details">
                                            <h5><a title="<?=$currentDetail->nama_lengkap;?>" href="javascript:void(0);"><?=$currentDetail->nama_lengkap;?></a></h5>
                                            <h6>EDITOR</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row page_margin_top">
                        <ul class="taxonomies tags left clearfix">
                        <?php
                            $tabletag = new PoTable('tag');
                            $tags = $tabletag->findAll(id_tag, DESC);
                            $arrtags = explode(',', $currentDetail->tag);
                            foreach($tags as $tag){
                            $cek = (array_search($tag->tag_seo, $arrtags) != false)? '' : 'display:none;';
                                echo "<li style='$cek'><a href='$website_url/search-result/$tag->tag_title' title='$tag->tag_title'>$tag->tag_title</a></li>";
                            }
                        ?>
                        </ul>
                    </div>
                    <?php
                        $tablerelated = new PoTable('post');
                        $tablerelateds = $tablerelated->findRelatedPost($currentDetail->tag, $idpost, id_post, "DESC", "5");
                        if(count($tablerelateds) > 1){
                    ?>
                    <div class="row page_margin_top_section">
                        <h4 class="box_header">Post Terkait</h4>
                        <div class="horizontal_carousel_container page_margin_top">
                            <ul class="blog horizontal_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
                                <?php
                                    foreach($tablerelateds as $tablerelated){
                                ?>
                                <li class="post">
                                    <a href="<?php echo "$website_url/detailpost/$tablerelated->seotitle"; ?>" title="<?=$tablerelated->title;?>">
                                        <img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$tablerelated->picture;?>" alt="<?=$tablerelated->title;?>">
                                    </a>
                                    <h5><a href="<?php echo "$website_url/detailpost/$tablerelated->seotitle"; ?>" title="<?=$tablerelated->title;?>"><?=cuthighlight('title', $tablerelated->title, '35');?></a></h5>
                                    <ul class="post_details simple"><li class="date"><?=$tablerelated->time;?>, <?=tgl_indo($tablerelated->date);?></li></ul>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row page_margin_top_section" id="comment-box">
                        <h4 class="box_header">Tinggalkan Komentar</h4>
                        <p class="padding_top_30">Your email address will not be published. Required fields are marked with *</p>
                        <form class="comment_form margin_top_15" action="<?=$website_url;?>/po-postcom.php" method="post">
                            <fieldset class="column column_1_3">
                                <input class="text_input" name="name" type="text" value="Your Name *" placeholder="Your Name *">
                            </fieldset>
                            <fieldset class="column column_1_3">
                                <input class="text_input" name="email" type="text" value="Your Email *" placeholder="Your Email *">
                            </fieldset>
                            <fieldset class="column column_1_3">
                                <input class="text_input" name="url" type="text" value="Website" placeholder="Website">
                            </fieldset>
                            <fieldset>
                                <textarea name="comment" placeholder="Comment *">Comment *</textarea>
                            </fieldset>
                            <fieldset>
                                <br /><div class="g-recaptcha" data-sitekey="6LckEgETAAAAAPdqrQSY_boMDLZRL1vpkAatVqKf"></div>
                                <input type="hidden" name="id" value="<?=$idpost;?>" />
                                <input type="hidden" name="seotitle" value="<?=$currentDpost->seotitle;?>" />
                            </fieldset>
                            <fieldset>
                                <input type="submit" value="POST COMMENT" class="more active">
                            </fieldset>
                        </form>
                    </div>
                    <div class="row page_margin_top_section" id="comment-list">
                        <h4 class="box_header"><?=$totaldcom;?> Komentar</h4>
                        <?php if ($totaldcom > 0){ ?>
                        <ul id="comments_list">
                        <?php
                            foreach($composts as $compost){
                            $comcontent = nl2br($compost->comment);
                        ?>
                            <li class="comment clearfix" id="comment-1">
                                <div class="comment_author_avatar">&nbsp;</div>
                                <div class="comment_details">
                                    <div class="posted_by clearfix">
                                        <?php if ($compost->url != ''){ ?>
                                            <h5><a class="author" href="<?=addhttp($compost->url);?>" target="_blank"><?=$compost->name;?></a></h5>
                                        <?php }else{ ?>
                                            <h5><a class="author" href="#"><?=$compost->name;?></a></h5>
                                        <?php } ?>
                                        <abbr title="<?php echo "$compost->time, $compost->date"; ?>" class="timeago"><?php echo "$compost->date | $compost->time"; ?></abbr>
                                    </div>
                                    <p><?=autolink($comcontent);?></p>
                                </div>
                            </li>
                        <?php } ?>
                        </ul>
                        <ul class="pagination page_margin_top_section">
                        <?php
                            $getpage = $val->validasi($_GET['page'],'sql');
                            $jmldata = $tabledcom->numRowByAnd(id_post, $idpost, active, 'Y');
                            $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                            $linkHalaman = $p->navHalaman($getpage, $jmlhalaman, $website_url, "detailpost", $currentDpost->seotitle, "1");
                            echo "$linkHalaman";
                        ?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <?php include_once "po-content/$folder/sidebar.php"; ?>
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
?>


<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>