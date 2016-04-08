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
		<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
			function initialize()
			{
				var mapDiv = document.getElementById('map');
				var map = new google.maps.Map(mapDiv, {
					center: new google.maps.LatLng(-6.241783, 106.836029),
					zoom: 16,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					scrollwheel: false
				});
				new google.maps.Marker({
					position: new google.maps.LatLng(-6.241783, 106.836029),
					map: map
				});
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>

		<section class="contact-map" id="map"></section>

		<section class="contact-container">
			<div class="container">
				<div class="row">
					<div class="col-sm-7 sep">
						<h4>Get in touch with us, write us an e-mail!</h4>
						<p>To shewing another demands to. Marianne property cheerful informed at striking at.<br />Clothes parlors however by cottage on.</p>
						<form class="contact-form" role="form" action="<?=$website_url;?>/contact.php" method="post">
							<div class="form-group">
								<input type="text" name="name_contact" class="form-control" placeholder="Name" />
							</div>
							<div class="form-group">
								<input type="text" name="email_contact" class="form-control" placeholder="E-mail" />
							</div>
							<div class="form-group">
								<input type="text" name="subject_contact" class="form-control" placeholder="Subject" />
							</div>
							<div class="form-group">
								<textarea class="form-control" name="message_contact" placeholder="Message" rows="6"></textarea>
							</div>
							<div class="form-group text-right">
								<button class="btn btn-primary" name="send">Send</button>
							</div>
						</form>
					</div>
					<div class="col-sm-offset-1 col-sm-4">
						<div class="info-entry">
							<h4>Address</h4>
							<p>Jln. Pancoran Barat 11C<br />Pancoran, Jakarta Selatan<br />Indonesia</p>
						</div>
						<div class="info-entry">
							<h4>Call Us</h4>
							<p>Phone: +62 89695143400<br />info@popojicms.org</p>
							<ul class="social-networks">
								<li><a href="#"><i class="entypo-instagram"></i></a>
								</li>
								<li><a href="#"><i class="entypo-twitter"></i></a>
								</li>
								<li><a href="#"><i class="entypo-facebook"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>


<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>