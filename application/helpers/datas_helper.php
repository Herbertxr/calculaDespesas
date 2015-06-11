<?php

function dataBR($dataBD){
    $data = explode("-", $dataBD);
    #$data = str_split($dataBD, 2);
    $dia = explode(" ", $data[2]);
    echo $dia[0]."/". $data[1]."/". $data[0];
}

?>