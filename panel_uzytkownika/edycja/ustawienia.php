<?php
    if(($_SESSION['zalogowany']!=true)&&(!isset($_SESSION['id']))){
      header('Location:../index.php');
      exit;  
    }
?>
<div class="settings">
    <h3>Ustawienia konta</h3>
    <p>Tutaj możesz zmienić ustawienia swojego konta</p>
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
    
    <h5 data-content="pass_edit"><i id="icon_pass_edit" class="icon-plus-squared-alt"></i>Zmień hasło</h5>
    <div class="edit" id="pass_edit">
        pass
    </div>
    
    <h5 data-content="mail_edit"><i id="icon_mail_edit" class="icon-plus-squared-alt"></i>Zmień e-mail</h5>
    <div class="edit" id="mail_edit">
        mail
    </div>
    
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







