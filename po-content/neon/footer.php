<?php if ($mod==""){
	header('location:../../404.php');
}else{
?>
		<!-- Footer Widgets -->
		<section class="footer-widgets">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<a href="#"><img src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/images/logo@2x.png" width="100" /></a>
						<p>PopojiCMS merupakan salah satu content management system yang dibuat dengan konsep sederhana untuk memudahkan setiap individu memanage website.</p>
					</div>
					<div class="col-sm-3">
						<h5>Address</h5>
						<p>Jln. Pancoran Barat 11C<br />Pancoran, Jakarta Selatan<br />Indonesia</p>
					</div>
					<div class="col-sm-3">
						<h5>Contact</h5>
						<p>Phone: +62 89695143400<br />info@popojicms.org</p>
					</div>
				</div>
			</div>
		</section>

		<!-- Site Footer -->
		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						Copyright &copy; 2013-2015 Neon - All Rights Reserved. 
					</div>
					<div class="col-sm-6">
						<ul class="social-networks text-right">
							<li><a href="#"><i class="entypo-instagram"></i></a></li>
							<li><a href="#"><i class="entypo-twitter"></i></a></li>
							<li><a href="#"><i class="entypo-facebook"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</div>

    <!-- JavaScript -->
	<script src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/gsap/main-gsap.js"></script>
	<script src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/bootstrap.js"></script>
	<script src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/joinable.js"></script>
	<script src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/resizeable.js"></script>
	<script src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/neon-slider.js"></script>
	<script src="<?=$website_url;?>/po-content/<?=$folder;?>/assets/js/neon-custom.js"></script>
</body>
</html>
<?php } ?>