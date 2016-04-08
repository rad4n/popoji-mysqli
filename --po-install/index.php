<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
	error_reporting(E_ALL & ~E_NOTICE);

$aConf = array();
$aConf['structure']	= 'PopojiCMS';
$aConf['release'] 	= '09 Februari 2015';
$aConf['ver'] 		= '1.3';
$aConf['build'] 	= '0';
$aConf['header_inc_file'] 	= '../po-library/po-config.php';
$aConf['dir_inc'] 	= '../po-library/';	
$aConf['headerTempl'] 	= <<<EOS
<?php

\$site['structure']  	= '{$aConf['structure']}';
\$site['ver']        	= '{$aConf['ver']}';
\$site['build']      	= '{$aConf['build']}';
\$site['release']    	= '{$aConf['release']}';

\$site['title']      	= "%site_title%";
\$site['url']     	 	= "%site_url%";
\$site['adm']  		 	= "{\$site['url']}po-admin/";
\$site['con']     	 	= "{\$site['url']}po-content/";
\$site['lib']  		 	= "{\$site['url']}po-library/";

\$dir['root']        	= "%dir_root%"; 
\$dir['adm']         	= "{\$dir['root']}po-admin/";
\$dir['con']         	= "{\$dir['root']}po-content/";
\$dir['lib']         	= "{\$dir['root']}po-library/";

define('PO_DIRECTORY_PATH_ADM', \$dir['adm']);
define('PO_DIRECTORY_PATH_CON', \$dir['con']);
define('PO_DIRECTORY_PATH_LIB', \$dir['lib']);

\$db['host']          	= "%db_host%";
\$db['sock']          	= "%db_sock%";
\$db['port']          	= "%db_port%";
\$db['user']          	= "%db_user%";
\$db['passwd']			= "%db_password%";
\$db['db']				= "%db_name%";

define('DATABASE_HOST', \$db['host']);
define('DATABASE_SOCK', \$db['sock']);
define('DATABASE_PORT', \$db['port']);
define('DATABASE_USER', \$db['user']);
define('DATABASE_PASS', \$db['passwd']);
define('DATABASE_NAME', \$db['db']);

if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
	error_reporting(E_ALL & ~E_NOTICE);
  
if (file_exists( \$dir['root'] . 'po-install' )){
\$ret = <<<EOJ
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<title>PopojiCMS Installation</title>
			<link href="{\$site['url']}po-install/css/bootstrap.min.css" rel="stylesheet" />
			<link href="{\$site['url']}po-install/css/docs.css" rel="stylesheet" />
			<link href='{\$site['url']}po-install/favicon.png' rel='icon' />
			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
			  <script src="{\$site['url']}po-install/js/html5shiv.js"></script>
			  <script src="{\$site['url']}po-install/js/respond.min.js"></script>
			<![endif]-->
		</head>
		<body class="bs-docs-home">
			<a class="sr-only" href="#content">Skip navigation</a>
			<div id="main">
			<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
				<div class="container">
					<div class="navbar-header">
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="./" class="navbar-brand">PopojiCMS</a>
					</div>
					<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
						<ul class="nav navbar-nav">
							<li><a>Congratulations</a></li>
						</ul>
					</nav>
				</div>
			</header>
			<main class="bs-masthead" id="content" role="main">
				<div class="container">
					<h1>{\$site['structure']} {\$site['ver']}.{\$site['build']}</h1>
					<h2>Release {\$site['release']}</h2>
					<p>&nbsp</p>
					<h4>Anda telah berhasil menginstall PopojiCMS silahkan remove 'po-install' directory</h4>
				</div>
			</main>
			<footer class="container" role="contentinfo">
				<ul class="bs-masthead-links">
					<li class="current-version">{\$site['structure']} {\$site['ver']}.{\$site['build']}</li>
					<li>&copy; 2013-2015. All Right Reserved</li>
					<li><a href="http://www.popojicms.org" target="_blank">PopojiCMS Official Website</a></li>
				</ul>
			</footer>
			<script src="{\$site['url']}po-install/js/jquery.js"></script>
			<script src="{\$site['url']}po-install/js/bootstrap.min.js"></script>
		</body>
	</html>
EOJ;
echo \$ret;
exit();
}

