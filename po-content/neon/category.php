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
	<!-- Breadcrumb -->
	<section class="breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1><?=$currentDcat->title;?></h1>
					<ol class="breadcrumb bc-3">
						<li><a href="<?=$website_url;?>"><i class="entypo-home"></i>Home</a></li>
						<li class="active"><strong><?=$currentDcat->title;?></strong></li>
					</ol>
				</div>
			</div>
		</div>
	</section>
	<section class="portfolio-container">
		<div class="container">
			<div class="row" id="portfolio-items">
			<?php
				$p = new Paging;
				$batas = 5;
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
				<div class="item col-sm-4">
					<div class="portfolio-item">
						<a href="<?php echo "$website_url/detailpost/$dcpost->seotitle"; ?>" class="image">
							<img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$dcpost->picture;?>" class="img-rounded" />
							<span class="hover-zoom"></span>
						</a>
						<h4><a href="<?php echo "$website_url/detailpost/$dcpost->seotitle"; ?>" class="name"><?=cuthighlight('title', $dcpost->title, '30');?>...</a></h4>
						<div class="categories"><?=cuthighlight('post', $dcpost->content, '100');?>...</div>
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
								$jmldata = $tabledcpost->numRowByAnd(id_category, "$iddcat", active, "Y");
								$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
								$linkHalaman = $p->navHalaman($getpage, $jmlhalaman, $website_url, "category", $currentDcat->seotitle, "1");
								echo "$linkHalaman";
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	}else{
		header('location:'.$website_url.'/404.php');
	}
	?>


<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>