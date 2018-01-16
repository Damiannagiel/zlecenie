<a class="ad" href="<?php echo $link[$i]?>">
	<article class="ad-mini">
		<div class="img">			
			<?php
                        if(isset($overriding)){
                            //zmienna z archiwum/index.php nakazująca dodać do zdjęcia folder nadrzędny
                            if($pobierz[$i]['ile_zdjec']==0) echo '<img src="../../ogloszenie/img/brak_zdjecia.jpg"/>';
                            else echo '<img src="../../ogloszenie/img/'.$pobierz[$i]["id"].'/1.jpg"/>';
                        }
                        else{
                            if($pobierz[$i]['ile_zdjec']==0) echo '<img src="../ogloszenie/img/brak_zdjecia.jpg"/>';
                            else echo '<img src="../ogloszenie/img/'.$pobierz[$i]["id"].'/1.jpg"/>';
                        }
			?>
		</div>		
			<div class="info">
				<div class="ogl_mini_txt">
				
						<header>
							<h5><?php echo $pobierz[$i]['tytul'] ?></h5>
						</header>
						
					<div class="ogl_mini_opis">
						<p><?php echo $pobierz[$i]['opis'] ?></p>
					</div>
						
				</div>
					
				<div class="ogl_mini_info">
					<div class="p3"><p>Oferta ważna do: <?php echo $pobierz[$i]['koniec'] ?></p></div>
					<div class="p2"><p><?php echo $cena[$i] ?></p></div>
					<div class="p11"><p class="zasieg"><?php echo $zasieg[$i] ?></p></div>
					<div class="p4"><p>wyświetleń: <?php echo $pobierz[$i]['wyswietlen'] ?> kontktów: <?php echo $pobierz[$i]['kontaktow'] ?></p></div>
				</div>
			</div>
		<div style="clear:both">
			
	</article>
</a>