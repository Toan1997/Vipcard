<?php
$canh = 4;
for ($i = 1; $i <= $canh;$i++){
    for ($j = 1; $j <= $canh;$j++){
        if($i == 1 || $i == $canh || $j == 1 || $j ==$canh ){
            echo "*";
        }else{
            echo "0";
        }
    }
    echo "</br>";
}