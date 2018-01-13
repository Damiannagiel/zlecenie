<?php
    if(($_SESSION['zalogowany']!=true)&&(!isset($_SESSION['id']))){
      header('Location:../index.php');
      exit;  
    }
?>
<div class="settings">
    <h3>Ustawienia konta</h3>
    <p>Tutaj możesz zmienić ustawienia swojego konta</p>
    
<!--Zmiana avatara-->
    <h5 data-content="avatar_edit"><i id="icon_avatar_edit" class="icon-plus-squared-alt"></i>Zmień avatar</h5>
    <div class="edit" id="avatar_edit">
        <div class="obecny">
            <p>To jest twój obecny avatar:<img src="<?php 
                                            if(file_exists("../public_profile/avatar/".$_SESSION['id'].".jpg")){
                                                echo "../public_profile/avatar/".$_SESSION['id'].".jpg";
                                            }
                                            else if(file_exists("../public_profile/avatar/".$_SESSION['id'].".png")){
                                                echo "../public_profile/avatar/".$_SESSION['id'].".png";
                                            }
                                            else echo "../public_profile/avatar/avatar.png";
                                            ?>"/></p>
        </div>
        <div class="nowy">
            <form enctype="multipart/form-data" action="edycja/avatar_skrypt.php" method="post">
                <p>Jeżeli chcesz go zmienić prześlij nowy plik, aby usunąć kliknij usuń</p>
                <input type="hidden" name="MAX_FILE_SIZE" value="153600">
                <input class="avatar_file" type="file" name="avatar"/>
                <p class="nawias">(Maksymalny rozmiar pliku to 100KB, akceptowane formaty .jpg .png)</p>
                <div class="blad_user">
                    <?php
                        if(isset($_SESSION['avatar_size'])||isset($_SESSION['avatar_wysylanie'])||isset($_SESSION['avatar_mime'])){
                            echo '<script>rozwin("avatar_edit");</script>';
                        }
                        if(isset($_SESSION['avatar_size'])){
                            echo $_SESSION['avatar_size'];
                            unset($_SESSION['avatar_size']);
                        }
                        if(isset($_SESSION['avatar_wysylanie'])){
                            echo $_SESSION['avatar_wysylanie'];
                            unset($_SESSION['avatar_wysylanie']);
                        }
                        if(isset($_SESSION['avatar_mime'])){
                            echo $_SESSION['avatar_mime'];
                            unset($_SESSION['avatar_mime']);
                        }
                    ?>
                </div>
                <div class="avatar_edit button-div">
                    <input class="button-green" type="submit" value="Prześlij"/>
                    <a href="edycja/avatar_skrypt.php?delete=<?php echo $_SESSION['id'];?>"><div class="div button-red">Usuń</div></a>
                </div>
            </form>
        </div>
    </div>
<!--Koniec zmiany avatara-->

<!--Zmiana hasła-->
    <?php if(isset($_SESSION['space_error'])||isset($_SESSION['current_characters_error'])||isset($_SESSION['current_length_error'])||isset($_SESSION['current_password_error'])||isset($_SESSION['new_characters_error'])||isset($_SESSION['new_length_error'])||isset($_SESSION['identical_error']))echo'<script>rozwin("pass_edit");</script>'; ?>
    <h5 data-content="pass_edit"><i id="icon_pass_edit" class="icon-plus-squared-alt"></i>Zmień hasło</h5>
    <div class="edit" id="pass_edit">
        <form action="edycja/pass_edit_skrypt.php" method="post">
            <div class="edit_input"><label class="edit_tytul" for="current_password">Aktualne hasło:</label><input type="password" name="current_password"/></div>
            <div class="blad_user"><?php
                if(isset($_SESSION['current_characters_error'])){
                    echo $_SESSION['current_characters_error'];
                    unset($_SESSION['current_characters_error']);
                }
                if(isset($_SESSION['current_length_error'])){
                    echo $_SESSION['current_length_error'];
                    unset($_SESSION['current_length_error']);
                }
                if(isset($_SESSION['current_password_error'])){
                    echo $_SESSION['current_password_error'];
                    unset($_SESSION['current_password_error']);
                }
          ?></div>
            <div class="edit_input"><label class="edit_tytul" for="new_password">Nowe hasło:</label><input type="password" name="new_password"/></div>
            <div class="blad_user"><?php
                if(isset($_SESSION['new_characters_error'])){
                    echo $_SESSION['new_characters_error'];
                    unset($_SESSION['new_characters_error']);
                }
                if(isset($_SESSION['new_length_error'])){
                    echo $_SESSION['new_length_error'];
                    unset($_SESSION['new_length_error']);
                }
          ?></div>
            <div class="edit_input"><label class="edit_tytul" for="new_password_2">Potwierdź nowe hasło:</label><input type="password" name="new_password_2"/></div>
            <div class="blad_user"><?php
                if(isset($_SESSION['space_error'])){
                    echo $_SESSION['space_error'];
                    unset($_SESSION['space_error']);
                }
                if(isset($_SESSION['identical_error'])){
                    echo $_SESSION['identical_error'];
                    unset($_SESSION['identical_error']);
                }
          ?></div>
            <div class="edit_input button-div"><label class="edit_tytul" for="new_password2"></label><input type="submit" value="Zapisz" class="button-green"/></div>
        </form>
    </div>
