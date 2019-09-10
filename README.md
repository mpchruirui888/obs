# obs
华为云obs对象存储图片

一：安装SDK

 ```composer require obs/esdk-obs-php```![1568108914254](C:\Users\lrving\AppData\Roaming\Typora\typora-user-images\1568108914254.png)

二：安装项目目录会多出来**vendor**目录

三：本地增加h5文件和PHP文件进行上传

![1568109081918](C:\Users\lrving\AppData\Roaming\Typora\typora-user-images\1568109081918.png)

四：实例化类配置参数进行测试

```php
// 引入依赖库
require 'vendor/autoload.php';
// 使用源码安装时引入SDK代码库
// require 'obs-autoloader.php';
// 声明命名空间
use Obs\ObsClient;
// 创建ObsClient实例
$obsClient = new ObsClient([
       'key' => '*** Provide your Access Key ***',
       'secret' => '*** Provide your Secret Key ***',
       'endpoint' => 'https://your-endpoint'
]);

$resp = $obsClient->putObject([
       'Bucket' => 'bucketname',
       'Key' => 'objectname',
       'SourceFile' => 'localfile'  // localfile为待上传的本地文件路径，需要指定到具体的文件名
]);

printf("RequestId:%s\n",$resp['RequestId']);
```