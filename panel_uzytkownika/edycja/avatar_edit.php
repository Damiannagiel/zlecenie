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
            <p>Jeżeli chcesz go zmienić prześlij nowy plik, aby usunąć kliknij usuń</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="153600">
            <input class="avatar_file" type="file" name="avatar"/>
            <p class="nawias">(Maksymalny rozmiar pliku to 100KB, akceptowane formaty .jpg .png)</p>
            <div class="blad_user">
                <?php
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








