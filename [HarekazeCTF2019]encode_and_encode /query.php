<?php
error_reporting(0);

if (isset($_GET['source'])) {
    show_source(__FILE__);
    exit();       //这里有exit()，因此在进行测试时应删除URL后的source参数
}

function is_valid($str) {
    $banword = [
        // no path traversal  ->  防止目录穿越
        '\.\.',
        // no stream wrapper ->  过滤掉常见伪协议
        '(php|file|glob|data|tp|zip|zlib|phar):',
        // no data exfiltration  ->  过滤掉‘flag’关键词
        'flag'
    ];
    $regexp = '/' . implode('|', $banword) . '/i';   //正则匹配违禁词
    if (preg_match($regexp, $str)) {   //对传入函数的字符进行检测
        return false;
    }
    return true;
}

$body = file_get_contents('php://input');    //变量body利用php://input伪协议获取post数据
$json = json_decode($body, true);    //变量body在进行json解码后赋值给变量json

if (is_valid($body) && isset($json) && isset($json['page'])) {     //对body内容进行过滤检测、检测json中是否存在page参数  ->  意味着我们的payload应传递给page参数
    $page = $json['page'];
    $content = file_get_contents($page);   //读取page中文件的内容并赋值给content ->  到这里就可以确定是一个文件包含漏洞了
    if (!$content || !is_valid($content)) {   //对content内容进行过滤检测
        $content = "<p>not found</p>\n";
    }
} else {
    $content = '<p>invalid request</p>';
}

// no data exfiltration!!!
$content = preg_replace('/HarekazeCTF\{.+\}/i', 'HarekazeCTF{&lt;censored&gt;}', $content);    //如果直接返回明文Flag则会替换掉Flag中的内容 ->  这里很明显需要对返回的内容进行加密，不难想到利用php://filter中的流控制器进行数据编码
echo json_encode(['content' => $content]);   //输出content中的内容，即输出文件内容