<!DOCTYPE HTML>
<html lang="pl">
	<head>
	<?php session_start(); 
				if(!isset($_SESSION['zalogowany']))
				{
					header ("Location: ../index.php");
					exit;
				}
				include_once '../szablon/nav_head.php';
			?>
			<title>Panel użytkownika <?php echo $_SESSION['user']; ?> - tuUslugi.pl</title>
	
			<meta name="description" content="W tym miejscu możesz zarządzać swoim kontem w tuUslugi.pl. Edytuj informacjie o sobie, dodawaj edytuj usuwaj ogłoszenia i przeglądaj pobrane kontakty."/>
			<link href="panel_uzytkownika.css" type="text/css" rel="stylesheet"/>
	</head>
	
			<?php include_once '../szablon/nav_body.php';
                            include_once '../szablon/nav_category.php'; ?>
			<div class="content">
			<div id="pu_nav">
				<div class="pu_img_user">
                                        <img onclick='loadContent("ustawienia");' src="<?php 
                                        if(file_exists("../public_profile/avatar/".$_SESSION['id'].".jpg")){
                                            echo "../public_profile/avatar/".$_SESSION['id'].".jpg";
                                        }
                                        else if(file_exists("../public_profile/avatar/".$_SESSION['id'].".png")){
                                            echo "../public_profile/avatar/".$_SESSION['id'].".png";
                                        }
                                        else echo "../public_profile/avatar/avatar.png";
                                        ?>"/><span>Ustawienia</span>
				</div>
				
				<div class="text_user">
					<p class="pu_user"><?php echo$_SESSION['user'] ?></p>
					<p class="pu_kp">użytkownik basic</p>
				</div>
				
				<div id="message">
					<a href="wiadomosci/"><i class="icon-mail"></i></a>
				</div>
				
				<nav>
					<div class="pu_nav_container">
						<ol class="pu_nav_ol">
							<li class="nav active" data-content="profil">Informacje</li>
							<li class="nav" data-content="kontakty">Moje kontakty</li>
							<li class="nav" data-content="ogloszenia">Moje ogłoszenia</li>
<!--							<li class="nav" data-content="premium">Premium member</li>-->
							<li class="nav" data-content="edycja">Edycja profilu</li>
							<li><a href="../logowanie/logout.php">Wyloguj się</a></li>
						</ol>
					</div>
				</nav>
			</div>
			
				<div class="pu_content">
                                    <!--tutaj wyświetla się zawartość ładowana przez ajax-->
				</div>
			
			<div style="clear:both"></div>
                        </div>
			
			<script type="text/javascript">
        var first_page="<?php if(isset($_SESSION['settings_error'])){echo "ustawienia";unset($_SESSION['settings_error']);}else echo "profil";?>";
	var info = 
	{
		content: first_page,
	}
        var user=<?php echo $_SESSION['id'];?>;
        sprawdz_wiadomosci(user);
	
	loadContent(first_page); //ładuję zakładkę profil po wczytaniu strony
	
	//
	$(".pu_nav_container .pu_nav_ol .nav").click(function(e)
	{
            sprawdz_wiadomosci(user);
            var content = $(this).data("content");
            if(info.content != content)
            {
                $(".active").removeClass("active").addClass("inactive");
                $(this).removeClass("inactive").addClass("active");    
                loadContent(content);
            }
	});
		
	function loadContent(content,id)
	{
                if(content=="avatar_edit"){
                    $(".active").removeClass("active");
                }
		$.ajax
				({
					url: 'loader.php',
					type: 'post',
					data: {Content : content , Usun : id},
						success: function(response)
						{
							$(".pu_content").html(response);
							info.content = content;
						}
				});
	}
        
        function sprawdz_wiadomosci(user)
	{
		$.ajax
				({
					url: 'wiadomosci/sprawdz.php',
					type: 'post',
					data: {user:user},
						success: function(response){
                                                   $("#message i").html(response);
                                                }
				});
	}
        
        function wyswietl_opcje(user){
            //sprawdź czy jest aktywny alement
            var active=document.querySelector(".kontakt_opcje.active");
            if(active){
                //zwiń pasek aktywnego elementu
                $("#"+active.id).slideToggle("high");
                //jeśli tak to go usuń
                active.classList.remove("active");
                //sprawdź czy kliknięty element nie był aktywny, jeżeli nie to ustaw active
                if("user_"+user!=active.id){ 
                    document.getElementById("user_"+user).classList.add("active");
                    $("#user_"+user).slideToggle("high");
                }
            }
            //jeśli nie, ustaw kliknięty element jako aktywny
            else {
                document.getElementById("user_"+user).classList.add("active");
                $("#user_"+user).slideToggle("high");
            }
        }
        
        function rozwin(content){
            var id="#"+content;
            var icon_id="#icon_"+content;
            $(id).slideToggle().addClass("active");
            $(icon_id).removeClass("icon-plus-squared-alt").addClass("icon-minus-squared-alt");
        }

	</script>
				
			<?php 
			include '../szablon/stopka.php';
			?>