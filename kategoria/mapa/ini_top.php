<?php 
	session_start();	
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
	include_once $DOCUMENT_ROOT.'/../ini/skryptyPHP/kategoria_head.php';
		
	include_once '../szablon/nav_head.php';
?>
        <title><?php if($kategoria=="Inne"){
            if(isset($przodek1)){
                echo $przodek1." - inne";
            }
        }else echo $kategoria; ?> - ogłoszenia w tuUslugi.pl</title>
        <meta name="description" content="Internetowa Giełda Usług - ogłoszenia w kategorii <?php if($kategoria=="Inne"){
            if(isset($przodek1)){
                echo $przodek1." - inne";
            }
        }else echo $kategoria; ?>. Usługodawcy, wykonawcy, wykonam, zlecę, szukam." />
        
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="css/kategoria.css" type="text/css" rel="stylesheet"/>
	<link href="css/mini.css" type="text/css" rel="stylesheet"/>
	<script src="js/kategoria.js" type="text/javascript"></script>
