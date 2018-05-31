<!DOCTYPE HTML>
<html lang="pl">
<head>

	<?php 
	
		session_start();
		include_once '../szablon/nav_head.php';

		$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];	
		require_once ($DOCUMENT_ROOT.'/../ini/skryptyPHP/kontakt_skrypt.php');
		
	?>
	<link href="kontakt.css" type="text/css" rel="stylesheet"/>
</head>

	<?php include_once '../szablon/nav_body.php'; ?>

		<div class="kontakt <?php if($archives==true)echo"archives";?>">
			<div class="top">
				<div class="img_div">
					<img class="kontakt_img" src="<?php echo $img_src; ?>"/>
				</div>
				<div class="div_info">
					<div class="tytul_div">
						<a href="../ogloszenie/<?php echo $link ?>.php"><p class="tytul"><b><?php echo $tytul ?></b></p></a>
					</div>
					<div class="user_div">
						<p class="tytul">Kontakt z ogłoszenia użytkownika:<p/>
						<p class="user"><a href="../public_profile/user.php?id=<?php echo $user_id['id'] ?>"><b><?php echo $user ?></b></a></p>
                                                <div class="button-div">
                                                 <?php if(isset($wiadomosc))echo $wiadomosc; ?>
                                                </div>
					</div>
				</div>
			</div>
			<div class="bottom">
                            <?php
                                if(!isset($no_permission)){
                                    echo '<p class="nr"><b>Telefon: </b>'.$telefon.'</p><p class="nr"><b>E-mail: </b>'.$email.'</p><p class="nr"><b>WWW: </b>';
                                    if($www!='--'){echo '<a class="link" target="blank" href="'.$http.$www.'">'.$www.'</a></p>';}else echo '--</p>';
                                    
                                }
                                else echo $no_permission;
                            ?>
			</div>
		</div>

	<?php include_once '../szablon/stopka.php'; ?>