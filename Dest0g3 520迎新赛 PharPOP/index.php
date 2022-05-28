<?php
highlight_file(__FILE__);

function waf($data){
    if (is_array($data)){
        die("Cannot transfer arrays");
    }
    if (preg_match('/get|air|tree|apple|banana|php|filter|base64|rot13|read|data/i', $data)) {
        die("You can't do");
    }
}

class air{
    public $p;

    public function __set($p, $value) {
        $p = $this->p->act;
        echo new $p($value);
    }
}

class tree{
    public $name;
    public $act;

    public function __destruct() {
        return $this->name();
    }
    public function __call($name, $arg){
        $arg[1] =$this->name->$name;

    }
}

class apple {
    public $xxx;
    public $flag;
    public function __get($flag)
    {
        $this->xxx->$flag = $this->flag;
    }
}

class D {
    public $start;

    public function __destruct(){
        $data = $_POST[0];
        if ($this->start == 'w') {
            waf($data);
            $filename = "/tmp/".md5(rand()).".jpg";
            file_put_contents($filename, $data);
            echo $filename;
        } else if ($this->start == 'r') {
            waf($data);
            $f = file_get_contents($data);
            if($f){
                echo "It is file";
            }
            else{
                echo "You can look at the others";
            }
        }
    }
}

class banana {
    public function __get($name){
        return $this->$name;
    }
}
// flag in /
if(strlen($_POST[1]) < 55) {
    $a = unserialize($_POST[1]);
}
else{
    echo "str too long";
}

throw new Error("start");
?>
