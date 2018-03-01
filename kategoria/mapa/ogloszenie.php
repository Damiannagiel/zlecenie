<a class="ad" href="<?php echo $link[$i]?>">
	<article class="ad-mini">
		<div class="img">			
			<?php
                        if(isset($overriding)){
                            //zmienna z archiwum/index.php nakazująca dodać do zdjęcia folder nadrzędny
                            if($pobierz[$i]['photos']==0) echo '<img src="../../ogloszenie/img/brak_zdjecia.jpg"/>';
                            else echo '<img src="../../ogloszenie/img/'.$pobierz[$i]["id"].'/1.jpg"/>';
                        }
                        else{
                            if($pobierz[$i]['photos']==0) echo '<img src="../ogloszenie/img/brak_zdjecia.jpg"/>';
                            else echo '<img src="../ogloszenie/img/'.$pobierz[$i]["id"].'/1.jpg"/>';
                        }
			?>
		</div>		
			<div class="info">
				<div class="ogl_mini_txt">
				
						<header>
							<h5><?php echo $pobierz[$i]['title'] ?></h5>
						</header>
						
					<div class="ogl_mini_opis">
						<p><?php echo $pobierz[$i]['description'] ?></p>
					</div>
						
				</div>
					
				<div class="ogl_mini_info">
					<div class="p3"><p>Oferta ważna do: <?php echo $pobierz[$i]['end'] ?></p></div>
					<div class="p2"><p><?php echo $cena[$i] ?></p></div>
					<div class="p11"><p class="zasieg"><?php echo $zasieg[$i] ?></p></div>
					<div class="p4"><p>wyświetleń: <?php echo $pobierz[$i]['display'] ?> kontktów: <?php echo $pobierz[$i]['relations'] ?></p></div>
				</div>
			</div>
		<div style="clear:both">
			
	</article>
</a>