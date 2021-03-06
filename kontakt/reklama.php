<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Reklama - Internetowa Giełda Usług</title>
    <meta name="description" content="Skontaktuj się z administracją serwisu w sprawie reklamy na sstronach naszej witrny, bądź innej współpracy komercyjnej." />
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="kontakt.css">
    <?php 
        $DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
        include ($DOCUMENT_ROOT.'/../ini/class/classFeedback.php');
        include ($DOCUMENT_ROOT.'/../ini/class/classMyError.php');
        include_once '../szablon/nav_head.php'; 
    ?> 
</head>

<!--<body>--><?php include_once '../szablon/nav_body.php'; ?>
<div class="content"><article>
    <form action="contact_script.php?contact=reklama" method="post">
        <div class="component--header">
            <header><h2>Reklama i współpraca komercyjna</h2></header>
            <section>
                <p class="header__p">Skorzystaj z formularza kontaktowego bądź napisz do nas bezpośrednio na <b>reklama@domena.pl</b> w sprawie reklamy na stronach naszej witrny, bądź innej współpracy komercyjnej.</p>
            </section>
        </div>
        <div class="component">
            <label class="label-component" for="topic"><span class="red-star">*</span>Temat wiadomości:</label>
            <input class="input-component" type="text" name="topic" placeholder="Temat wiadomości"/>
        </div>
        <div class="component">
            <label class="label-component" for="content"><span class="red-star">*</span>Treść wiadomości:</label>
            <textarea class="input-component input-component--textarea" name="content" placeholder="Treść wiadomości"></textarea>
        </div>
        <div class="component">
            <label class="label-component" for="email"><span class="red-star">*</span>Twój adres e-mail:</label>
            <input class="input-component"type="email" name="email" placeholder="Twój adres e-mail"/>
        </div>
        <div class="feedback"><?php
                // jeżeli obiekt przechowujący błedy istnieje w sesji
                // wyświetl błędy walidacji
                if(isset($_SESSION['feedback'])){
                    FeedbackPresent::viewFeedback($_SESSION['feedback']);
                    unset($_SESSION['feedback']);
                }
        ?></div>
        <div class="component">
            <input type="hidden" name="contact" value="reklama">
            <button class="button-green">Wyślij</button>
        </div>
    </form>
</article></div>
<!--</body>--><?php include_once '../szablon/stopka.php'; ?>
</html>