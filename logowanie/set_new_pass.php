<!DOCTYPE HTML>
<html lang="pl">
<head>
<?php
    if(!isset($_GET["id"]) || !isset($_GET["resetPass"])){
        header("Location:reset_pass.php");
        exit;
    }
    $DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
    include ($DOCUMENT_ROOT.'/../ini/class/classFeedback.php');
    include ($DOCUMENT_ROOT.'/../ini/class/classMyError.php');
    session_start();
    include_once '../szablon/nav_head.php';
 ?>
	
	<title>Resetowanie hasła w tuUslugi.pl</title>
	
	<meta name="description" content="Opis w Google" />
        <link href="reset_pass.css" type="text/css" rel="stylesheet"/>
</head>

<!--Załaduj górną nawigację -->
<?php include_once '../szablon/nav_body.php'; ?>
<article>
    <div class="reset-pass">
        <header class="reset-pass__header">
            <h2 class="reset-pass__title">Resetowanie hasła</h2>
        </header>
        <form class="reset-pass__form" action="set_new_pass_script.php" method="post" name="SetResetPass">
            <div class="reset-pass__div reset-padding">
                <span class="reset-pass__label" for="user">Podaj nowe hasło:</span>
                <div class="reset-pass__div-input"><input class="reset-pass__input" type="password" placeholder="podaj nowe hasło" name="new_pass"/></div>
            </div>
            <div class="reset-pass__div reset-padding">
                <span class="reset-pass__label" for="user">Powtórz hasło:</span>
                <div class="reset-pass__div-input"><input class="reset-pass__input" type="password" placeholder="powtórz hasło" name="new_pass_repeat"/></div>
            </div>
            <input type="hidden" name="id" value="<?php echo $_GET["id"];?>"/>
            <input type="hidden" name="resetPass" value="<?php echo $_GET["resetPass"];?>"/>
            <div class="feedback"><?php
                // jeżeli obiekt przechowujący błedy istnieje w sesji
                // wyświetl błędy
                if(isset($_SESSION['feedback'])){
                    FeedbackPresent::viewFeedback($_SESSION['feedback']);
                    unset($_SESSION['feedback']);
                }
            ?></div>
            <input type="submit" class="btn btn--green reset-padding" value="Ustaw nowe hasło"/>
        </form>
    </div>
</article>
<!--Załaduj stopkę -->
<?php include_once '../szablon/stopka.php'; ?>