<?php
	session_start();
	
	
	//	ustaw krótkie zmienne dla danych pozyskanych z formulaża
	$_SESSION['imie'] = $_POST['imie'];
	$_SESSION['nazwisko'] = $_POST['nazwisko'];
	$_SESSION['miejscowosc'] = $_POST['miejscowosc'];
	$_SESSION['wiek'] = $_POST['wiek'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['wojewodztwo'] = $_POST['wojewodztwo'];
	
	//
	$_SESSION['na_rynku'] = $_POST['wiek'];
	
?>



