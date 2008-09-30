<?php
defined( '_JEXEC' ) or die( 'Restricted index access' );
$cookie_prefix = "dim-";
$cookie_time = time()+31536000;
if (isset($_GET['fontstyle'])) {
	$font = $_GET['fontstyle'];
	$_SESSION[$cookie_prefix. 'fontstyle'] = $font;
	setcookie ($cookie_prefix. 'fontstyle', $font, $cookie_time, '/', false);
}
if (isset($_GET['tstyle'])) {
	$tstyle = $_GET['tstyle'];
	$_SESSION[$cookie_prefix. 'tstyle'] = $tstyle;
	setcookie ($cookie_prefix. 'tstyle', $tstyle, $cookie_time, '/', false);
}
if (isset($_POST['tstyle'])) {
	$tstyle = $_POST['tstyle'];
	$_SESSION[$cookie_prefix. 'tstyle'] = $tstyle;
	setcookie ($cookie_prefix. 'tstyle', $tstyle, $cookie_time, '/', false);
}
if (isset($_GET['mtype'])) {
	$mtype = $_GET['mtype'];
	$_SESSION[$cookie_prefix. 'mtype'] = $mtype;
	setcookie ($cookie_prefix. 'mtype', $mtype, $cookie_time, '/', false);
}
if (isset($_GET['tempus'])) {
	$tempus = $_GET['tempus'];
	$_SESSION[$cookie_prefix. 'tempus'] = $tempus;
	setcookie ($cookie_prefix. 'tempus', $tempus, time()+60, '/', false);
}

?>
