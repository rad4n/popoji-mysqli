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
        <div class="page">
            <div class="page_header clearfix page_margin_top">
                <div class="page_header_left">
                    <h1 class="page_title">Kontak</h1>
                </div>
                <div class="page_header_right">
                    <ul class="bread_crumb">
                        <li><a title="Beranda" href="<?=$website_url;?>">Beranda</a></li>
                        <li class="separator icon_small_arrow right_gray">&nbsp;</li>
                        <li>Kontak</li>
                    </ul>
                </div>
            </div>
            <div class="page_layout clearfix">
                <div class="divider_block clearfix">
                    <hr class="divider first"><hr class="divider subheader_arrow"><hr class="divider last">
                </div>
                <div class="row page_margin_top">
                    <div class="column column_2_3">
                        <div class="row">
                            <div class="contact_map" id="map"></div>
                        </div>
                        <div class="row page_margin_top_section">
                            <div class="column column_1_2 border_top">
                                <ul class="page_margin_top">
                                    <li class="item_content clearfix">
                                        <span class="features_icon envelope animated_element animation-scale"></span>
                                        <div class="text">
                                            <h3>Alamat Kami</h3>
                                            <p>Jln. Pancoran Barat 11C,<br />Pancoran, Jakarta Selatan<br />Indonesia</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="column column_1_2 border_top">
                                <ul class="page_margin_top">
                                    <li class="item_content clearfix">
                                        <span class="features_icon mobile animated_element animation-scale"></span>
                                        <div class="text">
                                            <h3>Phone and E-mail</h3>
                                            <p>Phone: 1-234-56-78<br>Fax: 1-234-56-78<br>E-mail: <a href="mailto:info@popojicms.org" title="info@popojicms.org">info@popojicms.org</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row page_margin_top_section">
                            <h4 class="box_header">Tulisan Pesan Anda Disini</h4>
                            <p class="padding_top_30">Silahkan masukan pesan di form ini untuk menghubungi kami. Inputan yang bertanda * harus diisi.</p>
                            <form class="contact_form margin_top_15" action="<?=$website_url;?>/contact.php" method="post">
                                <fieldset class="column column_1_3">
                                    <div class="block">
                                        <input class="text_input" name="name_contact" type="text" placeholder="Nama *">
                                    </div>
                                </fieldset>
                                <fieldset class="column column_1_3">
                                    <div class="block">
                                        <input class="text_input" name="email_contact" type="text" placeholder="Email *">
                                    </div>
                                </fieldset>
                                <fieldset class="column column_1_3">
                                    <div class="block">
                                        <input class="text_input" name="subject_contact" type="text" placeholder="Subjek *">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="block">
                                        <textarea name="message_contact" placeholder="Message *"></textarea>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <input type="submit" name="submit" value="KIRIM PESAN" class="more active">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <?php include_once "po-content/$folder/sidebar.php"; ?>
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