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
			<title>Panel użytkownika <?php echo $_SESSION['user']; ?></title>
	
			<meta name="description" content="Opis w Google" />
			<link href="panel_uzytkownika.css" type="text/css" rel="stylesheet"/>
	</head>
	
			<?php include_once '../szablon/nav_body.php';
						include_once '../szablon/nav_category.php'; ?>
			
			<div id="pu_nav">
				<div class="pu_img_user">
					<i class="icon-user"></i>
				</div>
				
				<div class="text_user">
					<p class="pu_user"><?php echo$_SESSION['user'] ?></p>
					<p class="pu_kp">użytkownik basic</p>
				</div>
				
				<div id="message">
					<a href="wiadomosci/" style="color:red;"><i class="icon-mail"></i></a>
				</div>
				
				<nav>
					<div class="pu_nav_container">
						<ol class="pu_nav_ol">
							<li class="nav active" data-content="profil">Informacje</li>
							<li class="nav" data-content="kontakty">Moje kontakty</li>
							<li class="nav" data-content="ogloszenia">Moje ogłoszenia</li>
							<li class="nav" data-content="premium">Premium member</li>
							<li class="nav" data-content="edycja">Edycja profilu</li>
							<li><a href="../logowanie/logout.php">Wyloguj się</a></li>
						</ol>
					</div>
				</nav>
			</div>
			
			<article>
				<div class="pu_content">

				</div>
			</article>
			
			<div style="clear:both"></div>
			
			<script type="text/javascript">
	
	var info = 
	{
		content: "profil",
	}
	
	loadContent("profil"); //ładuję zakładkę profil po wczytaniu strony
	
	//
	$(".pu_nav_container .pu_nav_ol .nav").click(function(e)
	{
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

	</script>
				
			<?php 
			include '../szablon/stopka.php';
			?>