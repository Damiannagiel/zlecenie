<!DOCTYPE HTML>
<html lang="pl">
	<head>
	<?php 
		session_start(); 
		if(!isset($_SESSION['zalogowany'])){
			header ("Location: ../../index.php");
			exit;
		}
		include_once '../../szablon/nav_head2.php';
				
		$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
                
                //utwórz zmienne z linków z innych części serwisu
                if((isset($_GET['ogl_id']))&&(isset($_GET['user_id']))&&(isset($_GET['tytul']))&&(isset($_GET['user_name']))){
                    require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_walidacja.php');
                    //wykonaj walizację zmiennych i zapisz je do prostszej postaci
                    $href=true;
                    if((is_numeric($_GET['ogl_id']))&&($_GET['ogl_id']>0)){
                        $ogl_id=$_GET['ogl_id'];
                    }
                    else $href=false;
                    if((is_numeric($_GET['user_id']))&&($_GET['user_id']>0)){
                        $user_id=$_GET['user_id'];
                    }
                    else $href=false;
                    if(sprawdz_znaki_podstawowe($_GET['tytul'])){
                        $tytul=$_GET['tytul'];
                    }
                    else $href=false;
                    if(sprawdz_znaki_podstawowe($_GET['user_name'])){
                        $user_name=$_GET['user_name'];
                    }
                    else $href=false;
                    
                   if($href==true){
                        $href=array($ogl_id,$user_id,$tytul,$user_name);
                    }
                }
                else $href=false;
		
	try{
		require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');
		require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/connect.php');
		require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_wiadomosci.php');
				
		if(isset($polaczenie)){
                        //pobierz id wszystkich użytkowników z którymi korespondował user
			$ile_wiadomosci=adresaci($polaczenie,$_SESSION['id']);
                        //wyświetl listę użytkowników wraz onclickami do wyświetlnia wiadomości
			$uzytkownicy=wyswiet_uzytkownikow($polaczenie,$ile_wiadomosci,$_SESSION['id'],$href);

			$polaczenie->close();
		}
		else exit;
	}
	catch(Exception $e){
		echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';
	}
			?>
			<title>Wiadomości - igu.com.pl</title>
	
			<meta name="description" content="Opis w Google" />
			<link href="wiadomosci.css" type="text/css" rel="stylesheet"/>
			<script>
				function wczytaj(ogloszenie,adresat,user,ogl_tytul,adresat_name)
				{
					$.ajax
						({
							url: 'wyswietl_wiadomosci.php',
							type: 'post',
							data: {ogloszenie:ogloszenie , adresat:adresat , user:user , ogl_tytul:ogl_tytul , adresat_name:adresat_name},
								success: function(response)
								{
									$("#message").html(response);
                                                                        var active=document.querySelector('.user.activ');
                                                                        if(active!=null){
                                                                            active.classList.remove('activ');
                                                                        }
                                                                        document.getElementById(ogloszenie+'/'+adresat).classList.add('activ');
								}
						});
				}
			</script>
	</head>
	
	<?php include_once '../../szablon/nav_body2.php';
				include_once '../../szablon/nav_category2.php';?>
        <header id="message_header">
                <div id="ms">
                    <h4>Wiadomości</h4>
                </div>
                <div class="message_info">
                    
                </div>
        </header>
	<article id="content">
		<div id="userbox">
		<?php
			echo $uzytkownicy;
		?>
		</div>
		
		<div id="inbox">
			<div id="message">
			</div>
			<div id="send">
				<form id="send_message" method="post">
					
				</form>
			</div>
		</div>
	</article>
	<script src="../../szablon/nav.js" type="text/javascript"></script>
	<script src="wiadomosci.js" type="text/javascript"></script>
	<script>	
		$(document).ready(function() {
			var NavY = $('.site-header').offset().top;

			var stickyNav = function(){
			var ScrollY = $(window).scrollTop();
				  
			if (ScrollY > 300) { 
				$('.site-header').addClass('sticky');
				document.getElementById("spacer1").classList.add("active");
			} else {
				$('.site-header').removeClass('sticky');
				document.getElementById("spacer1").classList.remove("active");
			}
			};
			 
			stickyNav();
			 
			$(window).scroll(function() {
				stickyNav();
			});
			});
	</script>
		
	</body>
	
</html>