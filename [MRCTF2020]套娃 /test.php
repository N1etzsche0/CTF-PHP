<?php
$re = 'flag.php';
$string='';
for($i=0;$i<strlen($re);$i++){
    $string .= chr(ord($re[$i]) - $i*2);

}
$string = base64_encode($string);
var_dump($string);