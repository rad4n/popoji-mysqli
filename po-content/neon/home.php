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
		<!-- Main Slider -->
		<section class="slider-container" style="background-image: url(<?=$website_url;?>/po-content/<?=$folder;?>/assets/images/testimonials-bg.png);">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="slides">
						<?php
							$tableslider = new PoTable('post');
							$sliders = $tableslider->findAllLimitByAnd(id_post, active, headline, 'Y', 'Y', DESC, '3');
							foreach($sliders as $slider){
						?>
							<!-- Slide -->
							<div class="slide">
								<div class="slide-content">
									<h2><?=$slider->title;?></h2>
									<p><?=cuthighlight('post', $slider->content, '200');?>...</p>
								</div>
								<div class="slide-image">
									<a href="<?php echo "$website_url/detailpost/$slider->seotitle"; ?>">
										<img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$slider->picture;?>" class="img-responsive" width="500" />
									</a>
								</div>
							</div>
						<?php } ?>
							<!-- Slider navigation -->
							<div class="slides-nextprev-nav">
								<a href="#" class="prev"><i class="entypo-left-open-mini"></i></a>
								<a href="#" class="next"><i class="entypo-right-open-mini"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Features Blocks -->
		<section class="features-blocks">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="text-center">
							<h3>BUAT SENDIRI RASA WEBMU</h3>
							<p>PopojiCMS merupakan salah satu content management system yang dibuat dengan konsep sederhana untuk memudahkan setiap individu memanage website.</p>
							<p>Dengan konsep gabungan native php dan oop, developer web awampun dapat dengan cepat memahami struktur dari engine PopojiCMS.</p>
							<p>Kini semua orang bisa memliki website keren dengan engine yang powerfull.</p>
						</div>
					</div>
				</div>
				<!-- Separator -->
				<div class="row">
					<div class="col-md-12">
						<hr />
					</div>
				</div>
			</div>
		</section>

		<!-- Category -->
		<section class="portfolio-widget">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="portfolio-info">
							<h3><a href="<?=$website_url;?>/category/indonesiaku">Indonesiaku</a></h3>
							<div class="clearfix hidden-xs"><br /></div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<?php
										$tablecona = new PoTable('post');
										$conas = $tablecona->findAllLimitByAnd(id_post, id_category, active, '1', 'Y', DESC, '2');
										foreach($conas as $cona){
									?>
									<div class="col-sm-6">
										<!-- Portfolio Item in Widget -->
										<div class="portfolio-item">
											<a href="<?php echo "$website_url/detailpost/$cona->seotitle"; ?>" class="image">
												<img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$cona->picture;?>" class="img-rounded" />
												<span class="hover-zoom"></span>
											</a>
											<h4><a href="<?php echo "$website_url/detailpost/$cona->seotitle"; ?>" class="name"><?=cuthighlight('title', $cona->title, '30');?>...</a></h4>
											<div class="categories"><?=cuthighlight('post', $cona->content, '100');?>...</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<p>&nbsp;</p>
					</div>
					<div class="col-md-6">
						<div class="portfolio-info">
							<h3><a href="<?=$website_url;?>/category/motivasi">Motivasi</a></h3>
							<div class="clearfix hidden-xs""><br /></div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<?php
										$tableconb = new PoTable('post');
										$conbs = $tableconb->findAllLimitByAnd(id_post, id_category, active, '2', 'Y', DESC, '2');
										foreach($conbs as $conb){
									?>
									<div class="col-sm-6">
										<!-- Portfolio Item in Widget -->
										<div class="portfolio-item">
											<a href="<?php echo "$website_url/detailpost/$conb->seotitle"; ?>" class="image">
												<img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$conb->picture;?>" class="img-rounded" />
												<span class="hover-zoom"></span>
											</a>
											<h4><a href="<?php echo "$website_url/detailpost/$conb->seotitle"; ?>" class="name"><?=cuthighlight('title', $conb->title, '30');?>...</a></h4>
											<div class="categories"><?=cuthighlight('post', $conb->content, '100');?>...</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Category 2 -->
		<section class="portfolio-widget">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="portfolio-info">
							<h3><a href="<?=$website_url;?>/category/hubungan">Hubungan</a></h3>
							<div class="clearfix hidden-xs"><br /></div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<?php
										$tableconc = new PoTable('post');
										$concs = $tableconc->findAllLimitByAnd(id_post, id_category, active, '3', 'Y', DESC, '2');
										foreach($concs as $conc){
									?>
									<div class="col-sm-6">
										<!-- Portfolio Item in Widget -->
										<div class="portfolio-item">
											<a href="<?php echo "$website_url/detailpost/$conc->seotitle"; ?>" class="image">
												<img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$conc->picture;?>" class="img-rounded" />
												<span class="hover-zoom"></span>
											</a>
											<h4><a href="<?php echo "$website_url/detailpost/$conc->seotitle"; ?>" class="name"><?=cuthighlight('title', $conc->title, '30');?>...</a></h4>
											<div class="categories"><?=cuthighlight('post', $conc->content, '100');?>...</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<p>&nbsp;</p>
					</div>
					<div class="col-md-6">
						<div class="portfolio-info">
							<h3><a href="<?=$website_url;?>/category/sukses">Sukses</a></h3>
							<div class="clearfix hidden-xs""><br /></div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<?php
										$tablecond = new PoTable('post');
										$conds = $tablecond->findAllLimitByAnd(id_post, id_category, active, '4', 'Y', DESC, '2');
										foreach($conds as $cond){
									?>
									<div class="col-sm-6">
										<!-- Portfolio Item in Widget -->
										<div class="portfolio-item">
											<a href="<?php echo "$website_url/detailpost/$cond->seotitle"; ?>" class="image">
												<img src="<?=$website_url;?>/po-content/po-upload/medium/medium_<?=$cond->picture;?>" class="img-rounded" />
												<span class="hover-zoom"></span>
											</a>
											<h4><a href="<?php echo "$website_url/detailpost/$cond->seotitle"; ?>" class="name"><?=cuthighlight('title', $cond->title, '30');?>...</a></h4>
											<div class="categories"><?=cuthighlight('post', $cond->content, '100');?>...</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Call for Action Button -->
		<div class="container">
			<div class="row vspace">
				<div class="col-md-12">
					<div class="callout-action">
						<h2>Get touch and contact us</h2>
						<div class="callout-button">
							<a href="<?=$website_url;?>/contact" class="btn btn-secondary">Contact Us</a>
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