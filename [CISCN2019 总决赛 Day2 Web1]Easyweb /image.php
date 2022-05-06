<?php
include "config.php";

//$id = $_GET["id"] ?? "1";
$path = $_GET["path"] ?? "";
$id = "\\0";
$id = addslashes($id);
echo $id;
echo '<br>';
$path = addslashes($path);

$id = str_replace(array("\\0", "%00", "\\'", "'"), "", $id);
echo $id;
echo '<br>';
$path = str_replace(array("\\0", "%00", "\\'", "'"), "", $path);

$result = mysqli_query($con, "select * from images where id='{$id}' or path='{$path}'");
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$path = "./" . $row["path"];
header("Content-Type: image/jpeg");
readfile($path);