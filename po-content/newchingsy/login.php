<?php if ($mod==""){
	header('location:../../404.php');
}else{
	if ($member_register == "Y"){
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
                    <h1 class="page_title">Login Member</h1>
                </div>
                <div class="page_header_right">
                    <ul class="bread_crumb">
                        <li><a title="Beranda" href="<?=$website_url;?>">Beranda</a></li>
                        <li class="separator icon_small_arrow right_gray">&nbsp;</li>
                        <li>Login Member</li>
                    </ul>
                </div>
            </div>
            <div class="page_layout clearfix">
                <div class="divider_block clearfix">
                    <hr class="divider first"><hr class="divider subheader_arrow"><hr class="divider last">
                </div>
                <div class="row">
                    <div class="column column_2_3">
                        <p class="padding_top_30">Login ke profilmu dan share segala sesuatu tentangmu sekarang.</p>
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
<?php
	}else{
		header('location:404.php');
	}
}
?>