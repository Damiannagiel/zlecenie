<!DOCTYPE HTML>
<html lang="pl">
<head>
	<?php 
            $DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
            include ($DOCUMENT_ROOT.'/../ini/class/classFeedback.php');
            include ($DOCUMENT_ROOT.'/../ini/class/classMyError.php');
            session_start();
            include_once '../szablon/nav_head.php';
         ?>
	
	<title>Zresetuj swoje hasło w igu.com.pl</title>
	
	<meta name="description" content="Opis w Google" />
        <link href="reset_pass.css" type="text/css" rel="stylesheet"/>
        <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<!--Załaduj górną nawigację -->
<?php include_once '../szablon/nav_body.php'; ?>
<article>
    <div class="reset-pass">
        <header class="reset-pass__header">
            <h2 class="reset-pass__title">Resetowanie hasła</h2>
        </header>
        <form class="reset-pass__form" action="reset_pass_script.php" method="post">
            <div class="reset-pass__div reset-padding">
                <span class="reset-pass__label" for="user">Podaj adres e-mail bądź login:</span>
                <div class="reset-pass__div-input"><input class="reset-pass__input" placeholder="e-mail lub login" name="identity"/></div>
            </div>
            <div class="reset-pass__div reset-padding">
                <span class="reset-pass__span">Udowodnij że nie jesteś robotem:</span>
                <div class="reset-pass__recaptcha g-recaptcha" data-sitekey="6LdGKCIUAAAAAPkJ9mZG5OBWabq_OVfuyWzYIiWN"></div>
            </div>
            <div class="feedback"><?php
                // jeżeli obiekt przechowujący błedy istnieje w sesji
                // wyświetl błędy walidacji
                if(isset($_SESSION['feedback'])){
                    FeedbackPresent::viewFeedback($_SESSION['feedback']);
                    unset($_SESSION['feedback']);
                }
            ?></div>
            <input type="submit" class="btn btn--green reset-padding" value="Dalej"/>
        </form>
    </div>
</article>
<!--Załaduj stopkę -->
<?php include_once '../szablon/stopka.php'; ?>