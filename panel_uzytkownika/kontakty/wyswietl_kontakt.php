<a href="<?php echo $link[$i]; ?>">
<div class="kontakt_div">
	<span class="tytul"><p><?php 
            echo $tytul[$i]['tytul']; 
            if($archives[$i]==true)echo'<span class="archives"> (zarchiwizowano)</span>';
        ?></p></span>
	<span class="data"><?php echo $data[$i]; ?></span>
</div>
</a>
