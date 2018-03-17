<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Reklama - Internetowa Giełda Usług</title>
    <meta name="description" content="Skontaktuj się z administracją serwisu w sprawie reklamy na sstronach naszej witrny, bądź innej współpracy komercyjnej." />
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="kontakt.css">
    <?php include_once '../szablon/nav_head.php'; ?>
</head>

<!--<body>--><?php include_once '../szablon/nav_body.php'; ?>
<div class="content"><article>
    <form action="contact_script.php?contact=advertisement" method="post" name="advertisement">
        <div class="component--header">
            <header><h2>Reklama i współpraca komercyjna</h2></header>
            <section>
                <p class="header__p">Skorzystaj z formularza kontaktowego bądź napisz do nas bezpośrednio na <b>reklama@domena.pl</b> w sprawie reklamy na stronach naszej witrny, bądź innej współpracy komercyjnej.</p>
            </section>
        </div>
        <div class="component">
            <label class="label-component" for="title">Tytuł wiadomości:</label>
            <input class="input-component" type="text" name="title" placeholder="Tytuł wiadomości"/>
        </div>
        <div class="component">
            <label class="label-component" for="content">Treść wiadomości:</label>
            <textarea class="input-component input-component--textarea" name="content" placeholder="Treść wiadomości"></textarea>
        </div>
        <div class="component">
            <label class="label-component" for="email">Twój adres e-mail:</label>
            <input class="input-component"type="email" name="email" placeholder="Twój adres e-mail"/>
        </div>
        <div class="component">
            <button class="button-green">Wyślij</button>
        </div>
    </form>
</article></div>
<!--</body>--><?php include_once '../szablon/stopka.php'; ?>
</html>