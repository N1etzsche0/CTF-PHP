<?php
highlight_file(__FILE__);
if ($_POST['cmd']) {
    $cmd = $_POST['cmd'];
    if (';' === preg_replace('/[a-z_]+\((?R)?\)/', '', $cmd)) {
        if (preg_match('/file|if|localeconv|phpversion|sqrt|et|na|nt|strlen|info|path|rand|dec|bin|hex|oct|pi|exp|log|var_dump|pos|current|array|time|se|ord/i', $cmd)) {
            die('What are you thinking?');
        } else {
            print_r(apache_request_headers());
            echo eval($cmd);
        }
    } else {
        die('Please calm down');
    }
}
