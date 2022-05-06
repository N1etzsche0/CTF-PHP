<?php

class foo
{
    function __call($name, $arguments)
    {
        print("Did you call me? I'm $name " . implode($arguments) . "!");
    }
}

$x = new foo();
$x->doStuff("12");
$x->fancy_stuff();

phpinfo();
?>