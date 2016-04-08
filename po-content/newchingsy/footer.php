<?php if ($mod==""){
	header('location:../../404.php');
}else{
?>
        <div class="footer_container">
            <div class="footer clearfix">
                <div class="row">
                    <div class="column column_1_3">
                        <h4 class="box_header">Tentang Kami</h4>
                        <p class="padding_top_bottom_25">PopojiCMS merupakan salah satu content management system yang dibuat dengan konsep sederhana untuk memudahkan setiap individu memanage website.</p>
                    </div>
                    <div class="column column_1_3">
                        <h4 class="box_header">Kontak</h4>
                        <p class="padding_top_bottom_25">
                            Jln. Pancoran Barat 11C, Pancoran, Jakarta Selatan, Indonesia.<br /><br />
                            Phone: 1-234-56-78<br />
                            Fax: 1-234-56-78
                        </p>
                    </div>
                    <div class="column column_1_3">
                        <h4 class="box_header">Social Media</h4>
                        <ul class="social_icons dark page_margin_top clearfix">
                            <li><a target="_blank" title="" href="javascript:void(0);" class="social_icon facebook">&nbsp;</a></li>
                            <li><a target="_blank" title="" href="javascript:void(0);" class="social_icon twitter">&nbsp;</a></li>
                            <li><a title="" href="javascript:void(0);" class="social_icon mail">&nbsp;</a></li>
                            <li><a target="_blank" title="" href="javascript:void(0);" class="social_icon skype">&nbsp;</a></li>
                            <li><a target="_blank" title="" href="javascript:void(0);" class="social_icon instagram">&nbsp;</a></li>
                            <li><a target="_blank" title="" href="javascript:void(0);" class="social_icon pinterest">&nbsp;</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row page_margin_top_section">
                    <div class="column column_3_4">&nbsp;</div>
                    <div class="column column_1_4"><a class="scroll_top" href="#top" title="Scroll to top">Top</a></div>
                </div>
                <div class="row copyright_row">
                    <div class="column column_2_3">
                        &copy; Copyright 2013-2015. <a href="<?=$website_url;?>" title="<?=$website_name;?>" target="_blank"><?=$website_name;?></a> - Chingsy Template. 
                    </div>
                    <div class="column column_1_3">
                        <ul class="footer_menu">
                            <li><h6><a href="<?=$website_url;?>" title="Beranda">Beranda</a></h6></li>
                            <li><h6><a href="<?=$website_url;?>/pages/tentang-kami" title="Tentang Kami">Tentang Kami</a></h6></li>
                            <li><h6><a href="<?=$website_url;?>/contact" title="Kontak">Kontak</a></h6></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	</div>

    <!-- JavaScript -->
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.ba-bbq.min.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery-ui-1.11.1.custom.min.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.touchSwipe.min.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.transit.min.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.sliderControl.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.timeago.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.hint.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.qtip.min.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.blockUI.js"></script>
    <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/main.js"></script>
    <script type="text/javascript" src="<?=$website_url;?>/po-content/<?=$folder;?>/js/odometer.min.js"></script>
</body>
</html>
<?php } ?>