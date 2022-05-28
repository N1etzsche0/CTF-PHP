<?php
$a = array();
for ($test = 0; $test < 256; $test++) {
    if (!preg_match('/[\x00- 0-9A-Za-z\'"\`~_&.,|=[\x7F]+/i', chr($test))) {
        $a[] .= bin2hex(chr($test));
    }
}
var_dump($a);
?>