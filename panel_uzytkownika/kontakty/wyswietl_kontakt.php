<a href="<?php echo $link[$i]; ?>">
    <div class="kontakt_div">
        <i class="icon-cancel" data-content="<?php echo $id[$i];?>"></i>
            <span class="tytul"><p><?php 
                echo $tytul[$i]['title']; 
                if($archives[$i]==true)echo'<span class="archives"> (zarchiwizowano)</span>';
            ?></p></span>
            <span class="data"><?php echo $data[$i]; ?></span>
    </div>
</a>
