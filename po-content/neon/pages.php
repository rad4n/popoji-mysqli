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
		<!-- Breadcrumb -->
		<section class="breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1><?=$currentPag->title;?></h1>
						<ol class="breadcrumb bc-3">
							<li><a href="<?=$website_url;?>"><i class="entypo-home"></i>Home</a></li>
							<li class="active"><strong><?=$currentPag->title;?></strong></li>
						</ol>
					</div>
				</div>
			</div>
		</section>
		<!-- About Us Text -->
		<section class="content-section">
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<p><?=$content;?></p>
					</div>
					<div class="col-sm-5">
						<a href="#">
							<img src="<?=$website_url;?>/po-content/po-upload/<?=$currentPag->picture;?>" class="img-responsive img-rounded" />
						</a>
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