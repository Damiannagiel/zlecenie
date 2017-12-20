<!DOCTYPE HTML>
<html lang="pl">
<head>

	<?php 
	
		session_start();
		include_once '../szablon/nav_head.php';

		$ogloszenie=$_GET['ogloszenie'];

		$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];	
		require_once ($DOCUMENT_ROOT.'/../ini/skryptyPHP/kontakt_skrypt.php');
		
	?>
	<link href="kontakt.css" type="text/css" rel="stylesheet"/>
</head>

	<?php include_once '../szablon/nav_body.php'; ?>

		<div class="kontakt">
			<div class="top">
				<div class="img_div">
					<img class="kontakt_img" src="../ogloszenie/img/<?php echo $ogloszenie ?>/1.jpg"/>
				</div>
				<div class="div_info">
					<div class="tytul_div">
						<a href="../ogloszenie/<?php echo $link ?>.php"><p class="tytul"><b><?php echo $tytul ?></b></p></a>
					</div>
					<div class="user_div">
						<p class="tytul">Kontakt z ogłoszenia użytkownika:<p/>
						<p class="user"><a href="../public_profile/user.php?id=<?php echo $user_id['id'] ?>"><b><?php echo $user ?></b></a></p>
					</div>
				</div>
			</div>
			<div class="bottom">
				<p class="nr"><b>Telefon: </b><?php echo $telefon ?></p>
				<p class="nr"><b>E-mail: </b><?php echo $email ?></p>
				<p class="nr"><b>WWW: </b><?php if($www!='--'){echo '<a class="link" target="blank" href="'.$http.$www.'">'.$www.'</a></p>';}else echo '--';?>
			</div>
		</div>

	<?php include_once '../szablon/stopka.php'; ?>