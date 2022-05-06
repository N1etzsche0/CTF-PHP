<?php
$yds = "dog";
$AA = array("yds"=>"flag");
var_dump($AA);
echo '<br>';
foreach($AA as $x => $y){
    $$x = $$y;
    var_dump($x);
    echo '<br>';
    var_dump($y);
    echo '<br>';
    var_dump($$x);
    echo '<br>';
    var_dump($$y);
}