?>
EOS;

	$confFirst = array();
	$confFirst['site_url'] = array(
		'name' => "Site URL",
		'ex' => "http://www.mydomain.com/path/",
		'desc' => "Url situs anda (Ingat, beri backslash dibelakang url '/')",
		'def' => "http://",
	    'def_exp' => '
			$str = "http://".$_SERVER[\'HTTP_HOST\'].$_SERVER[\'PHP_SELF\'];
		    return preg_replace("/po-install\/(index\.php$)/","",$str);',
		'check' => 'return strlen($arg0) >= 10 ? true : false;'
	);
	$confFirst['dir_root'] = array(
		'name' => "Directory root",
		'ex' => "/path/to/your/script/files/",
		'desc' => "Directory dimana PopojiCMS anda diletakan.",
	    'def_exp' => '
			$str = rtrim($_SERVER[\'DOCUMENT_ROOT\'], \'/\').$_SERVER[\'PHP_SELF\'];
		    return preg_replace("/po-install\/(index\.php$)/","",$str);',
		'check' => 'return strlen($arg0) >= 1 ? true : false;'
	);
	

	$confDB = array();
	$confDB['sql_file'] = array(
	    'name' => "SQL file",
	    'ex' => "/home/situsanda/public_html/po-install/sql/popojicms.sql",
	    'desc' => "SQL file location",
		'def' => "sql/popojicms.sql",
		'def_exp' => '
			if ( !( $dir = opendir( "sql/" ) ) )
		        return "";
			while (false !== ($file = readdir($dir)))
		        {
			    if ( substr($file,-3) != \'sql\' ) continue;
				closedir( $dir );
				return "sql/$file";
			}
			closedir( $dir );
			return "";',
		'check' => 'return strlen($arg0) >= 4 ? true : false;'
	);
	 $confDB['db_host'] = array(
		'name' => "Database host name",
		'ex' => "localhost",
		'desc' => "Your MySQL database host name here.",
		'def' => "localhost",
		'check' => 'return strlen($arg0) >= 1 ? true : false;'
	);
	$confDB['db_port'] = array(
		'name' => "Database host port number",
		'ex' => "5506",
		'desc' => "Leave blank or specify MySQL Database host port number.",
		'def' => "",
		'check' => ''
	);
	$confDB['db_sock'] = array(
		'name' => "Database socket path",
		'ex' => "/tmp/mysql50.sock",
		'desc' => "Leave blank or specify MySQL Database socket path.",
		'def' => "",
		'check' => ''
	);
	$confDB['db_name'] = array(
	    'name' => "Database name",
	    'ex' => "YourDatabaseName",
	    'desc' => "Your MySQL database name here.",
	    'check' => 'return strlen($arg0) >= 1 ? true : false;'
	);
	$confDB['db_user'] = array(
		'name' => "Database user",
		'ex' => "YourName",
		'desc' => "Your MySQL database read/write user name here.",
		'check' => 'return strlen($arg0) >= 1 ? true : false;'
	);
	$confDB['db_password'] = array(
		'name' => "Database password",
		'ex' => "YourPassword",
		'desc' => "Your MySQL database password here.",
		'check' => 'return strlen($arg0) >= 0 ? true : false;'
	);

	$confGeneral = array();
	$confGeneral['site_title'] = array(
		'name' => "Site Title",
		'ex' => "The Best Community",
		'desc' => "The name of your site.",
		'check' => 'return strlen($arg0) >= 1 ? true : false;'
	);
	$confGeneral['site_desc'] = array(
		'name' => "Site Description",
		'ex' => "The place to find new friends, communicate and have fun.",
		'desc' => "Meta description of your site.",
		'check' => 'return strlen($arg0) >= 1 ? true : false;'
	);
	$confGeneral['site_email'] = array(
		'name' => "Site e-mail",
		'ex' => "your@email.here",
		'desc' => "Your site e-mail.",
		'check' => 'return strlen($arg0) > 0 AND strstr($arg0,"@") ? true : false;'
	);
	$confGeneral['site_user'] = array(
		'name' => "Site Username",
		'ex' => "admin",
		'desc' => "Username for login to administrator page, please just write letters and numbers.",
		'check' => 'return strlen($arg0) >= 1 ? true : false;'
	);
	$confGeneral['site_pass'] = array(
		'name' => "Site Password",
		'ex' => "admin123",
		'desc' => "Password for login to administrator page, please enter character more than 6 characters.",
		'check' => 'return strlen($arg0) >= 6 ? true : false;'
	);

	$aTemporalityWritableFolders = array(
		'inc',
	);

$action = isset($_REQUEST['action'])?$_REQUEST['action']:'';
$error = '';

$InstallPageContent = InstallPageContent( $error );

mb_internal_encoding('UTF-8');

echo PageHeader( $action, $error );
echo $InstallPageContent;
echo PageFooter( $action );

function InstallPageContent(&$error) {
	global $aConf, $confFirst, $confDB, $confGeneral;
        $action = isset($_REQUEST['action'])?$_REQUEST['action']:'';
	$ret = '';

	switch ($action) {

		case 'step5':
			$ret .= genMainPage();
		break;

		case 'step4':
			$errorMessage = checkConfigArray($confGeneral, $error);
			$ret .= (strlen($errorMessage)) ? genSiteGeneralConfig($errorMessage) : genInstallationProcessPage();
		break;

		case 'step3':
			$errorMessage = checkConfigArray($confDB, $error);
			$errorMessage .= CheckSQLParams();

			$ret .=  (strlen($errorMessage)) ? genDatabaseConfig($errorMessage) : genSiteGeneralConfig();
		break;

		case 'step2':
			$errorMessage = checkConfigArray($confFirst, $error);
			$ret .= (strlen($errorMessage)) ? genPathCheckingConfig($errorMessage) : genDatabaseConfig();
		break;

		case 'step1':
			$ret .= genPathCheckingConfig();
		break;

		default:
			$ret .= StartInstall();
		break;
	}

	return $ret;
}

function PageHeader($action = '', $error = '') {
	global $aConf;

	$actions = array(
		"startInstall" => "Getting Started",
		"step1" => "Paths",
		"step2" => "Database",
		"step3" => "Config",
		"step4" => "Installation Process",
		"step5" => "Main Page",
	);

	if( !strlen( $action ) )
		$action = "startInstall";

	$activeStyle = ($action == "startInstall" OR $action == "step5") ? 'bs-docs-home' : '';

	$iCounterCurrent = 1;
	$iCounterActive	 = 1;

	foreach ($actions as $actionKey => $actionValue) {
		if ($action != $actionKey) {
			$iCounterActive++;
		} else
			break;
	}

	if (strlen($error))
		$iCounterActive--;

	$subActions = '';
	foreach ($actions as $actionKey => $actionValue) {
		if ($iCounterActive == $iCounterCurrent) {
			$subActions .= '<li class="active"><a>' . $actionValue . '</a></li>';
		} elseif (($iCounterActive - $iCounterCurrent) == -1) {
			$subActions .= '<li><a>' . $actionValue . '</a></li>';
		} elseif (($iCounterActive - $iCounterCurrent) == 1) {
			$subActions .= '<li><a>' . $actionValue . '</a></li>';
		} else {
			$subActions .= '<li><a>' . $actionValue . '</a></li>';
			if ($actionKey != "step6")
				$subActions .= '';
		}
		$iCounterCurrent++;
	}

	return <<<EOF
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>PopojiCMS Installation</title>
			<link href="css/bootstrap.min.css" rel="stylesheet" />
			<link href="css/docs.css" rel="stylesheet" />
			<link href='favicon.png' rel='icon' />
			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
			  <script src="js/html5shiv.js"></script>
			  <script src="js/respond.min.js"></script>
			<![endif]-->
		</head>
		<body class="{$activeStyle}">
			<a class="sr-only" href="#content">Skip navigation</a>
			<div id="main">
			<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
				<div class="container">
					<div class="navbar-header">
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="./" class="navbar-brand">PopojiCMS</a>
					</div>
					<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
						<ul class="nav navbar-nav">
							{$subActions}
						</ul>
					</nav>
				</div>
			</header>
EOF;
}

function PageFooter($action) {
	global $aConf;

	return <<<EOF
		<footer class="container" role="contentinfo">
			<ul class="bs-masthead-links">
				<li class="current-version">PopojiCMS {$aConf['ver']}.{$aConf['build']}</li>
				<li>&copy; 2013-2015. All Right Reserved</li>
				<li><a href="http://www.popojicms.org" target="_blank">PopojiCMS Official Website</a></li>
			</ul>
		</footer>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
EOF;
}

function StartInstall() {
	global $aConf;

	return <<<EOF
			<main class="bs-masthead" id="content" role="main">
				<div class="container">
					<h1>PopojiCMS {$aConf['ver']}.{$aConf['build']}</h1>
					<p class="lead">Selamat datang di PopojiCMS installation page, klik tombol berikut untuk memulai proses instalasi.</p>
					<div class="install_button">
						<form action="{$_SERVER['PHP_SELF']}" method="post">
							<input type="hidden" name="action" value="step1" />
							<input type="submit" class="btn btn-outline-inverse btn-lg" value="Mulai Proses Penginstalan" />
						</form>
					</div>
				</div>
			</main>
EOF;
}

function genPathCheckingConfig($errorMessage = '') {
	global  $aConf, $confFirst;

	$currentPage = $_SERVER['PHP_SELF'];

	$error = printInstallError( $errorMessage );
	$pathsTable = createTable($confFirst);

	return <<<EOF
			<div class="bs-header" id="content">
				<div class="container">
					<h1>Paths Check</h1>
					<p>PopojiCMS checks general script paths.</p>
				</div>
			</div>
			<div class="container bs-docs-container">
				<div class="row">
					<div class="col-md-12">
						<p>&nbsp;</p>
						<p>{$error}</p>
						<div class="bs-example">
							<form action="{$currentPage}" method="post">
								<table class="table">
									{$pathsTable}
								</table>
								<div class="text-center">
									<input type="submit" class="btn btn-default btn-lg" value="Next" />
									<input type="hidden" name="action" value="step2" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
EOF;
}

function genDatabaseConfig($errorMessage = '') {
	global $confDB;

	$currentPage = $_SERVER['PHP_SELF'];
	$DbParamsTable = createTable($confDB);

	$errors = '';
	if (strlen($errorMessage)) {
		$errors = printInstallError($errorMessage);
		unset($_POST['db_name']);
		unset($_POST['db_user']);
		unset($_POST['db_password']);
	}

	$oldDataParams = '';
	foreach($_POST as $postKey => $postValue) {
		$oldDataParams .= ('action' == $postKey || isset($confDB[$postKey])) ? '' : '<input type="hidden" name="' . $postKey . '" value="' . $postValue . '" />';
	}

	return <<<EOF
			<div class="bs-header" id="content">
				<div class="container">
					<h1>Database</h1>
					<p>PopojiCMS checks and connect to database.</p>
				</div>
			</div>
			<div class="container bs-docs-container">
				<div class="row">
					<div class="col-md-12">
						<p>&nbsp;</p>
						<p>{$errors}</p>
						<div class="bs-example">
							<form action="{$currentPage}" method="post">
								<table class="table">
									{$DbParamsTable}
								</table>
								<div class="text-center">
									<input type="submit" class="btn btn-default btn-lg" value="Next" />
									<input type="hidden" name="action" value="step3" />
									{$oldDataParams}
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
EOF;
}

function genSiteGeneralConfig($errorMessage = '') {
	global $confGeneral;

	$currentPage = $_SERVER['PHP_SELF'];
	$paramsTable = createTable($confGeneral);

	$errors = '';
	if (strlen($errorMessage)) {
		$errors = printInstallError($errorMessage);
		unset($_POST['site_title']);
		unset($_POST['site_email']);
		unset($_POST['site_user']);
		unset($_POST['site_pass']);
		unset($_POST['notify_email']);
		unset($_POST['bug_report_email']);
	}

	$oldDataParams = '';
	foreach($_POST as $postKey => $postValue) {
		$oldDataParams .= ('action' == $postKey || isset($confGeneral[$postKey])) ? '' : '<input type="hidden" name="' . $postKey . '" value="' . $postValue . '" />';
	}

	return <<<EOF
			<div class="bs-header" id="content">
				<div class="container">
					<h1>Configuration</h1>
					<p>PopojiCMS checks and config your site informations.</p>
				</div>
			</div>
			<div class="container bs-docs-container">
				<div class="row">
					<div class="col-md-12">
						<p>&nbsp;</p>
						<p>{$errors}</p>
						<div class="bs-example">
							<form action="{$currentPage}" method="post">
								<table class="table">
									{$paramsTable}
								</table>
								<div class="text-center">
									<input type="submit" class="btn btn-default btn-lg" value="Next" />
									<input type="hidden" name="action" value="step4" />
									{$oldDataParams}
								</div>
							</form>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
EOF;
}

function genInstallationProcessPage($errorMessage = '') {
	global $aConf, $confFirst, $confDB, $confGeneral;

	$resRunSQL = RunSQL();

	$sForm = '';
	
	if ('done' ==  $resRunSQL) {
		$sForm = '
		<div class="text-center">
			<form action="' . $_SERVER['PHP_SELF'] . '" method="post">
				<input type="submit" class="btn btn-default btn-lg" value="Finish" />
				<input type="hidden" name="action" value="step5" />
			</form>
		</div>';
	} else {
		$sForm = $resRunSQL . '
		<div class="text-center">
			<form action="' . $_SERVER['PHP_SELF'] . '" method="post">
				<input type="submit" class="btn btn-default btn-lg" value="Back" />';
		foreach ($_POST as $sKey => $sValue) {
			if ($sKey != "action")
				$sForm .= '<input type="hidden" name="' . $sKey . '" value="' . $sValue . '" />';
		}
		$sForm .= '<input type="hidden" name="action" value="step2" />
			</form>
		</div>';
		return $sForm;
	}

	foreach ($confFirst as $key => $val) {
		$aConf['headerTempl'] = str_replace ("%$key%", $_POST[$key], $aConf['headerTempl']);
	}
	foreach ($confDB as $key => $val) {
		$aConf['headerTempl'] = str_replace ("%$key%", $_POST[$key], $aConf['headerTempl']);
	}
	foreach ($confGeneral as $key => $val) {
		$aConf['headerTempl'] = str_replace ("%$key%", $_POST[$key], $aConf['headerTempl']);
	}

	$innerCode = '';
	$fp = fopen($aConf['header_inc_file'], 'w');
	if ($fp) {
		fputs($fp, $aConf['headerTempl']);
		fclose($fp);
		chmod($aConf['header_inc_file'], 0666);
		//$innerCode .='Config file telah berhasil ditulis di <strong>' . $aConf['header_inc_file'] . '</strong><br />';
	} else {
		$text = 'Warning!!! can not get write access to config file ' . $aConf['header_inc_file'] . '. Here is config file</font><br>';
		$innerCode .= printInstallError($text);
		$trans = get_html_translation_table(HTML_ENTITIES);
		$templ = strtr($aConf['headerTempl'], $trans);
		$sInnerCode .= '<textarea cols="20" rows="10" class="headerTextarea">' . $aConf['headerTempl'] . '</textarea>';
	}
	return <<<EOF
			<div class="bs-header" id="content">
				<div class="container">
					<h1>Congratulations</h1>
				</div>
			</div>
			<div class="container bs-docs-container">
				<div class="row">
					<div class="col-md-12">
						<p>&nbsp;</p>
						<div class="bs-example">
							<p>&nbsp;</p>
							<h1 class="text-center">Proses penginstalan sudah selesai.</h1>
							<p>&nbsp;</p>
							{$sForm}
							<p>&nbsp;</p>
						</div>
					</div>
				</div>
			</div>
EOF;
}

// check of config pages steps
function checkConfigArray($checkedArray, &$error) {

	$errorMessage = '';

	foreach ($checkedArray as $key => $value) {
		if (! strlen($value['check'])) continue;

		$funcbody = $value['check'];
		$func = create_function('$arg0', $funcbody);

		if (! $func($_POST[$key])) {
			$fieldErr = $value['name'];
			$errorMessage .= "Please, input valid data to <b>{$fieldErr}</b> field<br />";
			$error_arr[$key] = 1;
			unset($_POST[$key]);
		} else
			$error_arr[$key] = 0;

		//$config_arr[$sKey]['def'] = $_POST[$sKey];
	}

	if (strlen($errorMessage)) {
		$error = 'error';
	}

	return $errorMessage;
}

function genMainPage() {
	return <<<EOF
<script type="text/javascript">
	window.location = "../index.php";
</script>
EOF;
}

function printInstallError($text) {
	$ret = (strlen($text)) ? '<div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>' . $text . '</div>' : '';
	return $ret;
}

function createTable($arr) {
	$ret = '';
	$i = '';
        $error_arr = array();
	foreach($arr as $key => $value) {
		$sStyleAdd = (($i%2) == 0) ? 'background-color:#f3f3f3;' : 'background-color:#fff;';

		$def_exp_text = "";
		if (strlen($value['def_exp'])) {
		    $funcbody = $value['def_exp'];
		    $func = create_function("", $funcbody);
		    $def_exp = $func();
			if (strlen($def_exp)) {
				$def_exp_text = "<i>(Status : <font color=green>found</font>)</i>";
				$value['def'] = $def_exp;
			} else {
				$def_exp_text = "<i>(Status : <font color=red>not found</font>)</i>";
			}
		}

		$st_err = ($error_arr[$key] == 1) ? ' style="background-color:#ffdddd;" ' : '';

		$ret .= <<<EOF
		<tr class="cont" style="{$sStyleAdd}">
			<td>
				<div>{$value['name']} {$def_exp_text}</div>
				<div>Description :</div>
				<div>Example :</div>
			</td>
			<td>
				<div><input {$st_err} size="30" name="{$key}" class="form-control input-sm" value="{$value['def']}" /></div>
				<div>{$value['desc']}</div>
				<div style="font-style:italic;">{$value['ex']}</div>
			</td>
		</tr>
EOF;
		$i ++;
	}

	return $ret;
}

function rewriteFile($code, $replace, $file) {
	$ret = '';
	$fs = filesize($file);
	$fp = fopen($file, 'r');
	if ($fp) {
		$fcontent = fread($fp, $fs);
		$fcontent = str_replace($code, $replace, $fcontent);
		fclose($fp);
		$fp = fopen($file, 'w');
		if ($fp) {
			if (fputs($fp, $fcontent)) {
				$ret .= true;
			} else {
				$ret .= false;
			}
			fclose ( $fp );
		} else {
			$ret .= false;
		}
	} else {
		$ret .= false;
	}
	return $ret;
}

function RunSQL() {
	$confDB['host']   = $_POST['db_host'];
	$confDB['sock']   = $_POST['db_sock'];
	$confDB['port']   = $_POST['db_port'];
	$confDB['user']   = $_POST['db_user'];
	$confDB['passwd'] = $_POST['db_password'];
	$confDB['db']     = $_POST['db_name'];

	$confDB['host'] .= ( $confDB['port'] ? ":{$confDB['port']}" : '' ) . ( $confDB['sock'] ? ":{$confDB['sock']}" : '' );

	$pass = true;
	$errorMes = '';
	$filename = $_POST['sql_file'];

	$vLink = @mysqli_connect($confDB['host'], $confDB['user'], $confDB['passwd'],$confDB['db']);

	if( !$vLink )
		return printInstallError( mysqli_connect_error() );

	if (!mysqli_connect($confDB['host'], $confDB['user'], $confDB['passwd'],$confDB['db']))
		return printInstallError( $confDB['db'] . ': ' . mysqli_connect_error() );

    mysqli_query ($vLink, "SET sql_mode = ''");

    if (! ($f = fopen ( $filename, "r" )))
    	return printInstallError( 'Could not open file with sql instructions:' . $filename  );

	//Begin SQL script executing
	$s_sql = "";
	while ($s = fgets ( $f, 10240)) {
		$s = trim( $s ); //Utf with BOM only

		if (! strlen($s)) continue;
		if (mb_substr($s, 0, 1) == '#') continue; //pass comments
		if (mb_substr($s, 0, 2) == '--') continue;
		if (substr($s, 0, 5) == "\xEF\xBB\xBF\x2D\x2D") continue;

		$s_sql .= $s;

		if (mb_substr($s, -1) != ';') continue;

		$res = mysqli_query($vLink, $s_sql);
		if (!$res)
			$errorMes .= 'Error while executing: ' . $s_sql . '<br />' . mysqli_connect_error() . '<hr />';

		$s_sql = '';
	}


    fclose($f);
    
	$siteEmail = DbEscape($_POST['site_email']);
	$siteTitle = DbEscape($_POST['site_title']);
	$siteDesc = DbEscape($_POST['site_desc']);
	$siteUser = DbEscape($_POST['site_user']);
	$sitePass = DbEscape($_POST['site_pass']);
	$sitePassEnc = md5($sitePass);
	$strUrlsim = rtrim("http://".$_SERVER['HTTP_HOST'], "/").$_SERVER['PHP_SELF'];
	$strUrlsim2 = preg_replace("/\/po-install\/(index\.php$)/","",$strUrlsim);
	$siteUrlsim = $strUrlsim2;
	date_default_timezone_set('Asia/Jakarta');
	$siteTgl = date("Ymd");
	if ($siteEmail != '' && $siteTitle != '' && $siteUser != '' && $sitePass != '') {
		if (! (mysqli_query($vLink,"INSERT INTO `setting` (`id_setting`, `website_name`, `website_url`, `website_email`, `meta_description`, `meta_keyword`, `favicon`, `timezone`) VALUES('1', '{$siteTitle}', '{$siteUrlsim}', '{$siteEmail}', '{$siteDesc}', 'popojicms, website popojicms, cms indonesia, cms terbaik indonesia, cms gratis, cms gratis indonesia, alternatif cms', 'favicon.png', 'Asia/Jakarta')")))
			$ret .= "<font color=red><i><b>Error</b>:</i> ".mysqli_connect_error($vLink)."</font>";
		if (! (mysqli_query($vLink,"INSERT INTO `users` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `no_telp`, `bio`, `userpicture`, `level`, `blokir`, `id_session`, `tgl_daftar`) VALUES(1, '{$siteUser}', '{$sitePassEnc}', 'Administrator', '{$siteEmail}', '08xxxxxxxxxx', 'No matter how exciting or significant a person''s life is, a poorly written biography will make it seem like a snore. On the other hand, a good biographer can draw insight from an ordinary life-because they recognize that even the most exciting life is an ordinary life! After all, a biography isn''t supposed to be a collection of facts assembled in chronological order; it''s the biographer''s interpretation of how that life was different and important.', '', '1', 'N', '{$sitePassEnc}', '{$siteTgl}')")))
			$ret .= "<font color=red><i><b>Error</b>:</i> ".mysqli_connect_error($vLink)."</font>";
	} else {
		$ret .= "<font color=red><i><b>Error</b>:</i> Mohon dicheck kembali site_email atau site_title</font>";
	}

    mysqli_close($vLink);

    $errorMes .= $ret;

    if (strlen($errorMes)) {
    	return printInstallError($errorMes);
    } else {
    	return 'done';
    }
//    return $ret."Truncating tables finished.<br>";
}

function DbEscape($s, $isDetectMagixQuotes = true) {
	$confDB['host']   = $_POST['db_host'];
	$confDB['sock']   = $_POST['db_sock'];
	$confDB['port']   = $_POST['db_port'];
	$confDB['user']   = $_POST['db_user'];
	$confDB['passwd'] = $_POST['db_password'];
	$confDB['db']     = $_POST['db_name'];

	$confDB['host'] .= ( $confDB['port'] ? ":{$confDB['port']}" : '' ) . ( $confDB['sock'] ? ":{$confDB['sock']}" : '' );

	$pass = true;
	$errorMes = '';
	$filename = $_POST['sql_file'];

	$vLink = @mysqli_connect($confDB['host'], $confDB['user'], $confDB['passwd']);
     if (get_magic_quotes_gpc() && $isDetectMagixQuotes)
         $s = stripslashes ($s);
     return mysqli_real_escape_string($vLink,$s);
}

function CheckSQLParams() {
	$confDB['host']   = $_POST['db_host'];
	$confDB['sock']   = $_POST['db_sock'];
	$confDB['port']   = $_POST['db_port'];
	$confDB['user']   = $_POST['db_user'];
	$confDB['passwd'] = $_POST['db_password'];
	$confDB['db']     = $_POST['db_name'];

	$confDB['host'] .= ( $confDB['port'] ? ":{$confDB['port']}" : '' ) . ( $confDB['sock'] ? ":{$confDB['sock']}" : '' );

	$vLink = @mysqli_connect($confDB['host'], $confDB['user'], $confDB['passwd']);

	if (!$vLink)
		return printInstallError(mysqli_connect_error());

	if (!mysqli_connect($confDB['host'], $confDB['user'], $confDB['passwd'],$confDB['db']))
		return printInstallError($confDB['db'] . ': ' . mysqli_connect_error());

	mysqli_close($vLink);
}

?>