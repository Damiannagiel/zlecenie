<?php
    if(($_SESSION['zalogowany']!=true)&&(!isset($_SESSION['id']))){
      header('Location:../index.php');
      exit;  
    }
?>
<div class="settings">
    <h5><i id="icon_avatar_edit" class="icon-plus-squared-alt"></i>Zmień avatar</h5>
    <div class="edit" id="avatar_edit">
        avatar
    </div>
    
    <h5><i id="icon_pass_edit" class="icon-plus-squared-alt"></i>Zmień hasło</h5>
    <div class="edit" id="pass_edit">
        pass
    </div>
    
    <h5><i id="icon_mail_edit" class="icon-plus-squared-alt"></i>Zmień e-mail</h5>
    <div class="edit" id="mail_edit">
        mail
    </div>
    
    <h5><i id="icon_delete_account" class="icon-plus-squared-alt"></i>Usuń konto</h5>
    <div class="edit" id="delete_account">
        delete
    </div>
</div>

<!--<label for="login" >Login:</label><input type="text" name="login" value="<?php echo $_SESSION['user'];?>">
<label for="email" >Email:</label><input type="text" name="email" value="<?php echo $_SESSION['email'];?>">
<div class="pass">
    <label for="pass" >Aktualne hasło:</label><input type="text" name="pass">
    <label for="new_pass_1" >Nowe hasło:</label><input type="text" name="new_pass_1">
    <label for="new_pass_2" >Powtórz nowe hasło:</label><input type="text" name="new_pass_2">
</div>-->







