<?php if ($mod==""){
	header('location:../../404.php');
}else{
?>
                    <div class="column column_1_3">
                        <?php if ($member_register == "Y"){ if ($mod=="home"){ ?>
                        <h4 class="box_header">Login Member</h4>
                        <form class="margin_top_15" name="login-form" method="post" action="<?=$website_url;?>/po-admin/login.php" autocomplete="off">
                            <input type="hidden" name="mod" value="login" />
                            <input type="hidden" name="act" value="proclogin" />
                            <fieldset>
								<div class="block">
                                    <label>Username</label><br /><br />
                                    <input class="text_input" type="text" name="username" id="username" placeholder="Username" style="width:80%;" /><br /><br />
                                </div>
                            </fieldset>
                            <fieldset>
								<div class="block">
                                    <label>Password</label><br /><br />
                                    <input class="text_input" type="password" name="password" id="password" placeholder="Password" style="width:80%;" /><br /><br />
                                </div>
                            </fieldset>
                            <fieldset>
                                <label>Belum punya akun ? Klik <a href="<?=$website_url;?>/register" title="Register Member">di sini!</a></label><br /><br />
                                <label>Lupa password ? Klik <a href="<?=$website_url;?>/po-admin" title="Lupa password">di sini!</a></label><br /><br />
                            </fieldset>
                            <fieldset>
                                <input class="more active" type="submit" value="Login Member" name="submit" />
                            </fieldset>
                        </form>
                        <?php }} ?>

                        <?php if ($member_register == "Y"){ if ($mod=="home"){ ?>
                        <h4 class="box_header page_margin_top_section">Post Populer</h4>
                        <?php } else { ?>
                        <h4 class="box_header">Post Populer</h4>
                        <?php }}?>
                        <ul class="blog small_margin clearfix">
                        <?php
                            $tablepop = new PoTable('post');
                            $pops = $tablepop->findAllLimitBy(hits, active, 'Y', DESC, '1');
                            foreach($pops as $pop){
                                $tablecatpop = new PoTable('category');
                                $currentCatpop = $tablecatpop->findBy(id_category, $pop->id_category);
                                $currentCatpop = $currentCatpop->current();
                        ?>
                            <li class="post">
                                <a href="<?php echo "$website_url/detailpost/$pop->seotitle"; ?>" title="<?=$pop->title;?>">
                                    <img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$pop->picture;?>" alt="<?=$pop->title;?>">
                                </a>
                                <div class="post_content">
                                <h5>
                                    <a href="<?php echo "$website_url/detailpost/$pop->seotitle"; ?>" title="<?=$pop->title;?>"><?=cuthighlight('title', $pop->title, '35');?>...</a>
                                </h5>
                                <ul class="post_details simple">
                                    <li class="category"><a href="<?php echo "$website_url/category/$currentCatpop->seotitle"; ?>" title="<?=$currentCatpop->title;?>"><?=$currentCatpop->title;?></a></li>
                                    <li class="date"><?=tgl_indo($pop->date);?></li>
                                </ul>
                                </div>
                            </li>
                        <?php } ?>
                        </ul>
                        <ul class="list">
                        <?php
                            $tablepopb = new PoTable('post');
                            $popbs = $tablepopb->findAllLimitBy(hits, active, 'Y', DESC, '1,5');
                            foreach($popbs as $popb){
                        ?>
                            <li  class="bullet style_1"><a href="<?php echo "$website_url/detailpost/$popb->seotitle"; ?>" title="<?=$popb->title;?>"><?=cuthighlight('title', $popb->title, '40');?>...</a></li>
                        <?php } ?>
                        </ul>

                        <?php if ($mod != "gallery" AND $mod != "contact" AND $mod != "login" AND $mod != "register") { ?>
                        <h4 class="box_header page_margin_top_section">Post Terbaru</h4>
                        <ul class="blog small_margin clearfix">
                        <?php
                            $tablerec = new PoTable('post');
                            $recs = $tablerec->findAllLimitBy(id_post, active, 'Y', DESC, '1');
                            foreach($recs as $rec){
                                $validrec = $rec->id_category;
                                $tablecatrec = new PoTable('category');
                                $currentCatrec = $tablecatrec->findBy(id_category, $validrec);
                                $currentCatrec = $currentCatrec->current();
                        ?>
                            <li class="post">
                                <a href="<?php echo "$website_url/detailpost/$rec->seotitle"; ?>" title="<?=$rec->title;?>">
                                    <img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$rec->picture;?>" alt="<?=$rec->title;?>">
                                </a>
                                <div class="post_content">
                                <h5>
                                    <a href="<?php echo "$website_url/detailpost/$rec->seotitle"; ?>" title="<?=$rec->title;?>"><?=cuthighlight('title', $rec->title, '35');?>...</a>
                                </h5>
                                <ul class="post_details simple">
                                    <li class="category"><a href="<?php echo "$website_url/category/$currentCatrec->seotitle"; ?>" title="<?=$currentCatrec->title;?>"><?=$currentCatrec->title;?></a></li>
                                    <li class="date"><?=tgl_indo($rec->date);?></li>
                                </ul>
                                </div>
                            </li>
                        <?php } ?>
                        </ul>
                        <ul class="list">
                        <?php
                            $tablerecb = new PoTable('post');
                            $recbs = $tablerecb->findAllLimitBy(id_post, active, 'Y', DESC, '1,5');
                            foreach($recbs as $recb){
                        ?>
                            <li  class="bullet style_1"><a href="<?php echo "$website_url/detailpost/$recb->seotitle"; ?>" title="<?=$recb->title;?>"><?=cuthighlight('title', $recb->title, '40');?>...</a></li>
                        <?php } ?>
                        </ul>
                        <?php } ?>

                        <?php if ($mod == "home" OR $mod == "detailpost") { ?>
                        <h4 class="box_header page_margin_top_section">Post Komentar</h4>
                        <div class="vertical_carousel_container clearfix">
                            <ul class="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
                            <?php
                                $tablecom = new PoTable('comment');
                                $coms = $tablecom->findAllLimitBy(id_comment, active, 'Y', DESC, '5');
                                foreach($coms as $com){
                                    $validcom = $com->id_post;
                                    $explname = explode(" ", $com->name);
                                    $tablecompo = new PoTable('post');
                                    $currentCompo = $tablecompo->findBy(id_post, $validcom);
                                    $currentCompo = $currentCompo->current();
                            ?>
                                <li class="post">
                                    <a href="<?php echo "$website_url/detailpost/$currentCompo->seotitle"; ?>#comment-list" title="<?=$currentCompo->title;?>">
                                        <img src="<?=$website_url;?>/po-content/po-thumbs/<?=$currentCompo->picture;?>" alt="<?=$currentCompo->title;?>" style="width:100px;">
                                    </a>
                                    <div class="post_content">
                                        <h5><a href="<?php echo "$website_url/detailpost/$currentCompo->seotitle"; ?>#comment-list" title="<?=$currentCompo->title;?>"><?=cuthighlight('post', $com->comment, '45');?>...</a></h5>
                                        <ul class="post_details simple">
                                            <li class="category"><a href="<?php echo "$website_url/detailpost/$currentCompo->seotitle"; ?>" title="<?=$com->name;?>"><?=$explname[0];?></a></li>
                                            <li class="date"><?=tgl_indo($com->date);?></li>
                                        </ul>
                                    </div>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>

                        <h4 class="box_header page_margin_top_section">Post Kategori</h4>
                        <ul class="taxonomies columns clearfix page_margin_top">
                        <?php
                            $tablesidecat = new PoTable('category');
                            $tablejmlpost = new PoTable('post');
                            $sidecats = $tablesidecat->findAllRand();
                            foreach($sidecats as $sidecat){
                                $tablejmlposts = $tablejmlpost->numRowByAnd(id_category, $sidecat->id_category, active, 'Y');
                        ?>
                            <li><a href="<?=$website_url;?>/category/<?=$sidecat->seotitle;?>" title="<?=$sidecat->title;?>"><?=$sidecat->title;?> (<?=$tablejmlposts;?>)</a></li>
                        <?php } ?>
                        </ul>

                        <h4 class="box_header page_margin_top_section">Post Tag</h4>
                        <ul class="taxonomies clearfix page_margin_top">
                        <?php
                            $tabletag = new PoTable('tag');
                            $tags = $tabletag->findAllLimit(id_tag, DESC, '20');
                            foreach($tags as $tag){
                        ?>
                            <li><a href="<?=$website_url;?>/search-result/<?=$tag->tag_title;?>" title="<?=$tag->tag_title;?>"><?=$tag->tag_title;?></a></li>
                        <?php } ?>
                        </ul>
                        <?php } ?>
                    </div>
<?php } ?>