<!DOCTYPE HTML>
<html lang="pl">
	<head>
			<?php
			include '../szablon/nav_head.php';
			?>
			<title>Witaj</title>
	
			<meta name="description" content="Opis w Google" />
			<meta name="keywords" content="słowa, kluczowe, wypisane, po, porzecinku" />
			
	</head>
	
	<body>
		<?php
			include '../szablon/nav_body.php';
			include '../szablon/nav_category.php';
			
			echo "Witaj ".$_SESSION['fr_login']." dziękujemy za rejestrację!! miło nam że jesteś z nami dzięki ".$_SESSION['fr_skad'].".<br/> Liczymy na długą i owocną współpracę!";
			
			include '../szablon/stopka.php';
			?>
	</body>
</html>
