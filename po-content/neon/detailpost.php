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
		<!-- Breadcrumb -->
		<section class="portfolio-item-details">
			<div class="container">
				<!-- Title and Item Details -->
				<div class="row item-title">
					<div class="col-sm-9">
						<h1><?=$currentDpost->title;?></h1>
						<div class="categories">
							<strong>Tags : </strong><?=$currentDetail->tag;?>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="text-right">
							<div class="item-detail"><span>Date :</span><?=tgl_indo($currentDetail->date);?></div>
						</div>
					</div>
				</div>
				<!-- Portfolio Images Gallery -->
				<div class="row">
					<div class="col-md-12">
						<div class="item-images text-center">
							<img src="<?=$website_url;?>/po-content/po-upload/<?=$currentDetail->picture;?>" class="img-responsive img-rounded" />
						</div>
					</div>
				</div>
				<!-- Portfolio Description and Other Details -->
				<div class="row item-description">
					<div class="col-md-12">
						<p class="text-justify"><?=$contentdet;?></p>
					</div>
				</div>
			</div>
		</section>

		<section class="portfolio-container">
			<div class="container">
				<div class="row">
					<div class="col-md-12"><h3>Recent Blog</h3></div>
				</div>
				<div class="row">
					<?php
						$tablerec = new PoTable('post');
						$recs = $tablerec->findAllLimitBy(id_post, active, 'Y', DESC, '3');
						foreach($recs as $rec){
							$validrec = $rec->id_category;
							$tablecatrec = new PoTable('category');
							$currentCatrec = $tablecatrec->findBy(id_category, $validrec);
							$currentCatrec = $currentCatrec->current();
					?>
					<div class="col-sm-4">
						<div class="portfolio-item">
							<a href="<?php echo "$website_url/detailpost/$rec->seotitle"; ?>" class="image">
								<img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$rec->picture;?>" class="img-rounded" />
								<span class="hover-zoom"></span>
							</a>
							<h4><a href="<?php echo "$website_url/detailpost/$rec->seotitle"; ?>" class="name"><?=$rec->title;?></a></h4>
							<div class="categories"><a href="<?php echo "$website_url/category/$currentCatrec->seotitle"; ?>"><?=$currentCatrec->title;?></a></div>
						</div>
					</div>
					<?php } ?>
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