<!--Koniec zmiany hasła   -->

<!--Zmiana e-mail-->
    <?php if(isset($_SESSION['mail_space_error'])||isset($_SESSION['password_characters_error'])||isset($_SESSION['password_length_error'])||isset($_SESSION['password_error'])||isset($_SESSION['new_email_error'])||isset($_SESSION['email_repeats_error'])) echo'<script>rozwin("mail_edit");</script>'; ?>
    <h5 data-content="mail_edit"><i id="icon_mail_edit" class="icon-plus-squared-alt"></i>Zmień e-mail</h5>
    <div class="edit" id="mail_edit">
        <form action="edycja/mail_edit_skrypt.php" method="post">
            <div class="edit_input"><label class="edit_tytul" for="password">Twoje hasło:</label><input type="password" name="password"/></div>
            <div class="blad_user"><?php
                if(isset($_SESSION['password_characters_error'])){
                    echo $_SESSION['password_characters_error'];
                    unset($_SESSION['password_characters_error']);
                }
                if(isset($_SESSION['password_length_error'])){
                    echo $_SESSION['password_length_error'];
                    unset($_SESSION['password_length_error']);
                }
                if(isset($_SESSION['password_error'])){
                    echo $_SESSION['password_error'];
                    unset($_SESSION['password_error']);
                }
          ?></div>
            <div class="edit_input"><label class="edit_tytul" for="new_email">Nowy adres e-mail:</label><input type="email" name="new_email"/></div>
            <div class="blad_user"><?php
                if(isset($_SESSION['mail_space_error'])){
                    echo $_SESSION['mail_space_error'];
                    unset($_SESSION['mail_space_error']);
                }
                if(isset($_SESSION['new_email_error'])){
                    echo $_SESSION['new_email_error'];
                    unset($_SESSION['new_email_error']);
                }
                if(isset($_SESSION['email_repeats_error'])){
                    echo $_SESSION['email_repeats_error'];
                    unset($_SESSION['email_repeats_error']);
                }
          ?></div>
            <div class="edit_input button-div"><label class="edit_tytul" for="new_password2"></label><input type="submit" value="Zapisz" class="button-green"/></div>
        </form>
    </div>
<!--Koniec zmiany e-mail-->
    
    <h5 data-content="delete_account"><i id="icon_delete_account" class="icon-plus-squared-alt"></i>Usuń konto</h5>
    <div class="edit" id="delete_account">
        delete
    </div>
</div>

<script>
    //wykonaj po kliknięciu w jedną z opcji ustawień w ustawieniach użytkownika
    $(".settings h5").click(function(e){
        var content=$(this).data("content");
        var id="#"+content;
        var active=$(".settings .active");
        var icon_id="#icon_"+content;
        var activ_icon=$(".icon-minus-squared-alt");
        active.slideToggle().removeClass("active");
        activ_icon.removeClass("icon-minus-squared-alt").addClass("icon-plus-squared-alt");
        if(active.attr('id')!=content){
            $(id).slideToggle().addClass("active");
            $(icon_id).removeClass("icon-plus-squared-alt").addClass("icon-minus-squared-alt");
        }
    });
</script>
<!--<label for="login" >Login:</label><input type="text" name="login" value="<?php echo $_SESSION['user'];?>">
<label for="email" >Email:</label><input type="text" name="email" value="<?php echo $_SESSION['email'];?>">
<div class="pass">
    <label for="pass" >Aktualne hasło:</label><input type="text" name="pass">
    <label for="new_pass_1" >Nowe hasło:</label><input type="text" name="new_pass_1">
    <label for="new_pass_2" >Powtórz nowe hasło:</label><input type="text" name="new_pass_2">
</div>-->







