<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Pomoc - Internetowa Giełda Usług</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="kontakt.css">
    <?php include_once '../szablon/nav_head.php'; ?>
</head>

<!--<body>--><?php include_once '../szablon/nav_body.php'; ?>
<div class="content"><article>
    <form action="contact_script.php?contact=support" method="post" name="support">
        <div class="component--header">
            <header><h2>Dział pomocy i wsparcia technicznego</h2></header>
            <section>
                <p class="header__p">Oczekiwanie na odpowiedź zwykle trwa od kilku godzin nawet do kilku dni, więc zanim wyślesz wiadomość zapoznaj się z częstonapotykanymi problemami w dziale <a href="faq.php">FAQ</a>.</p> 
                <p class="header__p">Jeżeli już przeglądałeś FAQ i nie znalazłeś odpowiedzi, skontaktuj się z działem pomocy za pośrednictwem formularza kontaktowego bądź napisz bezpośrednio na adres <b>pomoc@domena.pl</b></p>
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