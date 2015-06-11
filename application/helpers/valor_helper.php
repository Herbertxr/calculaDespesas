<?php

function valor($valorBD){
   echo 'R$ ' . number_format($valorBD, 2, ",", ".");
}

?>