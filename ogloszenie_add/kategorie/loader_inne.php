<?php
session_start();
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
require_once ($DOCUMENT_ROOT.'/../ini/funkcjePHP/formatuj_ciag.php');

$CONTENT=przetwoz_kat($_POST['Content']);

if($CONTENT == "inne")
{
	include_once ($CONTENT.'.html');
	exit;
}
exit;
?>