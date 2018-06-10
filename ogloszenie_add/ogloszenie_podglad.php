<!DOCTYPE HTML>
<html lang="pl">
	<head>
			<?php 
			session_start(); 
			include_once '../szablon/nav_head.php';
			
			$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/connect.php');
			include ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_wyswietl.php');
			include ($DOCUMENT_ROOT.'/../ini/skryptyPHP/ogloszenie_podglad.php');
			?>
            
			<title>Podgląd ogłoszenia <?php echo $_SESSION['tmp_tytul']; ?> - tuUslugi.pl</title>
	
			<link href="../ogloszenie_wyswietl/ogloszenie.css" type="text/css" rel="stylesheet"/>
			<link href="../ogloszenie_wyswietl/mini.css" type="text/css" rel="stylesheet"/>
	</head>
	
	<?php include_once '../szablon/nav_body.php'; include_once '../szablon/nav_category.php';?>
        <h2>Tak będzie wyglądać twoje ogłoszenie po dodaniu</h2>
		<h5 class="przyklad">Wyniki wyszukiwania</h5>
		<p class="nawias">(Tak będzie wyglądać twoje ogłoszenie w wynikach wyszukiwania)</p>
		
	<article class="ad-mini">
		<div class="img">			
			<img src="<?php if(isset($_SESSION['img0']))echo 'podglad/'.$_SESSION['img0'].'.jpg'; else echo '../ogloszenie/img/brak_zdjecia-mini.jpg'; ?>"/>
		</div>		
			<div class="info">
				<div class="ogl_mini_txt">
				
						<header>
							<h5><?php echo $_SESSION['tmp_tytul'] ?></h5>
						</header>
						
					<div class="ogl_mini_opis">
						<p><?php echo $_SESSION['tmp_opis'] ?></p>
					</div>
						
				</div>
					
				<div class="ogl_mini_info">
					<div class="p3"><p>Oferta ważna do:  <?php echo $_SESSION['tmp_koniec'] ?></p></div>
					<div class="p2"><p><?php echo $_SESSION['tmp_cena'].' '.$_SESSION['tmp_za']; ?></p></div>
					<div class="p11"><p class="zasieg"><?php echo $_SESSION['tmp_powiaty_wyszuk'] ?></p></div>
					<div class="p4"><p>wyświetleń: - kontktów: - </p></div>
				</div>
			</div>
		<div style="clear:both">
			
	</article>
	
		<h5 class="przyklad">Pełne ogłoszenie</h5>
		<p class="nawias">(Tak będzie wyglądać twoje ogłoszenie po wyświetleniu przez użytkownika)</p>
		
		<article class="ogloszenie_all">
			
			<div class="ogl_tytul">
				<header>
					<h4><?php echo $_SESSION['tmp_tytul']; ?></h4>
				</header>
			</div>
			<div class="top">
				<section class="ogl_zdjecia">
                                        <div class="popular">
				<span>(Wyśiwetleń: <b> - </b>)</span>
				<span class="spacer"></span>
				<span>(Kontaktów: <b> - </b>)</span>
			</div>
					<div id="img_med"><img class="img_med" src="<?php if(isset($_SESSION['img0']))echo 'podglad/'.$_SESSION['img0'].'.jpg'; else echo '../ogloszenie/img/brak_zdjecia.jpg'; ?>"/></div>
					<div class="zdj_nav">
							<?php wyswietl_zdjecia($_SESSION['tmp_ile_zdjec']);?>
					</div>
				</section>
				
				<section class="important">
					<div class="box cena">
						<span><?php echo $_SESSION['tmp_cena'];?></span> <span> <?php echo $_SESSION['tmp_za']; ?></span>
					</div>
					<div class="box user">
						<p>Ogłoszenie użytkownika:<p/>
						<p><b><?php echo $_SESSION['user']; ?></b></p>
					</div>
					<div class="box star">
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star-half-alt"></i>
						<i class="icon-star-empty"></i>
						<p>(brak ocen)</p>
					</div>
					<div class="box kontakt">
						<?php echo $jest_kontakt;?>
					</div>
				</section>
			</div>
			
			<article class="ogloszenie">
				<h5>Informacje:</h5>
				<section class="ogl_informacje">
					<div class="box"><span class="info">Kategoria:</span><span class="value"><?php echo $_SESSION['tmp_kat']; ?></span></div>
					<div class="box lokalizacja"><span class="info">Gdzie:</span><span class="value"><?php echo $_SESSION['tmp_powiaty']; ?></span></div>
					<div class="box"><span class="info">Dodano:</span><span class="value"><?php echo $_SESSION['tmp_dodano']; ?></span></div>
					<div class="box"><span class="info">Koniec:</span><span class="value"><?php echo $_SESSION['tmp_koniec']; ?></span></div>
				</section>
				
				<h5>Treść ogłoszenia</h5>
				<section class="ogl_tersc">
						<?php echo $_SESSION['tmp_tresc']; ?>
				</section>
			</article>
		</article>
		
		<h4>Czy jesteś usatysfakcjonowany?</h4>
		<div class="button-div"><a href="<?php if((isset($_SESSION['edit_add']))&&($_SESSION['edit_add']==true))echo "edytuj_ogloszenie.php?ogloszenie=".$_SESSION['fr_id'];
				else echo "ogloszenie_add.php";?>"><button class="button-green">Wróć do edycji</button></a><a href="<?php if((isset($_SESSION['edit_add']))&&($_SESSION['edit_add']==true))echo "zapisz_edytowane_ogloszenie.php";
				else echo "zapisz_ogloszenie.php";?>"><button class="button-red"><?php if((isset($_SESSION['edit_add']))&&($_SESSION['edit_add']==true))echo "Zapisz zmiany";
				else echo "Dodaj ogłoszenie";?> </button></a></div>
				
			<?php 
			include_once '../szablon/stopka.php';
			?>
	
	<script type="text/javascript">

		//funkcja określająca co ma się po kliknięciu w województwo na mapie
		$(".ogl_zdjecia .zdj_nav .img_nav").click(function(e)
		{
			var content = $(this).data("content");
				$(".img_nav_active").removeClass("img_nav_active");
				$(this).addClass("img_nav_active");
				 zmien_zdj(content);
			
		});
		
		function zmien_zdj(content)
			{			
				var plik = '<img class="img_med" src="podglad/'+content+'.jpg"/>';
				document.getElementById("img_med").innerHTML = plik;
			
			}
			
		$(".ogl_uzytkownik .ogl_kontakt").click(function(e)
		{
			var content = $(this).data("content");
				pokaz_kontakt(content);
			
		});
		
		function pokaz_kontakt(content)
		{
			$.ajax
				({
					url: 'loader_kontakt.php',
					type: 'post',
					data: {Content : content},
						success: function(response)
						{
							$('#kontakt').html(response);
						}
				});
		}
	</script>
	
</html>


