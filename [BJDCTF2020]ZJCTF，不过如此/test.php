<?php $string = 'April 15, 2003';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '${1}2,$3';
echo preg_replace($pattern, $replacement, $string);
?>