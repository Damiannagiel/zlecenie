<html lang="pl">
	<head>
	<?php
	 if(isset($_SESSION['zapisano'])) 
	{
		header ('Location:profil/profil.php');
	}
	?>
	</head>
	<body>
		<div class="edit_container">
			<div class="edit_blad">
				<?php
				if(isset($_SESSION['zapisano'])) 
				{
					header ('Location:profil/profil.php');
				}
				else if(isset($_SESSION['blad_ed']))
				 {
					 unset ($_SESSION['zapisano']);
					 echo $_SESSION['blad_ed'];
				 }
				 else
				 {
					 echo "Przepraszamy, wystąpił nieoczekiwany błąd. Prosimy spróbować ponownie za chwilę.";
				 }
				?>
		
				<div class="button-div"><input class="next button-green" data-content="krok3" value="<<  Wróć"/></div>
				
				<p class="znaki_dop">*<a class="link" href="../regulamin/dopuszczalne_znaki.php" target="_blank">Tutaj</a> możesz sprawdzić dopuszczalne znaki w poszczególnych miejscach serwisu.</p>
			
			
			</div>
		</div>
			
		
	</body>
	<script type="text/javascript">
	
	var info = 
	{
		content: "zapisane",
	}
		$(".pu_content .edit_container .next").click(function(e)
		{
			var content = $(this).data("content");
			
			if(info.content != content)
			{	
				loadContent(content);
			}
		});
		
	function loadContent(content)
	{
		$.ajax
				({
					url: 'loader.php',
					type: 'post',
					data: {Content : content},
						success: function(response)
						{
							$(".pu_content").html(response);
							info.content = content;
						}
				});
	}
</script>
</html>








