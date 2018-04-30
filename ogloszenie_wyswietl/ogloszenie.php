<!DOCTYPE HTML>
<html lang="pl">
	<head>
			<?php 
			include_once '../szablon/nav_head.php';
			
			//załącz funkcje nawiązujące kontakt z bazą
			$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];	
			require_once ($DOCUMENT_ROOT.'/../ini/skryptyPHP/ogloszenie_skrypt.php');
			
			?>
			<title><?php if(isset($no_add)&&$no_add==true) echo "Internetowa giełda usług"; else echo $tytul." - igu.com.pl" ?></title>
	
			<meta name="description" content="<?php echo $opis ?>" />
			<meta name="keywords" content="" />
			<link href="../ogloszenie_wyswietl/ogloszenie.css" type="text/css" rel="stylesheet"/>
	</head>
		<?php include_once '../szablon/nav_body.php'; include_once '../szablon/nav_category.php';?>
                <aside>
                    <picture>
                      <source media="(min-width: 748px)" srcset="../img/728x90.jpg">
                      <img src="../img/320x100.jpeg" alt="aside">
                    </picture>
		</aside>
                <?php 
                    if(isset($no_add)&&$no_add==true){
                        echo '<div class="max-height"><p class="no_announcement">Nie ma takiego ogłoszenia!</p></div>';
                        include_once '../szablon/stopka.php';
                        exit;
                    }
                ?>
		<article class="ogloszenie_all <?php if(isset($archives)&&$archives==true)echo "archives";//dodaj klasę archives jeżeli ogłoszenie jest archiwalne ?>">
			<div class="ogl_tytul">
				<header>
					<h4><?php echo $tytul ?></h4>
				</header>
			</div>
			<div class="popular2">
			</div>
			<div class="top">
				<section class="ogl_zdjecia">
                                    			<div class="popular">
				<span>(Wyśiwetleń: <b><?php echo $wyswietlen ?></b>)</span>
				<span class="spacer"></span>
				<span>(Kontaktów: <b><?php echo $kontaktow ?></b>)</span>
			</div>
					<div id="img_med">
						<img class="img_med" src="<?php if($ile_zdjec==0) echo '../ogloszenie/img/brak_zdjecia.jpg'; else echo '../ogloszenie/img/'.$ogloszenie.'/1.jpg';?>"/>
					</div>
					<div class="zdj_nav">
							<?php wyswietl_zdjecia2($ile_zdjec,$ogloszenie);?>
					</div>
				</section>
				
				<section class="important">
					<div class="box cena">
						<span><?php echo $cena?></span> <span> <?php echo $cena_za?></span>
					</div>
					<div class="box user">
						<p>Ogłoszenie użytkownika:<p/>
						<a target="_blank" href="../public_profile/user.php?id=<?php echo $uzytkownik_id ?>"><p><b><?php echo $user ?></b></p></a>
					</div>
					<div class="box star">
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star"></i>
						<i class="icon-star-half-alt"></i>
						<i class="icon-star-empty"></i>
						<p>(brak ocen)</p>
					</div>
					<div class="box kontakt"><?php
                                            if(isset($archives)&&$archives==true){
                                                echo $archives_text;
                                            }
                                            else if(($kontakt!=false)||((isset($_SESSION['id']))&&($_SESSION['id']==$uzytkownik_id))){
                                                echo $jest_kontakt;  
                                            }
                                            else echo $brak_kontaktu;
					?></div>
				</section>
			</div>
			
			<article class="ogloszenie">
				<h5>Informacje:</h5>
				<section class="ogl_informacje">
					<div class="box"><span class="info">Kategoria:</span><span class="value"><?php echo $kategoria ?></span></div>
					<div class="box lokalizacja"><span class="info">Gdzie:</span><span class="value"><?php echo $gdzie ?></span></div>
					<div class="box"><span class="info">Dodano:</span><span class="value"><?php echo $dodano ?></span></div>
					<div class="box"><span class="info">Koniec:</span><span class="value"><?php echo $koniec ?></span></div>
				</section>
				
				<h5>Treść ogłoszenia:</h5>
				<section class="ogl_tersc">
						<?php echo $tresc ?>
				</section>
			</article>
		</article>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$(".ogl_zdjecia .zdj_nav .img_nav").click(function(e)//funkcja określająca co ma się po kliknięciu w województwo na mapie
				{
					var content = $(this).data("content");
						$(".img_nav_active").removeClass("img_nav_active").addClass("img_nav");
						$(this).removeClass("img_nav").addClass("img_nav_active");
						 zmien_zdj(content);
					
				});
				
                                $(".ogl_zdjecia .zdj_nav .img_nav_active").removeClass("img_nav");
                                
				function zmien_zdj(content)
					{			
						var plik = '<img class="img_med" src="../ogloszenie/img/'+<?php echo $ogloszenie ?> +'/'+content+'.jpg"/>';
						document.getElementById("img_med").innerHTML = plik;
					}
                        });
		</script>
					
				<?php 
				include_once '../szablon/stopka.php';
				?>