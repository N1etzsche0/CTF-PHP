<?php
    $num = "2019.4";
    echo intval($num);
    echo '<br>';
    echo intval($num + 1);
    echo '<br>';
if(intval($num) < 2020 && intval($num + 1) > 2021){
    echo "鎴戜笉缁忔剰闂寸湅浜嗙湅鎴戠殑鍔冲姏澹�, 涓嶆槸鎯崇湅鏃堕棿, 鍙槸鎯充笉缁忔剰闂�, 璁╀綘鐭ラ亾鎴戣繃寰楁瘮浣犲ソ.</br>";
}else{
    die("閲戦挶瑙ｅ喅涓嶄簡绌蜂汉鐨勬湰璐ㄩ棶棰�");
}