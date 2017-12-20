<?php
	session_start();
	
	//ustal czy użytkownik prowadzi działalność gospodarczą
	$osobowosc = $_POST['osobowosc1'];
	$_SESSION['osobowosc1'] = $osobowosc;
?>



