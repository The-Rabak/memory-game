<?php

$cacheFile = file_get_contents('../api/cache.json');
$cacheFile3 = json_decode($cacheFile);

shuffle($cacheFile3);
$fixedFiles = str_replace('w=1080','w=320',$cacheFile3);

$grid = 4;
for($i = $grid; $i> 0; $i--){
    echo '<div class="row">';
    for ($b = $grid; $b>0; $b--){
        $tempImage = array_shift($fixedFiles);
        echo '<div class="card">'.
             "<img src='$tempImage' class='no-opacity' alt='random duck'>".
            '</div>';

    }
    echo '</div>';

}

?>
