<!DOCTYPE HTML>
<html lang="pl">
	<head>
			<title>Informacje o użytkowniku Jacapno - tuUslugi.pl</title>
			<?php 
				@session_start();
				include_once '../szablon/nav_head.php'; 

				//załaduj funkcje
				$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
				require_once ($DOCUMENT_ROOT.'/../ini/skryptyPHP/user_skrypt.php');
			
			?>
	
			<meta name="description" content="Sprawdź czego możesz dowiedzieć się o użytkowniku tuUslugi.pl. Sprawdź dodane ogłoszenia, otrzymane oceny i komentarze, a także opis użytkownika."/>
			<link href="user.css" type="text/css" rel="stylesheet"/>
	</head>
	
			<?php include_once '../szablon/nav_body.php'; ?>
        <article class="user_profile">
			<div class="user">
                            <div class="user_img">
                                <img src="<?php if(file_exists("avatar/".$user_id.".jpg")){
                                        echo "avatar/".$user_id.".jpg";
                                    }
                                    else if(file_exists("../public_profile/avatar/".$user_id.".png")){
                                        echo "avatar/".$user_id.".png";
                                    }
                                    else echo "../public_profile/avatar/avatar.png";
                                ?>"/>
                            </div>
                            <div class="user_name">
				<h2><?php echo @$user ?></h2>
                            </div>
                        </div>		
			<div class="page_content">
                            <?php if(isset($_SESSION['user_deleted'])&&$_SESSION['user_deleted']==1){
                                echo '<div class="user_deleted"><h3>Szukany użytkownik nie istnieje lub jego konto zostało usunięte.</h3></div>';
                                echo '<script>$(".user").addClass("deleted");</script>';
                                unset($_SESSION['user_deleted']);
                            }
                            else{
                                include 'wyswietl_menu.php';
                            }
                            ?>
				
			</div>
        </article>
			<script>
				$(".page_content .user_nav .cat1").click(function(e)
				{
					var content='<div class="name"><h4>'+'<?php if(isset($nazwa))echo $nazwa; ?>'+'</h4><p> '+'<?php if(isset($osobowosc))echo '('.$osobowosc.')'; ?>'+'</p></div><div class="user_info"><span class="info">z:</span><span class="value">'+'<?php if(isset($miejscowosc))echo $miejscowosc; ?>'+' '+'<?php if(isset($wojewodztwo))echo '(woj.'.$wojewodztwo.')</span>'; ?>'+'</div><div class="user_info">'+'<?php if(isset($wiek))echo $wiek; ?>'+'</div><div class="user_info"><span class="info">w serwisie od:</span><span class="value">'+'<?php echo $dolaczyl ?>'+'</span></div><div class="user_info"><span class="info">adres e-mail:</span><span class="value">'+'<?php if(isset($email))echo $email; ?>'+'</span></div><div class="user_info"><span class="info">ostatnio widziany:</span><span class="value">'+'<?php echo $ostatnio ?>'+'</span></div>';
					$(".active-c").removeClass("active-c").addClass("noactive-c");
					$(".cat1").removeClass("noactive-c").addClass("active-c");
					$(".active-l").removeClass("active-l").addClass("noactive-l");
					$(".line1").removeClass("noactive-l").addClass("active-l");
					document.getElementById("category_info").innerHTML=content;
				});
				
				$(".page_content .user_nav .cat2").click(function(e)
				{
					var content='<?php if($ogloszenia){for($i=0;$i<$ile_ogloszen;$i++){if($ogloszenia[$i]){require('wyswietl_ogloszenie.php');}}}else echo "Ten użytkownik nie posiada żadnych ogłoszeń";?>';
					$(".active-c").removeClass("active-c").addClass("noactive-c");
					$(".cat2").removeClass("noactive-c").addClass("active-c");
					$(".active-l").removeClass("active-l").addClass("noactive-l");
					$(".line2").removeClass("noactive-l").addClass("active-l");
					document.getElementById("category_info").innerHTML=content;
				});
				
				$(".page_content .user_nav .cat3").click(function(e)
				{
					var content='<p>Ta funkcja została tymczasowo wyłączona.</p>';
					$(".active-c").removeClass("active-c").addClass("noactive-c");
					$(".cat3").removeClass("noactive-c").addClass("active-c");
					$(".active-l").removeClass("active-l").addClass("noactive-l");
					$(".line3").removeClass("noactive-l").addClass("active-l");
					document.getElementById("category_info").innerHTML=content;
				});
				
				$(".page_content .user_nav .cat4").click(function(e)
				{
					var content='<?php echo $opis ?>';
					$(".active-c").removeClass("active-c").addClass("noactive-c");
					$(".cat4").removeClass("noactive-c").addClass("active-c");
					$(".active-l").removeClass("active-l").addClass("noactive-l");
					$(".line4").removeClass("noactive-l").addClass("active-l");
					document.getElementById("category_info").innerHTML=content;
				});
                            function user_deleted(){
                                $(".page_content").html("");
                            }
			</script>
		
			<?php include '../szablon/stopka.php'; ?>



