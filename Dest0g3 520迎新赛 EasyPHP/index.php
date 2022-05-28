<?php
highlight_file(__FILE__);
include "fl4g.php";
$fl4g="aa";
$dest0g3 = $_POST['ctf'];
$time = date("H");
$timme = date("d");
$timmme = date("i");
if(($time > "24") or ($timme > "31") or ($timmme > "60")){
    echo $fl4g;
}else{
    echo "Try harder!";
}
set_error_handler(
    function() use(&$fl4g) {
        print $fl4g;
    }
);
$fl4g .= $dest0g3;
//echo $fl4g;
?>