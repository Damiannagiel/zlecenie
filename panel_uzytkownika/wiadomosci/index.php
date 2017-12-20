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
		
	try{
		require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');
		require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/connect.php');
		require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_wiadomosci.php');
				
		if(isset($polaczenie)){
			
			$ile_wiadomosci=adresaci($polaczenie,$_SESSION['id']);
			$uzytkownicy=wyswiet_uzytkownikow($polaczenie,$ile_wiadomosci,$_SESSION['id']);

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
								}
						});
				}
			</script>
	</head>
	
	<?php include_once '../../szablon/nav_body2.php';
				include_once '../../szablon/nav_category2.php';?>
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