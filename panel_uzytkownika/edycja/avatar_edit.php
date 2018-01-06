<?php
    if(($_SESSION['zalogowany']!=true)&&(!isset($_SESSION['id']))){
      header('Location:../index.php');
      exit;  
    }
?>
<div class="avatar_edit">
    <div class="obecny">
        <h3>Zmień avatar</h3>
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
            <p>Jeżeli chcesz go zmienić wybierz nowy plik:</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="153600">
            <input class="avatar_file" type="file" name="avatar"/>
            <p class="nawias">(Maksymalny rozmiar pliku to 100KB, maksymalna rozdzielczość 150x150 px, akceptowane formaty .jpg .png)</p>
            <div class="button-div">
                <input class="button-green" type="submit" value="Prześlij"/>
            </div>
        </form>
    </div>
</div>








