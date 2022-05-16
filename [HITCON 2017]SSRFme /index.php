<?php
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $http_x_headers = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    $_SERVER['REMOTE_ADDR'] = $http_x_headers[0];
}

echo $_SERVER["REMOTE_ADDR"];

$sandbox = "sandbox/" . md5("orange" . $_SERVER["REMOTE_ADDR"]);
@mkdir($sandbox);
@chdir($sandbox);

$data = shell_exec("GET " . escapeshellarg($_GET["url"]));
$info = pathinfo($_GET["filename"]);
$dir  = str_replace(".", "", basename($info["dirname"]));
@mkdir($dir);
@chdir($dir);
@file_put_contents(basename($info["basename"]), $data);
highlight_file(__FILE__);