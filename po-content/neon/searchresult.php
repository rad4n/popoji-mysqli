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
		?>
		<!-- Breadcrumb -->
		<section class="breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1>Search result for <i><?=$val->validasi($_GET['search'],'xss');?></i></h1>
						<ol class="breadcrumb bc-3">
							<li><a href="<?=$website_url;?>"><i class="entypo-home"></i>Home</a></li>
							<li class="active"><strong>Search Result</strong></li>
						</ol>
					</div>
				</div>
			</div>
		</section>
		<section class="portfolio-container">
			<div class="container">
				<div class="row" id="portfolio-items">
				<?php
					$kata = $val->validasi($_GET['search'],'xss');
					$p = new Paging;
					$batas = 5;
					$posisi = $p->cariPosisi($batas);
					$tablesearch = new PoTable('post');
					$searchposts = $tablesearch->findSearchPost($kata, "$posisi,$batas");
					$numsearchposts = $tablesearch->numRowSearchPost($kata);
					if ($numsearchposts > 0){
				?>
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
					<div class="item col-sm-4">
						<div class="portfolio-item">
							<a href="<?php echo "$website_url/detailpost/$searchpost->seotitle"; ?>" class="image">
								<img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$searchpost->picture;?>" class="img-rounded" />
								<span class="hover-zoom"></span>
							</a>
							<h4><a href="<?php echo "$website_url/detailpost/$searchpost->seotitle"; ?>" class="name"><?=cuthighlight('title', $searchpost->title, '35');?>...</a></h4>
							<div class="categories"><div class="categories"><?=cuthighlight('post', $searchpost->content, '100');?>...</div></div>
						</div>
					</div>
				<?php } ?>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="text-center">
							<ul class="pagination">
								<?php
									$getpage = $val->validasi($_GET['page'],'sql');
									$jmldata = $tablesearch->numRowSearchPost($kata);
									$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
									$linkHalaman = $p->navHalaman($getpage, $jmlhalaman, $website_url, "search-result", $kata);
									echo "$linkHalaman";
								?>
							</ul>
						</div>
					</div>
				</div>
			<?php }else{ ?>
			<div class="col-md-12">
				<h1 class="text-center">Your keyword entered not found, please try again.</h1>
			</div>
			<?php } ?>
			</div>
		</section>
		<?php } ?>


<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>