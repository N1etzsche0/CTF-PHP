from hashlib import sha1
f = open('./phar1.phar', 'rb').read()  # 修改内容后的phar文件
s = f[:-28]  # 获取要签名的数据
h = f[-8:]  # 获取签名类型以及GBMB标识
newf = s+sha1(s).digest()+h  # 数据 + 签名 + 类型 + GBMB
open('phar2.phar', 'wb').write(newf)  # 写入新文件
