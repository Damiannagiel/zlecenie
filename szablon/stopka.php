
	<footer>
            <?php
            if(!isset($_COOKIE['cookie_ok'])){
                echo '<div class="cookies">
                        <span class="wide">Korzystając ze strony internetowagieldauslug.pl wyrażasz zgodę na użytkowanie mechanizmu plików cookie. Więcej o plikach cookie w internetowagieldauslug.pl możesz dowiedzieć się <a href="regulamin/cookies.php">tutaj</a>.</span>
                        <span class="narrow">Ta strona korzysta z <a href="regulamin/cookies.php">cookies</a>.</span><button>Zgadzam się</button>
                    </div>';
            }
            ?>
		<div class="popular_content">
		</div>
		<div class="text_link">
			<ul>
				<li><a href="../regulamin/">Regulamin</a></li>
                                <li><a href="../regulamin/cookies.php">Polityka cookies</a></li>
				<li><a href="#">Partnerzy</a></li>
				<li><a href="../ogloszenie/archiwum/">Archiwum ogłoszeń</a></li>
				<li><a href="../kontakt/pomoc.php">Pomoc</a></li>
				<li><a href="../kontakt/index.php">Kontakt</a></li>
				<li><a href="../kategoria/mapa/mapa_kategorii.php" class="last">Mapa Kategorii</a></li>
			</ul>
		</div>
		<div class="social_copy">
			<div class="copy">
				<p>&copy 2017 tuUslugi.pl</p>
				<p class="prawa">wszystkie prawa zastrzeżone</p>
			</div>
			<div class="social">
				<div class="social_container">
					<p>sprawdź nasze social media:</p>
					<div class="social_icon">
						<a class="facebook" href="#"><i class="icon-facebook"></i></a>
						<a class="googleplus" href="#"><i class="icon-googleplus"></i></a>
						<a class="instagram" href="#"><i class="icon-instagram"></i></a>
						<a class="youtube" href="#"><i class="icon-youtube-play"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script src="../szablon/nav.js" type="text/javascript"></script>
        <script src="../regulamin/cookies.js"></script>
	<script>
                $(".cookies button").click(function(){
                    cookies_ok("../");
                });
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